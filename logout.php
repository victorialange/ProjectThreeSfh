<?php
  include './includes/header.php';
  if (isset($_SESSION['kill'])) {
    $_SESSION = [];
    // Destroy session
    session_unset();
    session_destroy();
    // this will redirect the user again to the "login page/ the support form"
    header("Location: project2-home.php"); 
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- have logout page be displayed for 3 seconds before redirect -->
  <meta http-equiv="refresh" content="3">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Logout</title>
  <!-- logo  -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>
<body>
  <?php include './includes/nav-bar.php';?>
  <main>
    <section class="logoutMain">
      <div class="wrapper">
        <!-- Content: Confirm Logout -->
        <h3 class="message">You logged out successfully.</h3>
      </div>
    </section>
  </main>
  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>
</html>
<?php 
  $_SESSION['kill']="kill";
?>