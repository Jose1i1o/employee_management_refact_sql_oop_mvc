<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Hugo 0.83.1" />

  <!-- JQuery -->
  <script src="<?= BASE_URL ?>node_modules\jquery\dist\jquery.min.js"></script>

  <!-- JSGrid -->
  <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>node_modules\jsgrid\dist\jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>node_modules\jsgrid\dist/jsgrid-theme.min.css" />
  <script type="text/javascript" src="<?= BASE_URL ?>node_modules\jsgrid\dist\jsgrid.min.js"></script>
  <!-- jsGrid Library -->
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/jsgrid.core.js"></script>
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/jsgrid.load-indicator.js"></script>
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/jsgrid.load-strategies.js"></script>
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/jsgrid.sort-strategies.js"></script>
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/jsgrid.validation.js"></script>
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/jsgrid.field.js"></script>
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/fields/jsgrid.field.text.js"></script>
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/fields/jsgrid.field.number.js"></script>
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/fields/jsgrid.field.checkbox.js"></script>
  <script src="<?= BASE_URL ?>node_modules/jsgrid/src/fields/jsgrid.field.control.js"></script>

  <title>PHP Employees Management</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?= BASE_URL ?>node_modules/bootstrap/dist/css/bootstrap.min.css" />

  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  </style>

  <!-- Custom styles for this template -->
  <link href="<?= BASE_URL ?>assets/css/main.css" rel="stylesheet" />
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand px-3 m-0" href="#">Employees Management</a>
    <ul class="navbar-nav d-flex flex-row justify-content-start mr-auto px-2">
      <li class="nav-item text-nowrap px-2">
        <a class="nav-link" href="<?= BASE_URL . 'employees' ?>">Dashboard</a>
      </li>
      <li class="nav-item text-nowrap px-2">
        <a class="nav-link" href="<?= BASE_URL . 'employees/employeeForm' ?>">Employee</a>
      </li>
    </ul>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap px-2">
        <a class="nav-link" href="<?= BASE_URL . 'login/signOut' ?>">Sign out</a>
      </li>
    </ul>
  </header>