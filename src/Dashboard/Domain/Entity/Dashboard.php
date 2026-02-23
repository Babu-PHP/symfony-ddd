<?php

namespace App\Dashboard\Domain\Entity;

class Dashboard
{
    private string $id;
    private array $data;

    public function __construct(string $id, array $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function data(): array
    {
        return $this->data;
    }
}
