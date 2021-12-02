<?php

class Session
{
    public function init()
    {
        if ($this->getStatus() !== PHP_SESSION_ACTIVE)
            session_start();
    }

    public function add()
    {
    }

    public function remove()
    {
    }

    public function get()
    {
    }

    public function getAll()
    {
    }

    public function close()
    {
        session_unset();
        session_destroy();
        $this->destroyCookies();
    }

    public function destroyCookies()
    {
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 50000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httpOnly']
            );
        }
    }

    public function getStatus()
    {
        return session_status();
    }
}
