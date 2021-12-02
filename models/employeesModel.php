<?php

class EmployeesModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($email)
  {
    try {

      $employees = null;
      $this->db->connect();
      $this->db->query("SELECT * FROM employee_edit_name WHERE userId = (SELECT id FROM user WHERE email = :email)");
      $this->db->bind(':email', $email);
      $employees = $this->db->dataSet();
      return $employees;
    } catch (PDOException $error) {
      echo $error;
      throw new Exception($error->getMessage());
    }
  }
}