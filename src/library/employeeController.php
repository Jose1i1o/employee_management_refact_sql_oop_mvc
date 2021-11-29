<?php

require_once('../../config/dbh.php');


//Session to get the user id passed from login page
session_start();
// DASHBOARD CRUD
$method = $_SERVER['REQUEST_METHOD'];

var_dump($method);
//Getting values generated from the ajax get method
if ($method == 'GET') {
    //Storing values into an array of objects to make a further bind process
    $data = [
        ':name' => "%" . $_GET['name'] . "%",
        ':email' => "%" . $_GET['email'] . "%",
        ':gender' => "%" . $_GET['gender'] . "%",
        ':age' => "%" . $_GET['age'] . "%",
        ':street' => "%" . $_GET['street'] . "%",
        ':city' => "%" . $_GET['city'] . "%",
        ':state' => "%" . $_GET['state'] . "%",
        ':postalcode' => "%" . $_GET['postalcode'] . "%",
        ':phone' => "%" . $_GET['phone'] . "%"
        // ':userId' => $_SESSION['id']
    ];
    // var_dump($data);
    // var_dump($_GET);

    //Prepare the SQL call
    $query = "SELECT * FROM employee_edit_name WHERE
    name LIKE :name
    AND email LIKE :email
    AND gender LIKE :gender
    AND age LIKE :age
    AND street LIKE :street
    AND city LIKE :city
    AND state LIKE :state
    AND postalcode LIKE :postalcode
    AND phone LIKE :phone
    -- ORDER BY id DESC
    ";

    //Preparing and executing the PDO statement to fetch the data into the database
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
    $result = $getQuery->fetchAll();

    //Printing the data into the dashboard table
    foreach ($result as $row) {
        $output[] = array(
            'id' => intval($row['id']),
            'name' => $row['name'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'age' => $row['age'],
            'street' => $row['street'],
            'city' => $row['city'],
            'state' => $row['state'],
            'postalcode' => $row['postalcode'],
            'phone' => $row['phone']
        );
    }

    header("Content-Type: application/json");
    var_dump(json_encode($output));
    var_dump($output);
}

//Getting values generated from the ajax post method
if ($method == 'POST' && !isset($_POST['employee'])) {
    //Storing values into an array of objects to make a further bind process
    $data = [
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':gender' => $_POST['gender'],
        ':age' => $_POST['age'],
        ':street' => $_POST['street'],
        ':city' => $_POST['city'],
        ':state' => $_POST['state'],
        ':postalcode' => $_POST['postalcode'],
        ':phone' => $_POST['phone'],
        ':userId' => $_SESSION['id']
    ];

    //Prepare the SQL call
    $query = "INSERT INTO employee_edit_name (name, email, gender, age, street, city, state, postalcode, phone, userId)
    VALUES (:name, :email, :gender, :age, :street, :city, :state, :postalcode, :phone, :userId)";

    //Preparing and executing the PDO statement to post the data into the database
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

if ($method == 'POST' && isset($_POST['employee'])) {
    //Getting values generated from the employee form
    $name = $_POST["name"];
    $name = $_POST["lastName"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postCode = $_POST["postalCode"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"][0];
    $streetAddress = $_POST["streetAddress"];
    $age = $_POST["age"];
    $phoneNumber = $_POST["phoneNumber"];


    //Storing values into an array of objects to make a further bind process
    $data = [
        ':name' => $name,
        ':lastname' => $lastName,
        ':email' => $email,
        ':gender' => $gender,
        ':age' => $age,
        ':street' => $streetAddress,
        ':city' => $city,
        ':state' => $state,
        ':postalcode' => $postCode,
        ':phone' => $phoneNumber,
        ':userId' => $_SESSION['id']
    ];

    //Prepare the SQL call
    $query = "INSERT INTO employee_edit_name (name, lastname, email, gender, age, street, city, state, postalcode, phone, userId)
    VALUES (:name, :lastname, :email, :gender, :age, :street, :city, :state, :postalcode, :phone, :userId)";

    //Preparing and executing the PDO statement to post the data into the database
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);

    //Redirecting to dashboard page after new employee post
    header("Location: ../dashboard.php");

    //Getting the method request from the ajax call in the dashboard page
    $method = $_SERVER['REQUEST_METHOD'];
}






//Getting values generated from the ajax put method
if ($method == 'PUT') {
    //Storing values into an array of objects to make a further bind process
    parse_str(file_get_contents("php://input"), $_PUT);
    $stor = $_PUT;
    $data = [
        ':id' => intval($stor['id']),
        ':name' => $stor['name'],
        ':email' => $stor['email'],
        ':gender' => $stor['gender'],
        ':age' => $stor['age'],
        ':street' => $stor['street'],
        ':city' => $stor['city'],
        ':state' => $stor['state'],
        ':postalcode' => $stor['postalcode'],
        ':phone' => $stor['phone']
    ];
    //Prepare the SQL call
    $query = "UPDATE employee_edit_name
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
    WHERE id = :id
    ";
    //Preparing and executing the PDO statement to post the data into the database
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

//Getting values generated from the ajax delete method
if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);
    //Storing value into an array of objects to make a further bind process
    $data = [':id' => $_DELETE["id"]];
    //Prepare the SQL call
    $query = "DELETE FROM employee_edit_name WHERE id = :id";
    //Preparing and executing the PDO statement to delete the data into the database
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

























// $method = $_SERVER['REQUEST_METHOD'];
// $addEmployee = $_GET['addEmployee'];

// if ($method == "POST" && !$_GET['addEmployee']) {
//   $created = addEmployee($_POST);

//   return true;
// }

// if ($method == "POST" && $_GET['addEmployee']) {
//   $created = addEmployee($_POST);

//   return header("Location:../dashboard.php");
// }

// if ($method == "PUT") {
//   parse_str(file_get_contents("php://input"), $_PUT);

//   $updated = updateEmployee($_PUT);

//   return true;
// }

// if ($method == "DELETE") {
//   parse_str(file_get_contents("php://input"), $_DELETE);

//   $deleted = deleteEmployee($_DELETE["id"]);

//   return true;
// }