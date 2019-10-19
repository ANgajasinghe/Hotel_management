<?php

namespace Illuminate\Support\Facades;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Session\Store;

/**
 * @method static RedirectResponse home(int $status = 302)
 * @method static RedirectResponse back(int $status = 302, array $headers = [], $fallback = false)
 * @method static RedirectResponse refresh(int $status = 302, array $headers = [])
 * @method static RedirectResponse guest(string $path, int $status = 302, array $headers = [], bool $secure = null)
 * @method static intended(string $default = '/', int $status = 302, array $headers = [], bool $secure = null)
 * @method static RedirectResponse to(string $path, int $status = 302, array $headers = [], bool $secure = null)
 * @method static RedirectResponse away(string $path, int $status = 302, array $headers = [])
 * @method static RedirectResponse secure(string $path, int $status = 302, array $headers = [])
 * @method static RedirectResponse route(string $route, array $parameters = [], int $status = 302, array $headers = [])
 * @method static RedirectResponse action(string $action, array $parameters = [], int $status = 302, array $headers = [])
 * @method static UrlGenerator getUrlGenerator()
 * @method static void setSession(Store $session)
 *
 * @see \Illuminate\Routing\Redirector
 */
class Redirect extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'redirect';
    }
}
