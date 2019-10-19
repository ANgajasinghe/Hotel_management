<?php

namespace Illuminate\Support\Facades;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

/**
 * @method static string version()
 * @method static string basePath()
 * @method static string bootstrapPath(string $path = '')
 * @method static string configPath(string $path = '')
 * @method static string databasePath(string $path = '')
 * @method static string environmentPath()
 * @method static string resourcePath(string $path = '')
 * @method static string storagePath(string $path = '')
 * @method static string|bool environment(string|array ...$environments)
 * @method static bool runningInConsole()
 * @method static bool runningUnitTests()
 * @method static bool isDownForMaintenance()
 * @method static void registerConfiguredProviders()
 * @method static ServiceProvider register(ServiceProvider|string $provider, bool $force = false)
 * @method static void registerDeferredProvider(string $provider, string $service = null)
 * @method static ServiceProvider resolveProvider(string $provider)
 * @method static void boot()
 * @method static void booting(callable $callback)
 * @method static void booted(callable $callback)
 * @method static void bootstrapWith(array $bootstrappers)
 * @method static bool configurationIsCached()
 * @method static string detectEnvironment(callable $callback)
 * @method static string environmentFile()
 * @method static string environmentFilePath()
 * @method static string getCachedConfigPath()
 * @method static string getCachedServicesPath()
 * @method static string getCachedPackagesPath()
 * @method static string getCachedRoutesPath()
 * @method static string getLocale()
 * @method static string getNamespace()
 * @method static array getProviders(ServiceProvider|string $provider)
 * @method static bool hasBeenBootstrapped()
 * @method static void loadDeferredProviders()
 * @method static Application loadEnvironmentFrom(string $file)
 * @method static bool routesAreCached()
 * @method static void setLocale(string $locale)
 * @method static bool shouldSkipMiddleware()
 * @method static void terminate()
 *
 * @see \Illuminate\Contracts\Foundation\Application
 */
class App extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'app';
    }
}
