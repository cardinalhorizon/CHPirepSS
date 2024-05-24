<?php

namespace Modules\CHPirepSS\Providers;

use App\Contracts\Modules\ServiceProvider;

/**
 * @package $NAMESPACE$
 */
class AppServiceProvider extends ServiceProvider
{
    private $moduleSvc;

    protected $defer = false;

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->moduleSvc = app("App\Services\ModuleService");

        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();

        //$this->registerLinks();
        app("arrilot.widget-namespaces")->registerNamespace(
            "CHPirepSS",
            "Modules\CHPirepSS\Widgets"
        );
        // Uncomment this if you have migrations
        // $this->loadMigrationsFrom(__DIR__ . '/../$MIGRATIONS_PATH$');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }

    /**
     * Add module links here
     */
    public function registerLinks(): void
    {
        // Show this link if logged in
        // $this->moduleSvc->addFrontendLink('CHPirepSS', '/chpirepss', '', $logged_in=true);

        // Admin links:
        //$this->moduleSvc->addAdminLink('CHPirepSS', '/admin/chpirepss');
    }

    /**
     * Register config.
     */
    protected function registerConfig()
    {
        $this->publishes(
            [
                __DIR__ . "/../Config/config.php" => config_path(
                    "chpirepss.php"
                ),
            ],
            "chpirepss"
        );

        $this->mergeConfigFrom(__DIR__ . "/../Config/config.php", "chpirepss");
    }

    /**
     * Register views.
     */
    public function registerViews()
    {
        $viewPath = resource_path("views/modules/chpirepss");
        $sourcePath = __DIR__ . "/../Resources/views";

        $this->publishes([$sourcePath => $viewPath], "views");


        $this->loadViewsFrom(array_merge(array_filter(array_map(function ($path) {
            $path = str_replace('default', setting('general.theme'), $path); 
            // Check if the directory exists before adding it
            if (file_exists($path.'/modules/chpirepss') && is_dir($path.'/modules/chpirepss'))
                return $path.'/modules/chpirepss';

            return null;
        }, \Config::get('view.paths'))), [$sourcePath]), 'chpirepss');
    }

    /**
     * Register translations.
     */
    public function registerTranslations()
    {
        $langPath = resource_path("lang/modules/chpirepss");

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, "chpirepss");
        } else {
            $this->loadTranslationsFrom(
                __DIR__ . "/../Resources/lang",
                "chpirepss"
            );
        }
    }
}
