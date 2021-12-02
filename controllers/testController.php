<?php

class TestController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->view->message = 'Test';
    $this->session = new Session();
    $this->session->init();
    echo "I am the test";
    echo "<br>";
  }

  public function render()
  {
    $this->view->render('test');
  }
}