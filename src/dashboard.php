<?php
require_once './library/loginManager.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

checkSession();

include_once '../assets/html/header.html';
?>

<div class="container-fluid">
  <div class="row">

    <main class="col-12 ms-sm-auto px-md-4">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
          Welcome <span class="text-primary"><?= strstr($_SESSION['email'], '@', true) ?></span>
        </h1>
      </div>

      <div id="jsGrid"></div>
    </main>
  </div>
</div>


<?php include_once '../assets/html/footer.html'; ?>