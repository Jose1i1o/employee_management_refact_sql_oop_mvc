<?php

class ErrorController extends Controller
{

    function __construct($message)
    {
        parent::__construct();
        $this->view->errorMsg = $message;
        $this->view->render('error/error');
    }

    public function render()
    {
    }
}
