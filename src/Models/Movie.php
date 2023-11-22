<?php

namespace App\Models;

class Movie
{
    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private string $category,
        private string $image,
    )
    {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function category(): string
    {
        return $this->category;
    }

    public function image(): string
    {
        return $this->image;
    }
}