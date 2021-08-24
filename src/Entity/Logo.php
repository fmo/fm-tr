<?php

namespace App\Entity;

class Logo
{
    private string $file;

    private string $name;

    public function __construct(string $file, string $name)
    {
        $this->file = $file;
        $this->name = $name;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFileContext(): bool|string
    {
        return file_get_contents($this->file);
    }
}
