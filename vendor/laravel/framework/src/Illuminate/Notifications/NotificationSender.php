<?php

namespace Illuminate\Notifications;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Collection as ModelCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Localizable;

class NotificationSender
{
    use Localizable;

    /**
     * The notification manager instance.
     *
     * @var ChannelManager
     */
    protected $manager;

    /**
     * The Bus dispatcher instance.
     *
     * @var \Illuminate\Contracts\Bus\Dispatcher
     */
    protected $bus;

    /**
     * The event dispatcher.
     *
     * @var Dispatcher
     */
    protected $events;

    /**
     * The locale to be used when sending notifications.
     *
     * @var string|null
     */
    protected $locale;

    /**
     * Create a new notification sender instance.
     *
     * @param ChannelManager $manager
     * @param \Illuminate\Contracts\Bus\Dispatcher $bus
     * @param Dispatcher $events
     * @param string|null $locale
     * @return void
     */
    public function __construct($manager, $bus, $events, $locale = null)
    {
        $this->bus = $bus;
        $this->events = $events;
        $this->manager = $manager;
        $this->locale = $locale;
    }

    /**
     * Send the given notification to the given notifiable entities.
     *
     * @param Collection|array|mixed $notifiables
     * @param mixed $notification
     * @return void
     */
    public function send($notifiables, $notification)
    {
        $notifiables = $this->formatNotifiables($notifiables);

        if ($notification instanceof ShouldQueue) {
            return $this->queueNotification($notifiables, $notification);
        }

        return $this->sendNow($notifiables, $notification);
    }

    /**
     * Format the notifiables into a Collection / array if necessary.
     *
     * @param mixed $notifiables
     * @return ModelCollection|array
     */
    protected function formatNotifiables($notifiables)
    {
        if (!$notifiables instanceof Collection && !is_array($notifiables)) {
            return $notifiables instanceof Model
                ? new ModelCollection([$notifiables]) : [$notifiables];
        }

        return $notifiables;
    }

    /**
     * Queue the given notification instances.
     *
     * @param mixed $notifiables
     * @param array[\Illuminate\Notifications\Channels\Notification]  $notification
     * @return void
     */
    protected function queueNotification($notifiables, $notification)
    {
        $notifiables = $this->formatNotifiables($notifiables);

        $original = clone $notification;

        foreach ($notifiables as $notifiable) {
            $notificationId = Str::uuid()->toString();

            foreach ((array)$original->via($notifiable) as $channel) {
                $notification = clone $original;

                $notification->id = $notificationId;

                if (!is_null($this->locale)) {
                    $notification->locale = $this->locale;
                }

                $this->bus->dispatch(
                    (new SendQueuedNotifications($notifiable, $notification, [$channel]))
                        ->onConnection($notification->connection)
                        ->onQueue($notification->queue)
                        ->delay($notification->delay)
                );
            }
        }
    }

    /**
     * Send the given notification immediately.
     *
     * @param Collection|array|mixed $notifiables
     * @param mixed $notification
     * @param array|null $channels
     * @return void
     */
    public function sendNow($notifiables, $notification, array $channels = null)
    {
        $notifiables = $this->formatNotifiables($notifiables);

        $original = clone $notification;

        foreach ($notifiables as $notifiable) {
            if (empty($viaChannels = $channels ?: $notification->via($notifiable))) {
                continue;
            }

            $this->withLocale($this->preferredLocale($notifiable, $notification), function () use ($viaChannels, $notifiable, $original) {
                $notificationId = Str::uuid()->toString();

                foreach ((array)$viaChannels as $channel) {
                    $this->sendToNotifiable($notifiable, $notificationId, clone $original, $channel);
                }
            });
        }
    }

    /**
     * Get the notifiable's preferred locale for the notification.
     *
     * @param mixed $notifiable
     * @param mixed $notification
     * @return string|null
     */
    protected function preferredLocale($notifiable, $notification)
    {
        return $notification->locale ?? $this->locale ?? value(function () use ($notifiable) {
                if ($notifiable instanceof HasLocalePreference) {
                    return $notifiable->preferredLocale();
                }
            });
    }

    /**
     * Send the given notification to the given notifiable via a channel.
     *
     * @param mixed $notifiable
     * @param string $id
     * @param mixed $notification
     * @param string $channel
     * @return void
     */
    protected function sendToNotifiable($notifiable, $id, $notification, $channel)
    {
        if (!$notification->id) {
            $notification->id = $id;
        }

        if (!$this->shouldSendNotification($notifiable, $notification, $channel)) {
            return;
        }

        $response = $this->manager->driver($channel)->send($notifiable, $notification);

        $this->events->dispatch(
            new Events\NotificationSent($notifiable, $notification, $channel, $response)
        );
    }

    /**
     * Determines if the notification can be sent.
     *
     * @param mixed $notifiable
     * @param mixed $notification
     * @param string $channel
     * @return bool
     */
    protected function shouldSendNotification($notifiable, $notification, $channel)
    {
        return $this->events->until(
                new Events\NotificationSending($notifiable, $notification, $channel)
            ) !== false;
    }
}
