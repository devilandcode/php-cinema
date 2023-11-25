<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;

class ReviewService
{
    public function __construct(
        private DatabaseInterface $db
    )
    {
    }

    public function store(string $rating, string $comment, string $movieId, string $userId): false|int
    {
        return $this->db->insert('reviews', [
            'rating' => $rating,
            'review' => $comment,
            'movie_id' => $movieId,
            'user_id' => $userId
        ]);

    }
}