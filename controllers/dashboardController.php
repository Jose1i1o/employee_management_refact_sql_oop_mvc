<?php

require_once('config/constants.php');
require_once('config/dbh.php');

require_once MODELS . 'dashboardManager.php';

session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_SESSION["userId"])) {
    // Get form input values
    $userId = $_SESSION["userId"];
}



if (isset($_GET['action'])) {
    $action = $_GET['action'];
    call_user_func($action, $db, $userId);
} else {
    $errorMsg = "No action specified";
    require_once VIEWS . 'error/error.php';
    // error("The function that you are trying to call does not exist");
}

function getAll($db, $userId)
{
    $result = getEmployees($db, $userId);

    if ($result == true) {
        require_once VIEWS . "dashboard/dashboard.php";
    } else {
        $_SESSION["loginError"] = "Wrong email or password!";
        require_once VIEWS . 'error/error.php';
    }
}





// if ($method == 'GET') {
//     if (!$_GET["action"] == "getAll") {
//         //Storing values into an array of objects to make a further bind process
//         $data = [
//             ":name" => "%" . $_GET["name"] . "%",
//             ":email" => "%" . $_GET["email"] . "%",
//             ":gender" => "%" . $_GET["gender"] . "%",
//             ":age" => "%" . $_GET["age"] . "%",
//             ":street" => "%" . $_GET["street"] . "%",
//             ":city" => "%" . $_GET["city"] . "%",
//             ":state" => "%" . $_GET["state"] . "%",
//             ":postalcode" => "%" . $_GET["postalcode"] . "%",
//             ":phone" => "%" . $_GET["phone"] . "%",
//             ':userId' => $_SESSION['id']
//         ];
//         // var_dump($data);
//         // var_dump($_GET);

//         //Prepare the SQL call
//         $query = "SELECT * FROM employee_edit_name WHERE
//     'name' LIKE :name
//     AND 'email' LIKE :email
//     AND 'gender' LIKE :gender
//     AND 'age' LIKE :age
//     AND 'street' LIKE :street
//     AND 'city' LIKE :city
//     AND 'state' LIKE :state
//     AND 'postalcode' LIKE :postalcode
//     AND 'phone' LIKE :phone
//     ORDER BY 'id' ASC
//     ";
//     // } else {
//     //     $query = "SELECT * FROM employee_edit_name";
//     //     $data = null;
//     // }

//     //Preparing and executing the PDO statement to fetch the data into the database
//     // $getQuery = $db->prepare($query);
//     // $getQuery->execute($data);
//     // $result = $getQuery->fetchAll(PDO::FETCH_ASSOC);

//     foreach ($result as $row) {
//         $output[] = array(
//             'id' => intval($row['id']),
//             'name' => $row['name'],
//             'email' => $row['email'],
//             'gender' => $row['gender'],
//             'age' => $row['age'],
//             'street' => $row['street'],
//             'city' => $row['city'],
//             'state' => $row['state'],
//             'postalcode' => $row['postalcode'],
//             'phone' => $row['phone']
//         );
//     }

//     header("Content-Type: application/json; charset=utf-8");
//     echo json_encode($output);
//     //print_r($output);
//     //json_encode($output);
// }

// //Getting values generated from the ajax post method
// if ($method == 'POST' && $_GET['action'] == 'insertNew') {
//     //Storing values into an array of objects to make a further bind process
//     $data = [
//         ':name' => $_POST['name'],
//         ':email' => $_POST['email'],
//         ':gender' => $_POST['gender'],
//         ':age' => $_POST['age'],
//         ':street' => $_POST['street'],
//         ':city' => $_POST['city'],
//         ':state' => $_POST['state'],
//         ':postalcode' => $_POST['postalcode'],
//         ':phone' => $_POST['phone'],
//         ':userId' => $_SESSION['id']
//     ];

//     //Prepare the SQL call
//     $query = "INSERT INTO employee_edit_name (name, email, gender, age, street, city, state, postalcode, phone, userId)
//     VALUES (:name, :email, :gender, :age, :street, :city, :state, :postalcode, :phone, :userId)";

//     //Preparing and executing the PDO statement to post the data into the database
//     $getQuery = $db->prepare($query);
//     $getQuery->execute($data);
// }

// if ($method == 'POST' && isset($_POST['employee'])) {
//     //Getting values generated from the employee form
//     $name = $_POST["name"];
//     $name = $_POST["lastName"];
//     $email = $_POST["email"];
//     $city = $_POST["city"];
//     $state = $_POST["state"];
//     $postCode = $_POST["postalCode"];
//     $lastName = $_POST["lastName"];
//     $gender = $_POST["gender"][0];
//     $streetAddress = $_POST["streetAddress"];
//     $age = $_POST["age"];
//     $phoneNumber = $_POST["phoneNumber"];


//     //Storing values into an array of objects to make a further bind process
//     $data = [
//         ':name' => $name,
//         ':lastname' => $lastName,
//         ':email' => $email,
//         ':gender' => $gender,
//         ':age' => $age,
//         ':street' => $streetAddress,
//         ':city' => $city,
//         ':state' => $state,
//         ':postalcode' => $postCode,
//         ':phone' => $phoneNumber,
//         //':userId' => $_SESSION['id']
//     ];

//     //Prepare the SQL call
//     $query = "INSERT INTO employee_edit_name (name, lastname, email, gender, age, street, city, state, postalcode, phone)
//     VALUES (:name, :lastname, :email, :gender, :age, :street, :city, :state, :postalcode, :phone)";

//     //Preparing and executing the PDO statement to post the data into the database
//     $getQuery = $db->prepare($query);
//     $getQuery->execute($data);

//     //Redirecting to dashboard page after new employee post
//     header("Location: ../dashboard.php");
// }






// //Getting values generated from the ajax put method
// if ($method == 'PUT' && $_GET['action'] == 'update') {
//     //Storing values into an array of objects to make a further bind process
//     parse_str(file_get_contents("php://input"), $_PUT);
//     $stor = $_PUT;
//     $data = [
//         ':id' => intval($stor['id']),
//         ':name' => $stor['name'],
//         ':email' => $stor['email'],
//         ':gender' => $stor['gender'],
//         ':age' => $stor['age'],
//         ':street' => $stor['street'],
//         ':city' => $stor['city'],
//         ':state' => $stor['state'],
//         ':postalcode' => $stor['postalcode'],
//         ':phone' => $stor['phone']
//     ];
//     //Prepare the SQL call
//     $query = "UPDATE employee_edit_name
//     SET
//     name = :name,
//     email = :email,
//     gender = :gender,
//     age = :age,
//     street = :street,
//     city = :city,
//     state = :state,
//     postalcode = :postalcode,
//     phone = :phone
//     WHERE id = :id
//     ";
//     //Preparing and executing the PDO statement to post the data into the database
//     $getQuery = $db->prepare($query);
//     $getQuery->execute($data);
// }

// //Getting values generated from the ajax delete method
// if ($method == "DELETE" && $_GET['action'] == 'delete') {
//     parse_str(file_get_contents("php://input"), $_DELETE);
//     //Storing value into an array of objects to make a further bind process
//     $data = [':id' => $_DELETE["id"]];
//     //Prepare the SQL call
//     $query = "DELETE FROM employee_edit_name WHERE id = :id";
//     //Preparing and executing the PDO statement to delete the data into the database
//     $getQuery = $db->prepare($query);
//     $getQuery->execute($data);
// }

























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