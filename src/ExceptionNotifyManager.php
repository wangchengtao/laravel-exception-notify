<?php

namespace Hicoopay\LaravelExceptionNotify;

use Hicoopay\ExceptionNotify\Channel\AbstractChannel;
use Hicoopay\ExceptionNotify\Message\AbstractMessage;
use Illuminate\Contracts\Foundation\Application;
use InvalidArgumentException;

class ExceptionNotifyManager
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * @var \Hicoopay\ExceptionNotify\Channel\AbstractChannel
     */
    protected $channel;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function channel(string $name = null): AbstractChannel
    {
        $name = $name ?? $this->getDefaultChannel();

        return $this->resolve($name);
    }

    protected function getDefaultChannel(): string
    {
        return $this->app['config']['message.default'];
    }

    protected function resolve(string $name): AbstractChannel
    {
        $config = $this->getConfig($name);

        return $this->channel = new $config['driver']($config);
    }

    protected function getConfig(string $name): array
    {
        if ($this->app['config']->has("message.channels.$name")) {
            return $this->app['config']["message.channels.$name"];
        }

        throw new InvalidArgumentException("Channel [$name] is not defined.");
    }

    public function send(AbstractMessage $message): void
    {
        $res = $this->channel()->send($message);
        $this->channel->handleResponse($res);
    }
}