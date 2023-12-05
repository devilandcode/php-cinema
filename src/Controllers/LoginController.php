<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->view(name: 'login', title: 'Вход');
    }

    public function login()
    {
        $validation = $this->request()->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required', 'min:5']
            ]
        );

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/login');
            exit;
        }

        $username = $this->request()->input('email');
        $password = $this->request()->input('password');

        if ($this->auth()->attempt($username, $password)) {
            $this->redirect('/');
            exit;
        };
        $this->session()->set('error', 'Invalid login or password');
        $this->redirect('/login');
    }

    public function logout()
    {
        $this->auth()->logout();

        $this->redirect('/login');
    }
}