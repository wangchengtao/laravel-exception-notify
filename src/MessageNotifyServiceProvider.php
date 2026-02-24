<?php

namespace Summer\LaravelMessageNotify;

use Illuminate\Support\ServiceProvider;

class MessageNotifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/message.php' => config_path('message.php'),
        ]);
    }
}