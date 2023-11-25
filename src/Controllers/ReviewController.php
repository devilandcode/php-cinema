<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    public function __construct(
        protected ReviewService $service
    )
    {
    }

    public function store()
    {
        $validation = $this->request()->validate([
            'rating' => ['required'],
            'review' => ['required']
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect("/movie?id={$this->request()->input('id')}");
            exit;
        }

        $this->service->store(
            $this->request()->input('rating'),
            $this->request()->input('review'),
            $this->request()->input('id'),
            $this->auth()->id()
        );
        
        $this->redirect("/movie?id={$this->request()->input('id')}");
    }
}