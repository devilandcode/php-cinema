<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;

class MovieService
{
    public function __construct(
        private DatabaseInterface $db
    )
    {
    }

    public function store(string $name, string $description, UploadedFileInterface $image, string $category): false|int
    {
        $filePath = $image->move('movies');

        return $this->db->insert('movies', [
            'movie_name' => $name,
            'description' => $description,
            'image' => $filePath,
            'category' => $category
        ]);

    }
}