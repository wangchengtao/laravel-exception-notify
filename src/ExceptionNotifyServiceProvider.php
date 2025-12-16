<?php

namespace Summer\LaravelExceptionNotify;

use Illuminate\Support\ServiceProvider;

class ExceptionNotifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/message.php' => config_path('message.php'),
        ]);
    }
}