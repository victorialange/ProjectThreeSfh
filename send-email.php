<?php 
include './includes/header.php';
if (isset($_SESSION['redirect'])) {
  header("Location: problem.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- have send email page be displayed for 3 seconds before redirect back to problem.php -->
  <meta http-equiv="refresh" content="3">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Send Email</title>
  <!-- logo  -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>
<body>
  <?php include './includes/nav-bar.php';?>
  <main>
    <section class="sendEmailMain">
      <div class="wrapper">
        <div class="linksContainer">
          <!-- include backLink.php for going back to options -->
          <?php include "./includes/back-link.php"?>
          <!-- include logoutLink.php for link -->
          <?php include "./includes/logout-link.php"?>
        </div>

        <!-- if emailType = newAccount-> just display new account msg  -->
        <?php if ( $_SESSION['emailType'] == "newAccount" ) { ?> 
          <h3 class="message">New Account was created successfully.</h3>    
        <?php } ?>

        <!-- if emailType = lostPassword-> just display lost password msg -->
        <?php if ( $_SESSION['emailType'] == "lostPassword" ) { ?> 
          <h3 class="message">Your new password is being sent to your email.</h3>    
        <?php } ?>
      </div>
    </section>
  </main>

  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>
</html>
<?php 
  $_SESSION['redirect']="redirect";
?>