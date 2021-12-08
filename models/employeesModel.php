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

  public function createEmployee($name, $email, $gender, $age, $street, $city, $state, $postalcode, $phone, $userId)
  {
    try {

      $employee = null;
      $this->db->connect();
      $this->db->query(
        "INSERT INTO employee_edit_name (name, email, gender, age, street, city, state, postalcode, phone, userId)
        VALUES (:name, :email, :gender, :age, :street, :city, :state, :postalcode, :phone, :userId)"
      );

      $this->db->bind(':name', $name);
      $this->db->bind(':email', $email);
      $this->db->bind(':gender', $gender);
      $this->db->bind(':age', $age);
      $this->db->bind(':street', $street);
      $this->db->bind(':city', $city);
      $this->db->bind(':state', $state);
      $this->db->bind(':postalcode', $postalcode);
      $this->db->bind(':phone', $phone);
      $this->db->bind(':userId', $userId);

      $employee = $this->db->execute();
      return $employee;
    } catch (PDOException $error) {
      echo $error;
      throw new Exception($error->getMessage());
    }
  }

  public function updateEmployee($name, $email, $gender, $age, $street, $city, $state, $postalcode, $phone, $id)
  {
    try {

      $employee = null;
      $this->db->connect();
      $this->db->query(
        "UPDATE employee_edit_name
        SET
        name = :name,
        email = :email,
        gender = :gender,
        age = :age,
        street = :street,
        city = :city,
        state = :state,
        postalcode = :postalcode,
        phone = :phone
        WHERE id = :id"
      );

      $this->db->bind(':name', $name);
      $this->db->bind(':email', $email);
      $this->db->bind(':gender', $gender);
      $this->db->bind(':age', $age);
      $this->db->bind(':street', $street);
      $this->db->bind(':city', $city);
      $this->db->bind(':state', $state);
      $this->db->bind(':postalcode', $postalcode);
      $this->db->bind(':phone', $phone);
      $this->db->bind(':id', $id);

      $employee = $this->db->execute();
      return $employee;
    } catch (PDOException $error) {
      echo $error;
      throw new Exception($error->getMessage());
    }
  }

  public function delete($id)
  {
    $query = $this->db->connect()->prepare("DELETE FROM employee_edit_name WHERE id = :id");
    try {
      $query->execute([
        'id' => $id,
      ]);
      return true;
    } catch (PDOException $error) {
      throw new Exception($error->getMessage());
    }
  }

  public function insert(array $data)
    {
        // $age = ['age'];
        // $postalCode = ['postalcode'];
        // $gender = ['gender'];
        // $lastname = ['lastname'];
        try {
          $employee = null;
          $this->db->connect();
          $this->db->query(
            "INSERT INTO employee_edit_name (name, lastName, email, gender, age, street, city, state, postalcode, phone, userId)
            VALUES (:name, :lastName, :email, :gender, :age, :street, :city, :state, :postalcode, :phone, :userId)"
          );

            $this->db->bind(':name', $name);
            $this->db->bind(':lastName', $lastName);
            $this->db->bind(':email', $email);
            $this->db->bind(':gender', $gender);
            $this->db->bind(':age', $age);
            $this->db->bind(':street', $street);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':postalcode', $postalcode);
            $this->db->bind(':phone', $phone);
            $this->db->bind(':userId', $userId);

            $employee = $this->db->execute();
            return $employee;

            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
