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


  public function read(){
    try{
    $this->session->init();
    $email = $this->session->get('email');

    $employees = $this->model->getAll($email);
    echo json_encode($employees);
    http_response_code(200);
    
    }
    catch (Throwable $error){
      http_response_code(400);
      throw new Exception($error->getMessage());
    }
  }


  
//   public function create(){

//   }
//   public function update(){

//   }
//   public function delete(){

//   }
// }