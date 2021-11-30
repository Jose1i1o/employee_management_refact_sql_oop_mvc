<?php
require_once("./loginManager.php");
require_once("../../config/dbh.php");


if (isset($_GET['logout']) && $_GET['logout']) {
  destroySession();
} else {
  authUser($db);
};
