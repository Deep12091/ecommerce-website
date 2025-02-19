<?php

session_start();

include('../server/connection.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce website</title>
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  </head>
  <body>
    
    <!--navbar-->
    <header class="navbar navbar-light bg-white sticky-top flex-md-nowrap p-0 shadow">
      
      <div class="container">
        <img class="logo" src="../assets/imgs/logo.jpg"/>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <?php if(isset($_SESSION['admin_logged_in'])) { ?>
            <a class="nav-link px-3" href="logout.php?logout=1" >Sign Out</a>
            <?php } ?>
          </div>
        </div>
    </header>
