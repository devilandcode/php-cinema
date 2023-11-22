<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;
use App\Services\MovieService;

class MovieController extends Controller
{
    private MovieService $service;

    public function create(): void
    {
        $categories = new CategoryService($this->db());

        $this->view('admin/movies/add', [
            'categories' => $categories->all()
        ]);
    }

    private function service(): MovieService
    {

        if (!isset($this->service)) {
            $this->service = new MovieService($this->db());
        }

        return $this->service;
    }

    public function add(): void
    {
        $this->view('admin/movies/add');
    }

    public function store(): void
    {

        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'description' => ['required'],
            'category' => ['required']
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/admin/movies/add');
            exit;
        }


        $this->service()->store(
            $this->request()->input('name'),
            $this->request()->input('description'),
            $this->request()->file('image'),
            $this->request()->input('category'),
        );

        $this->redirect('/admin');
    }

    public function edit(): void
    {
        $categories = new CategoryService($this->db());

        $this->view('admin/movies/update', [
            'movie' => $this->service()->find($this->request()->input('id')),
            'categories' => $categories->all()
        ]);
    }

    public function update(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'description' => ['required'],
            'category' => ['required']
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }

            $this->redirect("/admin/categories/update?id={$this->request()->input('id')}");
            die;
        }

        $this->service()->update(
            $this->request()->input('id'),
            $this->request()->input('name'),
            $this->request()->input('description'),
            $this->request()->file('image'),
            $this->request()->input('category'),
        );

        $this->redirect('/admin');
    }

    public function destroy()
    {
        $this->service()->destroy($this->request()->input('id'));

        $this->redirect('/admin');
    }
}