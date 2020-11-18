<?php

use BagistoPackages\Ui\ViewRenderEventManager;

if (!function_exists('themes')) {
    function themes()
    {
        return app()->make('themes');
    }
}

if (!function_exists('theme_asset')) {
    function theme_asset($path, $secure = null)
    {
        return themes()->url($path, $secure);
    }
}

if (!function_exists('view_render_event')) {
    function view_render_event($eventName, $params = null)
    {
        app()->singleton(ViewRenderEventManager::class);

        $viewEventManager = app()->make(ViewRenderEventManager::class);

        $viewEventManager->handleRenderEvent($eventName, $params);

        return $viewEventManager->render();
    }
}
