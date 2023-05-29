<?php include './includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Isn't Working</title>
  <!-- logo  -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>
<body>
  <?php include './includes/nav-bar.php';?>
  <main>
    <section class="isntWorkingMain">
      <div class="wrapper">
        <!-- links container for back link & logout -->
        <div class="linksContainer">
          <!-- include backLink.php for going back to options -->
          <?php include "./includes/back-link.php"?>
          <!-- include logoutLink.php for link -->
          <?php include "./includes/logout-link.php"?>
        </div>

        <h2>So your computer isn't working...</h2>
        <hr>
        <!-- Content (Gif of your choice) for all roles (Admin, Manager, CEO) -->
        <div class="gifContainer">
          <img src="https://media.tenor.com/0TXhXL0yqDsAAAAd/dean-pelton.gif" alt="Dean Pelton's computer is not working">
        </div>
      </div>
    </section>
  </main>

  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>
</html>