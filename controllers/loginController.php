<?php

require_once(LIBS . '/session.php');

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function render()
    {
        $this->view->render('login/login');
    }

    public function signIn()
    {
    }

    public function signOut()
    {
        $this->session->close();
        header('Location: ' . BASE_URL);
    }
}
