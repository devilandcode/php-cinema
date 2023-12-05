<?php

namespace App\Kernel\Controller;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\HTTP\RedirectInterface;
use App\Kernel\HTTP\RequestInterface;
use App\Kernel\Session\SessionInterface;
use App\Kernel\Storage\StorageInterface;
use App\Kernel\View\ViewInterface;

abstract class Controller
{
    private ViewInterface $view;

    private RequestInterface $request;

    private RedirectInterface $redirect;

    private SessionInterface $session;
    private DatabaseInterface $database;
    private AuthInterface $auth;
    private StorageInterface $storage;

    public function view(string $name, array $data = [], string $title = ''): void
    {
        $this->view->page($name, $data, $title);
    }

    public function setView(ViewInterface $view): void
    {
        $this->view = $view;
    }

    public function request(): RequestInterface
    {
        return $this->request;
    }

    public function setRequest(RequestInterface $request): void
    {
        $this->request = $request;
    }

    public function setRedirect(RedirectInterface $redirect): void
    {
        $this->redirect = $redirect;
    }

    public function redirect(string $url): void
    {
        $this->redirect->to($url);
    }

    public function setSession(SessionInterface $session): void
    {
        $this->session = $session;
    }

    public function session(): SessionInterface
    {
        return $this->session;
    }


    /**
     * @param DatabaseInterface $database
     */
    public function setDatabase(DatabaseInterface $database): void
    {
        $this->database = $database;
    }

    /**
     * @return DatabaseInterface
     */
    public function db(): DatabaseInterface
    {
        return $this->database;
    }

    /**
     * @param AuthInterface $auth
     */
    public function setAuth(AuthInterface $auth): void
    {
        $this->auth = $auth;
    }

    /**
     * @return AuthInterface
     */
    public function auth(): AuthInterface
    {
        return $this->auth;
    }

    /**
     * @return StorageInterface
     */
    public function storage(): StorageInterface
    {
        return $this->storage;
    }

    /**
     * @param StorageInterface $storage
     */
    public function setStorage(StorageInterface $storage): void
    {
        $this->storage = $storage;
    }
}
