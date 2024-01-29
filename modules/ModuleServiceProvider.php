<?php

namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Modules\User\src\Commands\TestCommand;
use Modules\User\src\Http\Middlewares\DemoMiddleware;
use Modules\User\src\Repositories\UserRepository;

class ModuleServiceProvider extends ServiceProvider
{
    private $middlewares = [
        'demo-test' => DemoMiddleware::class,
    ];
    private $commands = [
        TestCommand::class,
    ];
    public function boot()
    {
        $modules = $this->getModules();
        if (!empty($modules)) {
            foreach ($modules as $module) {
                $this->registerModule($module);
            }
        }
    }

    public function register()
    {
        //Configs 
        $directories = $this->getModules();
        if (!empty($directories)) {
            foreach ($directories as $config) {
                $this->registerConfig($config);
            }
        }

        //Middleware
        $this->registerMiddleware();

        // Khai báo commands
        $this->commands($this->commands);


        $this->app->singleton(
            UserRepository::class
        );
    }

    private function getModules()
    {
        $directories = array_map('basename', File::directories(__DIR__));
        return $directories;
    }
    public function registerConfig($module) //RegisterConfig
    {
        $configPath = __DIR__ . "/" . $module . "/configs";
        if (File::exists($configPath)) {
            $configFiles = array_map('basename', File::files($configPath));
            foreach ($configFiles as $configFile) {
                $alias = basename($configFile, '.php');
                $this->mergeConfigFrom($configPath . "/" . $configFile, $alias);
            }
        }
    }
    private function registerMiddleware() //RegisterMiddleware
    {
        if (!empty($this->middlewares)) {
            foreach ($this->middlewares as $key => $middleware) {
                $this->app['router']->pushMiddlewareToGroup($key, $middleware);
            }
        }
    }
    private function registerModule($module) //Register Modules
    {
        $modulePath = __DIR__ . "/" . $module;
        if (File::exists($modulePath . "/routes/routes.php")) { //Khai báo Routes
            $this->loadRoutesFrom($modulePath . "/routes/routes.php");
        }

        if (File::exists($modulePath . "/migrations")) { //Khai báo Migrations
            $this->loadMigrationsFrom($modulePath . "/migrations");
        }

        if (File::exists($modulePath . "/resources/lang")) {
            $this->loadTranslationsFrom($modulePath . "/resources/lang", strtolower($module)); //Khai báo Language
            $this->loadJsonTranslationsFrom($modulePath . "/resources/lang"); //Khai báo LanguageJsons
        }

        if (File::exists($modulePath . "/resources/views")) { //Khai báo Views
            $this->loadViewsFrom($modulePath . "/resources/views/", strtolower($module));
        }

        if (File::exists($modulePath . "/helpers")) { //Khai báo Views
            $helpers = File::allFiles($modulePath . "/helpers");
            if (!empty($helpers)) {
                foreach ($helpers as $helper) {
                    $file = $helper->getPathname();
                    require $file;
                }
            }
        }
    }

  
}
