<?php
namespace Waynestate\Youtube;

use Waynestate\Youtube\ParseId;
use Illuminate\Support\ServiceProvider;

class ParseIdServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ParseId::class, function ($app) {
            return new ParseId();
        });
    }
}
