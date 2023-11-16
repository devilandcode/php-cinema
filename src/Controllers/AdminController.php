<?php

namespace App\Controllers;

class AdminController extends \App\Kernel\Controller\Controller
{
    public function index()
    {
        $this->view('admin/index');
    }
}