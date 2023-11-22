<?php

namespace App\Controllers;

use App\Services\CategoryService;
use App\Services\MovieService;

class AdminController extends \App\Kernel\Controller\Controller
{
    private CategoryService $categoryService;

    public function index()
    {
        $categories =  new CategoryService($this->db());
        $movies = new MovieService($this->db());

        $this->view('admin/index', [
            'categories' => $categories->all(),
            'movies' => $movies->all()
        ]);
    }
}