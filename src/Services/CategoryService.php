<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Models\Category;

class CategoryService
{
    public function __construct(
        private DatabaseInterface $db
    )
    {
    }

    public function all(): array
    {
        $categories = $this->db->get('categories');

        $categories = array_map(function ($category) {
            return new Category(
                id: $category['id'],
                name: $category['category_name'],
                createdAt: $category['created_at'],
                updatedAt: $category['updated_at']
            );
        }, $categories);

        return $categories;
    }

    public function delete(int $id): void
    {
        $this->db->delete('categories', [
            'id' => $id
        ]);
    }
}