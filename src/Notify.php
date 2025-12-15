<?php

namespace Hicoopay\LaravelExceptionNotify;

use Hicoopay\ExceptionNotify\Message\AbstractMessage;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Hicoopay\LaravelExceptionNotify\ExceptionNotifyManager channel(string $channel = null)
 * @method static void send(AbstractMessage $message)
 */
class Notify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ExceptionNotifyManager::class;
    }
}