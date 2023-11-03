<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->view('login');
    }

    public function login()
    {
        $username = $this->request()->input('email');
        $password = $this->request()->input('password');
        dd($this->auth()->attempt($username, $password), $_SESSION);
    }
}