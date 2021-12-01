<?php

require_once('config/constants.php');
require_once('config/dbh.php');

require_once MODELS . 'loginManager.php';

function destroyLastSession()
{
  // Start session
  session_start();

  // Unset all session variables
  unset($_SESSION);

  // Destroy session cookie
  destroySessionCookie();

  // Destroy the session
  session_destroy();
  header("Location: index.php");
}

function destroySession()
{
  // Start session
  session_start();

  // Unset all session variables
  unset($_SESSION);

  // Destroy session cookie
  destroySessionCookie();

  // Destroy the session
  session_destroy();
  // require_once VIEWS . 'login/login.php';
  header("Location: index.php");
}


function destroySessionCookie()
{
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      '',
      time() - 42000,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
    );
  }
}

if (isset($_POST["email"]) && isset($_POST["pass"])) {
  // Get form input values
  $email = $_POST["email"];
  $pass = $_POST["pass"];
}




if (isset($_GET['action'])) {

  $action = $_GET['action'];
  if (isset($email, $pass, $db)) {
    call_user_func($action, $email, $pass, $db);
  } else {
    call_user_func($action);
  }
} else {
  $errorMsg = "No action specified";
  require_once VIEWS . 'error/error.php';
  // error("The function that you are trying to call does not exist");
}



function logout()
{
  destroySession();
}




function authUser($email, $pass, $db)
{
  $result = checkUser($db, $email, $pass);
  if ($result == true) {

    $_SESSION["email"] = $email;
    $_SESSION["userId"] = $result['id'];
    $_SESSION["lastConnection"] = time();

    header("Location: index.php?controllers=dashboard&action=getAll");
  } else {
    $_SESSION["loginError"] = "Wrong email or password!";
    require_once VIEWS . 'error/error.php';
  }
}
