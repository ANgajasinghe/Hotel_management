<?php

namespace Illuminate\Broadcasting\Broadcasters;

use Illuminate\Support\Str;

trait UsePusherChannelConventions
{
    /**
     * Remove prefix from channel name.
     *
     * @param string $channel
     * @return string
     */
    public function normalizeChannelName($channel)
    {
        if ($this->isGuardedChannel($channel)) {
            return Str::startsWith($channel, 'private-')
                ? Str::replaceFirst('private-', '', $channel)
                : Str::replaceFirst('presence-', '', $channel);
        }

        return $channel;
    }

    /**
     * Return true if channel is protected by authentication.
     *
     * @param string $channel
     * @return bool
     */
    public function isGuardedChannel($channel)
    {
        return Str::startsWith($channel, ['private-', 'presence-']);
    }
}
