<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    private Categories $service;


    public function create(): void
    {
        $this->view('admin/categories/add');
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50']
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/admin/categories/add');
            exit;
        }

        $id = $this->db()->insert('categories', [
            'category_name' => $this->request()->input('name'),
        ]);

        dd('Successfully added user with id:' . $id);
    }

    public function destroy()
    {
        $this->db()->delete('categories', [
            'id' => $this->request()->input('id')
        ]);

        $this->redirect('/admin');
    }

    public function service()
    {
        if (! isset($this->service())) {
            $this->service = new CategoryService($this->db())
        }

        return $this->service;
    }
}