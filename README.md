## 消息通知组件

## 功能
* 监控异常
* 支持多种通道(钉钉群机器人 飞书群机器人 企业微信群机器人)
* 支持扩展自定义通道

## 环境要求
* php: >= 7.2
* laravel >= 6.0

## 安装
```bash
composer require wangchengtao/exception-notify
```

## 使用
```php

$text = new DingtalkText();
$text->setTitle('测试');
$text->setContent('异常测试');
$text->setAt([
    '187*****897',
]);

Notify::send($text);
```

## 自定义通道
* 所有自定义通道继承自 `AbstractChannel`
* 所有自定义消息继承自 `AbstractMessage`

```php
use Summer\ExceptionNotify\Channel\AbstractChannel;
use Summer\ExceptionNotify\Message\AbstractMessage;
use Summer\LaravelExceptionNotify\Notify;

class CustomChannel extends AbstractChannel
{
    public function handleResponse(ResponseInterface $response): void
    {
        // TODO: Implement getBody() method.
    }
    
    public function send(string $content): ResponseInterface
    {
        // TODO: Implement getBody() method.
    }
}

class CustomMessage extends AbstractMessage
{
    public function getBody() : array
    {
        // TODO: Implement getBody() method.
    }
}

$message = new CustomMessage();
$message->setTitle('自定义标题');
$message->setContent('自定义消息');

Notify::channel(CustomChannel::class)->send($message);
```