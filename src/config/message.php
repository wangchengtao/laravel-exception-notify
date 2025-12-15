<?php


return [
    'default' => 'dingtalk',
    'channels' => [
        'dingtalk' => [
            'driver' => Hicoopay\ExceptionNotify\Channel\Dingtalk::class,
            'access_token' => 'your access token',
            'type' => 'keyword', // keyword sign
            'keyword' => 'your keyword', // When the type is keyword, this refers to the keyword added to the bot.
            'secret' => 'your secret', // When the type is sign, this refers to the secret adding the bot.
        ],
        'feishu' => [
            'driver' => Hicoopay\ExceptionNotify\Channel\Feishu::class,
            'access_token' => 'your access token',
            'type' => 'keyword', // keyword sign
            'keyword' => 'your keyword',
            'secret' => 'your secret',
        ],
        'wechat' => [
            // 'driver' => Hicoopay\ExceptionNotify\Channel\Wechat::class,
            'access_token' => 'your access token',
        ],
    ],
];
