<?php

namespace Illuminate\Contracts\Mail;

use Closure;
use Illuminate\Mail\PendingMail;

interface Mailer
{
    /**
     * Begin the process of mailing a mailable class instance.
     *
     * @param mixed $users
     * @return PendingMail
     */
    public function to($users);

    /**
     * Begin the process of mailing a mailable class instance.
     *
     * @param mixed $users
     * @return PendingMail
     */
    public function bcc($users);

    /**
     * Send a new message with only a raw text part.
     *
     * @param string $text
     * @param mixed $callback
     * @return void
     */
    public function raw($text, $callback);

    /**
     * Send a new message using a view.
     *
     * @param string|array|Mailable $view
     * @param array $data
     * @param Closure|string|null $callback
     * @return void
     */
    public function send($view, array $data = [], $callback = null);

    /**
     * Get the array of failed recipients.
     *
     * @return array
     */
    public function failures();
}
