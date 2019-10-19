<?php

namespace Illuminate\Auth\Events;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Queue\SerializesModels;

class Verified
{
    use SerializesModels;

    /**
     * The verified user.
     *
     * @var MustVerifyEmail
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param MustVerifyEmail $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}
