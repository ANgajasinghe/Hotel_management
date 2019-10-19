<?php

namespace Illuminate\Contracts\Mail;

use DateInterval;
use DateTimeInterface;

interface MailQueue
{
    /**
     * Queue a new e-mail message for sending.
     *
     * @param string|array|Mailable $view
     * @param string|null $queue
     * @return mixed
     */
    public function queue($view, $queue = null);

    /**
     * Queue a new e-mail message for sending after (n) seconds.
     *
     * @param DateTimeInterface|DateInterval|int $delay
     * @param string|array|Mailable $view
     * @param string|null $queue
     * @return mixed
     */
    public function later($delay, $view, $queue = null);
}
