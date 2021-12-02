<?php

class EmployeesController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->view->message = 'Employees';
    $this->session = new Session();
    $this->session->init();
  }

  public function render()
  {
    $this->view->render('employees/employees');
  }
}