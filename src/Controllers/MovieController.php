<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class MovieController extends Controller
{
    public function index(): void
    {
        $this->view('movies');
    }

    public function add(): void
    {
        $this->view('admin/movies/add');
    }

    public function store(): void
    {
        $file = $this->request()->file('image');
        dd($file->move('movies'));

        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:30']
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/admin/movies/add');
            exit;
        }
        $id = $this->db()->insert('movies', [
            'name' => $this->request()->input('name'),
        ]);

        dd('Successfully added film with id:' . $id);


    }
}