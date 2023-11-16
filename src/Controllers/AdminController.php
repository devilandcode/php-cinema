<?php

namespace App\Controllers;

use App\Services\CategoryService;

class AdminController extends \App\Kernel\Controller\Controller
{
    private CategoryService $categoryService;

    public function index()
    {
        $categories =  new CategoryService($this->db());
        dd($categories->all());
        $this->view('admin/index', [
            'categories' => $categories
        ]);
    }
}