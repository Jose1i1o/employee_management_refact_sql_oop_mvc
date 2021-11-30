<?php

require_once('config/constants.php');
require_once('config/dbh.php');

require_once MODELS . 'loginManager.php';

// require_once("./loginManager.php");
// require_once("../../config/dbh.php");

// require_once 'sessionHelper.php';

// function checkSession()
// {
//   // Start session
//   session_start();

//   $urlFile = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

//   if ($urlFile == "index.php" || $urlFile == "demo") {

//     if (!isset($_SESSION["lastConnection"])) {
//       // Check for time session
//       if ($alert = checkTimeExpire()) return $alert;
//     }

//     if (isset($_SESSION["email"])) {
//       header("Location: ../dashboard.php");
//     } else {

//       // Check for session error
//       if ($alert = checkLoginError()) return $alert;

//       // Check for info session variable
//       if ($alert = checkLoginInfo()) return $alert;

//       // Check for logout
//       if ($alert = checkLogout()) return $alert;
//     }
//   } else {
//     if (!isset($_SESSION["email"]) || !isset($_SESSION["lastConnection"])) {
//       $_SESSION["loginError"] = "You don't have permission to enter the dashboard. Please Login.";
//       header("Location: ../../index.php");
//     }

//     if (isset($_SESSION["lastConnection"]) && (time() - $_SESSION["lastConnection"] >= 3000)) {
//       $_SESSION["timeExpire"] = "Time expired! Please Login.";
//       unset($_SESSION["lastConnection"]);
//       destroyLastSession();
//     }
//   }
// }

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
  header("Location: index.php?timeExpire=true");
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
  header("Location: index.php?logout=true");
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

// function checkLoginError()
// {
//   if (isset($_SESSION["loginError"])) {
//     $errorText = $_SESSION["loginError"];
//     unset($_SESSION["loginError"]);
//     return ["type" => "danger", "text" => $errorText];
//   }
// }

// function checkLoginInfo()
// {
//   if (isset($_SESSION["loginInfo"])) {
//     $infoText = $_SESSION["loginInfo"];
//     unset($_SESSION["loginInfo"]);
//     return ["type" => "primary", "text" => $infoText];
//   }
// }

// function checkLogout()
// {
//   if (isset($_GET["logout"]) && !isset($_SESSION["email"])) return ["type" => "primary", "text" => "Logout succesful"];
// }

// function checkTimeExpire()
// {
//   if (isset($_GET["timeExpire"]) && isset($_SESSION["lastConnection"])) {
//     $errorText = $_SESSION["timeExpire"];
//     unset($_SESSION["timeExpire"]);
//     return ["type" => "danger", "text" => "Time expired! Please Login."];
//   }
// }













if (isset($_GET['action'])) {

  $action = $_GET['action'];
  call_user_func($action, $email, $pass);
} else {
  $errorMsg = "No action specified";
  require_once VIEWS . 'error/error.php';
  // error("The function that you are trying to call does not exist");
}



if (isset($_POST["login"]) && isset($_POST["pass"])) {
  // Get form input values
  $email = $_POST["email"];
  $pass = $_POST["pass"];
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

    require_once CONTROLLERS . 'dashboardController.php';
  } else {
    $_SESSION["loginError"] = "Wrong email or password!";
    require_once VIEWS . 'error/error.php';
  }
}




// if (isset($_GET['logout']) && $_GET['logout']) {
//   destroySession();
// } else {
//   $result = authUser($db, $email, $pass);
//   if ($result == true) {
//     // we usually save in a session variable user id and other user data like name, surname....
//     $_SESSION["email"] = $email;
//     $_SESSION["userId"] = $result['id'];
//     // we save the last connection
//     $_SESSION["lastConnection"] = time();
//     // when we check that the email and password is correct, we redirect the user to the dashboard
//     header("Location: ../dashboard.php");
//   } else {
//     $_SESSION["loginError"] = "Wrong email or password!";
//     header("Location: ../../index.php");
//   }
// }