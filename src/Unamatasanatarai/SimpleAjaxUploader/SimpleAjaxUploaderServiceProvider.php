<?php
namespace Unamatasanatarai\SimpleAjaxUploader;

use Illuminate\Support\ServiceProvider;

class SimpleAjaxUploaderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'sau');
    }
}
