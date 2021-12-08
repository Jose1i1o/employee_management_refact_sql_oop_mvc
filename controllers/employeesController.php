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


  public function read()
  {
    try {
      $this->session->init();
      $email = $this->session->get('email');

      $employees = $this->model->getAll($email);
      echo json_encode($employees);
      http_response_code(200);
    } catch (Throwable $th) {
      http_response_code(400);
      throw new Exception($th->getMessage());
    }
  }

  public function create()
  {
    try {
      $this->session->init();
      $userId = $this->session->get('userId');

      $name = $_POST["name"];
      $email = $_POST["email"];
      $city = $_POST["city"];
      $state = $_POST["state"];
      $postCode = $_POST["postalcode"];
      $gender = $_POST["gender"];
      $streetAddress = $_POST["street"];
      $age = $_POST["age"];
      $phoneNumber = $_POST["phone"];

      $employees = $this->model->createEmployee($name, $email, $gender, $age, $streetAddress, $city, $state, $postCode, $phoneNumber, $userId);
      echo json_encode($employees);
      http_response_code(200);
    } catch (Throwable $th) {
      http_response_code(400);
      throw new Exception($th->getMessage());
    }
  }

  public function update()
  {
      try {
        parse_str(file_get_contents("php://input"), $_PUT);

        $id = intval($_PUT['id']);
        $name = $_PUT['name'];
        $email = $_PUT['email'];
        $gender = $_PUT['gender'];
        $age = $_PUT['age'];
        $streetAddress = $_PUT['street'];
        $city = $_PUT['city'];
        $state = $_PUT['state'];
        $postCode = $_PUT['postalcode'];
        $phoneNumber = $_PUT['phone'];

        $employee = $this->model->updateEmployee($name, $email, $gender, $age, $streetAddress, $city, $state, $postCode, $phoneNumber, $id);
        echo $employee;
        http_response_code(200);
      } catch (Throwable $th) {
        http_response_code(400);
        throw new Exception($th->getMessage());
      }
  }
  public function deleteEmployee($id)
  {
    try {
      $this->session->init();
      $userId = $this->session->get('userId');

      parse_str(file_get_contents("php://input"), $_DELETE);
      $id = intval($_DELETE['id']); // maybe i will need interval as in update
      $idSession = $this->model->delete($id);
      echo json_encode($idSession);
      http_response_code(200);
    } catch (Throwable $th) {
      echo json_encode(['message' =>  "Error deleting {$_DELETE['name']}:" . $th->getMessage()]);
      http_response_code(400);
    }
  }
  public function employeeForm(){
    $this->view->render('employees/newEmployee');
  }





  public function insertEmployee()
  {
      try {
        $this->session->init();
        $userId = $this->session->get('userId');
  
        $name = $_POST["name"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $postCode = $_POST["postalCode"];
        $gender = $_POST["gender"];
        $streetAddress = $_POST["streetAddress"];
        $age = $_POST["age"];
        $phoneNumber = $_POST["phoneNumber"];
  
        $employees = $this->model->createEmployee($name, $email, $gender, $age, $streetAddress, $city, $state, $postCode, $phoneNumber, $userId);
        echo json_encode($employees);
        http_response_code(200);
        header('Location:' . BASE_URL . 'employees');
      } catch (Throwable $th) {
          http_response_code(400);
          echo json_encode(['message' =>  "Error creating {$_POST['name']}:" . $th->getMessage()]);
      }
  }

}
