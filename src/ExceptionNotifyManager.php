<?php

namespace Summer\LaravelExceptionNotify;

use Summer\ExceptionNotify\Channel\AbstractChannel;
use Summer\ExceptionNotify\Message\AbstractMessage;
use Illuminate\Contracts\Foundation\Application;
use InvalidArgumentException;

class ExceptionNotifyManager
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * @var array<string, AbstractChannel>
     */
    protected $channels;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function channel(string $name = null): AbstractChannel
    {
        $name = $name ?? $this->getDefaultChannel();

        return $this->channels[$name] ?? $this->resolve($name);
    }

    protected function getDefaultChannel(): string
    {
        return $this->app['config']['message.default'];
    }

    protected function resolve(string $name): AbstractChannel
    {
        $config = $this->getConfig($name);

        return $this->channels[$name] = new $config['driver']($config);
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
         $this->channel()->send($message);
    }
}