<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;

class CategoryService
{
    public function __construct(
        private DatabaseInterface $db
    )
    {
    }

    public function all(): array
    {
        return $this->db->get('categories');
    }
}