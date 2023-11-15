<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class RegisterController extends Controller
{
    public function index(): void
    {
        $this->view('register');
    }

    public function register(): void
    {
        dd($this->request());
        $validation = $this->request()->validate(
            [
                'name' => ['required', 'min:2'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:5', 'confirmed']
            ]
        );

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/register');
            exit;
        }

        $id = $this->db()->insert('users', [
            'name' => $this->request()->input('name'),
            'email' => $this->request()->input('email'),
            'password' => password_hash($this->request()->input('password'), PASSWORD_DEFAULT)
        ]);

        dd('Successfully added user with id:' . $id);


    }

}