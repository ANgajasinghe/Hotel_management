<?php

namespace Illuminate\Auth\Passwords;

use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

interface TokenRepositoryInterface
{
    /**
     * Create a new token.
     *
     * @param CanResetPasswordContract $user
     * @return string
     */
    public function create(CanResetPasswordContract $user);

    /**
     * Determine if a token record exists and is valid.
     *
     * @param CanResetPasswordContract $user
     * @param string $token
     * @return bool
     */
    public function exists(CanResetPasswordContract $user, $token);

    /**
     * Delete a token record.
     *
     * @param CanResetPasswordContract $user
     * @return void
     */
    public function delete(CanResetPasswordContract $user);

    /**
     * Delete expired tokens.
     *
     * @return void
     */
    public function deleteExpired();
}
