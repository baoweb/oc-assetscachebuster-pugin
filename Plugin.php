<?php namespace Baoweb\AssetsCacheBuster;

use Backend;
use System\Classes\PluginBase;

/**
 * AssetsCacheBuster Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'AssetsCacheBuster',
            'description' => 'No description provided yet...',
            'author'      => 'Baoweb',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                // A local method, i.e $this->makeTextAllCaps()
                'cacheBuster' => [$this, 'generateCacheBuster']
            ],
            /*
            'functions' => [
                // A static method call, i.e Form::open()
                'form_open' => ['October\Rain\Html\Form', 'open'],

                // Using an inline closure
                'helloWorld' => function() { return 'Hello World!'; }
            ]
            */
        ];
    }

    public function generateCacheBuster($text)
    {
        $defaultVersion = 3;

        $version = $defaultVersion;

        $fileVersions = [
            'assets/css/app.css' => 5
        ];

        if(isset($fileVersions[$text])) {
            $version = $fileVersions['assets/css/app.css'];
        }

        return $text . '?v=' . $version;
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }
}
