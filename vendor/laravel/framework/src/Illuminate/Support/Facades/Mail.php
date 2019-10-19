<?php

namespace Illuminate\Support\Facades;

use Closure;
use DateInterval;
use DateTimeInterface;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Collection;
use Illuminate\Support\Testing\Fakes\MailFake;

/**
 * @method static PendingMail to($users)
 * @method static PendingMail bcc($users)
 * @method static void raw(string $text, $callback)
 * @method static void send(string|array|Mailable $view, array $data = [], Closure|string $callback = null)
 * @method static array failures()
 * @method static mixed queue(string|array|Mailable $view, string $queue = null)
 * @method static mixed later(DateTimeInterface|DateInterval|int $delay, string|array|Mailable $view, string $queue = null)
 * @method static void assertSent(string $mailable, Closure|string $callback = null)
 * @method static void assertNotSent(string $mailable, Closure|string $callback = null)
 * @method static void assertNothingSent()
 * @method static void assertQueued(string $mailable, Closure|string $callback = null)
 * @method static void assertNotQueued(string $mailable, Closure|string $callback = null)
 * @method static void assertNothingQueued()
 * @method static Collection sent(string $mailable, Closure|string $callback = null)
 * @method static bool hasSent(string $mailable)
 * @method static Collection queued(string $mailable, Closure|string $callback = null)
 * @method static bool hasQueued(string $mailable)
 *
 * @see \Illuminate\Mail\Mailer
 * @see \Illuminate\Support\Testing\Fakes\MailFake
 */
class Mail extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @return MailFake
     */
    public static function fake()
    {
        static::swap($fake = new MailFake);

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mailer';
    }
}
