<?php

return [
    'default' => env('NOTIFY_DEFAULT_CHANNEL', 'dingtalk'),
    'channels' => [
        'dingtalk' => [
            'driver' => Summer\ExceptionNotify\Channel\Dingtalk::class,
            'access_token' => env('DINGTALK_ACCESS_TOKEN', 'your access token'),
            'auth_type' => env('DINGTALK_AUTH_TYPE', 'keyword'), // keyword | sign
            'keyword' => env('DINGTALK_KEYWORD', 'your keyword'), // When the type is keyword, this refers to the keyword added to the bot.
            'secret' => env('DINGTALK_SECRET', 'your secret'), // When the type is sign, this refers to the secret adding the bot.
            'at' => explode(',', env('DINGTALK_AT', '')), // At who
        ],
        'feishu' => [
            'driver' => Summer\ExceptionNotify\Channel\Feishu::class,
            'access_token' => env('FEISHU_ACCESS_TOKEN', 'your access token'),
            'auth_type' => env('FEISHU_KEYWORD', 'keyword'), // keyword | sign
            'keyword' => env('FEISHU_KEYWORD', 'your keyword'),
            'secret' => env('FEISHU_SECRET', 'your secret'),
        ],
        'wechat' => [
            // 'driver' => Summer\ExceptionNotify\Channel\Wechat::class,
            'access_token' => env('WECHAT_ACCESS_TOKEN', 'your access token'),
        ],
    ],
];
