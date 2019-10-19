<?php

namespace Illuminate\Mail;

use DateInterval;
use DateTimeInterface;
use Illuminate\Contracts\Mail\Mailable as MailableContract;
use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Translation\HasLocalePreference;

class PendingMail
{
    /**
     * The mailer instance.
     *
     * @var MailerContract
     */
    protected $mailer;

    /**
     * The locale of the message.
     *
     * @var string
     */
    protected $locale;

    /**
     * The "to" recipients of the message.
     *
     * @var array
     */
    protected $to = [];

    /**
     * The "cc" recipients of the message.
     *
     * @var array
     */
    protected $cc = [];

    /**
     * The "bcc" recipients of the message.
     *
     * @var array
     */
    protected $bcc = [];

    /**
     * Create a new mailable mailer instance.
     *
     * @param MailerContract $mailer
     * @return void
     */
    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Set the recipients of the message.
     *
     * @param mixed $users
     * @return $this
     */
    public function to($users)
    {
        $this->to = $users;

        if (!$this->locale && $users instanceof HasLocalePreference) {
            $this->locale($users->preferredLocale());
        }

        return $this;
    }

    /**
     * Set the locale of the message.
     *
     * @param string $locale
     * @return $this
     */
    public function locale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Set the recipients of the message.
     *
     * @param mixed $users
     * @return $this
     */
    public function cc($users)
    {
        $this->cc = $users;

        return $this;
    }

    /**
     * Set the recipients of the message.
     *
     * @param mixed $users
     * @return $this
     */
    public function bcc($users)
    {
        $this->bcc = $users;

        return $this;
    }

    /**
     * Send a new mailable message instance.
     *
     * @param MailableContract $mailable
     *
     * @return mixed
     */
    public function send(MailableContract $mailable)
    {
        if ($mailable instanceof ShouldQueue) {
            return $this->queue($mailable);
        }

        return $this->mailer->send($this->fill($mailable));
    }

    /**
     * Push the given mailable onto the queue.
     *
     * @param MailableContract $mailable ;
     * @return mixed
     */
    public function queue(MailableContract $mailable)
    {
        $mailable = $this->fill($mailable);

        if (isset($mailable->delay)) {
            return $this->mailer->later($mailable->delay, $mailable);
        }

        return $this->mailer->queue($mailable);
    }

    /**
     * Populate the mailable with the addresses.
     *
     * @param MailableContract $mailable ;
     * @return Mailable
     */
    protected function fill(MailableContract $mailable)
    {
        return $mailable->to($this->to)
            ->cc($this->cc)
            ->bcc($this->bcc)
            ->locale($this->locale);
    }

    /**
     * Send a mailable message immediately.
     *
     * @param MailableContract $mailable ;
     * @return mixed
     */
    public function sendNow(MailableContract $mailable)
    {
        return $this->mailer->send($this->fill($mailable));
    }

    /**
     * Deliver the queued message after the given delay.
     *
     * @param DateTimeInterface|DateInterval|int $delay
     * @param MailableContract $mailable ;
     * @return mixed
     */
    public function later($delay, MailableContract $mailable)
    {
        return $this->mailer->later($delay, $this->fill($mailable));
    }
}
