<?php

namespace App\Models;

use App\Kernel\Auth\User;

class Review
{
    public function __construct(
        private int $id,
        private string $rating,
        private string $review,
        private string $createdAt,
        private User $user,
    )
    {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function rating(): string
    {
        return $this->rating;
    }

    public function review(): string
    {
        return $this->review;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }
}