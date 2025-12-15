<?php

namespace Summer\LaravelExceptionNotify;

use Summer\ExceptionNotify\Message\AbstractMessage;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Summer\LaravelExceptionNotify\ExceptionNotifyManager channel(string $channel = null)
 * @method static void send(AbstractMessage $message)
 */
class Notify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ExceptionNotifyManager::class;
    }
}