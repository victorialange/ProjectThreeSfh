<?php include './includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Create New Account</title>
  <!-- logo  -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>
<body>
  <?php include './includes/nav-bar.php';?>
  <main>
    <section class="newAccountMain">
      <div class="wrapper">
        <div class="linksContainer">
          <!-- include backLink.php for going back to options -->
          <?php include "./includes/back-link.php"?>
          <!-- include logoutLink.php for link -->
          <?php include "./includes/logout-link.php"?>
        </div>
        <!-- Content -->
        <h2>Create A New Account</h2>
        <hr>
      </div>
      <div class="wrapper">
        <!-- Form redirect to -> send-email.php emailType = newAccount -->
        <form action="send-email.php" method="post" class="sendEmailForm">
          <!-- email input -->
          <label for="newEmail">Email: </label>
          <input type="email" name="email" id="newEmail" placeholder="Your Email" required>
          <!-- can be hidden input in order to store emailType value as newAccount -->
          <input type="hidden" name="emailType" value="newAccount">
          <!-- submit button -->
          <button type="submit" name="submit">Create account</button>
        </form>
      </div>
    </section>
  </main>

  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>
</html>