<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Category;
use App\Models\Movie;

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

    public function all(): array
    {
        $movies = $this->db->get('movies');

        return array_map(function($movie) {
            return new Movie(
                $movie['id'],
                $movie['movie_name'],
                $movie['description'],
                $movie['category'],
                $movie['image']
            );
        }, $movies);
    }

    public function destroy(int $id)
    {
        $this->db->delete('movies', [
            'id' => $id
        ]);
    }

    public function find(int $id): ?Movie
    {
        $movie = $this->db->first('movies', [
            'id' => $id
        ]);

        if (! $movie) {
            return null;
        }

        return new Movie(
            id: $movie['id'],
            name: $movie['movie_name'],
            description: $movie['description'],
            category: $movie['category'],
            image: $movie['image']
        );
    }

    public function update(string $id, string $name, string $description, ?UploadedFileInterface $image, string $category): void
    {
        $data = [
            'movie_name' => $name,
            'description' => $description,
            'category' => $category
        ];

        if ($image && ! $image->hasErrors()) {
            $data['image'] = $image->move('movies');
        }

        $this->db->update('movies',$data, [
            'id' => $id
        ]);
    }

    public function newMovies(): array
    {
        $movies = $this->db->get('movies', [], ['id' => 'DESC'], 10);

        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['movie_name'],
                $movie['description'],
                $movie['category'],
                $movie['image'],
            );
        }, $movies);
    }

}