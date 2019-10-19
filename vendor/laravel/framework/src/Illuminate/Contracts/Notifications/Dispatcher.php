<?php

namespace Illuminate\Contracts\Notifications;

use Illuminate\Support\Collection;

interface Dispatcher
{
    /**
     * Send the given notification to the given notifiable entities.
     *
     * @param Collection|array|mixed $notifiables
     * @param mixed $notification
     * @return void
     */
    public function send($notifiables, $notification);

    /**
     * Send the given notification immediately.
     *
     * @param Collection|array|mixed $notifiables
     * @param mixed $notification
     * @return void
     */
    public function sendNow($notifiables, $notification);
}
