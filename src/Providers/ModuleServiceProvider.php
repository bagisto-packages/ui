<?php

namespace BagistoPackages\Ui\Providers;

use BagistoPackages\Ui\Themes;
use Illuminate\Pagination\Paginator;
use BagistoPackages\Ui\ThemeViewFinder;
use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    public function boot()
    {
        parent::boot();

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'ui');

        Paginator::defaultView('ui::partials.pagination');
        Paginator::defaultSimpleView('ui::partials.pagination');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/packages/ui/assets'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/../Resources/views' => resource_path('views/vendor/ui'),
        ]);

        $this->publishes([
            __DIR__ . '/../Resources/lang' => resource_path('lang/vendor/ui'),
        ]);
    }

    public function register()
    {
        parent::register();

        $this->app->bind('datagrid', 'BagistoPackages\Ui\DataGrid\DataGrid');

        $this->app->singleton('themes', function () {
            return new Themes();
        });

        $this->app->singleton('view.finder', function ($app) {
            return new ThemeViewFinder($app['files'], $app['config']['view.paths'], null);
        });
    }
}