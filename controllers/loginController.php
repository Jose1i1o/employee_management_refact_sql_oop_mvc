<?php

require_once(LIBS . '/session.php');

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->view->message = 'Login';
        $this->session = new Session();
        $this->session->init();

        if (!empty($this->session->get('email')))
            header('Location' . BASE_URL . 'employees');
    }

    public function render()
    {
        $this->view->render('login/login');
    }

    public function signIn()
    {
        $result = $this->model->get($_POST);
        if ($result) {
            // if (password_verify($_POST['password'], $result->password)) {
            $this->session->init();
            $this->session->add('email', $result->email);
            $this->session->add('timeout', time());

            header('Location: ' . BASE_URL . 'employees');
            // } else {
            //     $this->view->message = "Please try with another email or password.";
            //     $this->render();
            // }
        } else {
            $this->view->message = "Please try with another email or password.";
            $this->render();
        }
    }

    public function signOut()
    {
        $this->session->close();
        header('Location: ' . BASE_URL);
    }
}