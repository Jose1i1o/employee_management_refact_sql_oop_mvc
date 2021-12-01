<?php
// require_once 'sessionHelper.php';

function checkUser($db, $email, $pass)
{
  // Start session
  session_start();

  $query = $db->prepare("SELECT * FROM user WHERE email = :email AND password = :pass");
  $query->bindParam(':email', $email);
  $query->bindParam(':pass', $pass);

  // Now we should look for this values in a database
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  return $result;
}


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

// function destroyLastSession()
// {
//   // Start session
//   session_start();

//   // Unset all session variables
//   unset($_SESSION);

//   // Destroy session cookie
//   destroySessionCookie();

//   // Destroy the session
//   session_destroy();
//   header("Location:../index.php?timeExpire=true");
// }

// function destroySession()
// {
//   // Start session
//   session_start();

//   // Unset all session variables
//   unset($_SESSION);

//   // Destroy session cookie
//   destroySessionCookie();

//   // Destroy the session
//   session_destroy();
//   header("Location:../../index.php?logout=true");
// }



// // function checkUser(string $email, string $pass)
// // {
// //   $jsonData = file_get_contents('../../resources/users.json');
// //   $usersData = json_decode($jsonData, true);
// //   $users = $usersData["users"];

// //   foreach ($users as $user) {
// //     if (array_search(
// //       $email,
// //       $user
// //     ) !== false) {
// //       $currentUser = $user;
// //     }
// //   }

// //   if (isset($currentUser) && password_verify($pass, $currentUser["password"])) {
// //     return true;
// //   } else {
// //     return false;
// //   }
// // }

// function destroySessionCookie()
// {
//   if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(
//       session_name(),
//       '',
//       time() - 42000,
//       $params["path"],
//       $params["domain"],
//       $params["secure"],
//       $params["httponly"]
//     );
//   }
// }

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