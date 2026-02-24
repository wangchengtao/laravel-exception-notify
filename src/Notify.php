<?php

namespace Summer\LaravelMessageNotify;

use Summer\MessageNotify\Message\AbstractMessage;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Summer\LaravelMessageNotify\MessageNotifyManager channel(string $channel = null)
 * @method static void send(AbstractMessage $message)
 */
class Notify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return MessageNotifyManager::class;
    }
}