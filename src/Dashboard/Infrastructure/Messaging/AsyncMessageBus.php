<?php

namespace App\Dashboard\Infrastructure\Messaging;

use Symfony\Component\Messenger\MessageBusInterface;

class AsyncMessageBus
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * Dispatch a message asynchronously.
     *
     * @param object $message
     * @return void
     */
    public function dispatch(object $message): void
    {
        // The async bus will enqueue the message for background processing
        $this->bus->dispatch($message);
    }
}
