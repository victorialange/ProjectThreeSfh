<?php include './includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Admin - Add Adventure</title>
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

        <h2>Admin - Add Adventure</h2>
        <hr>
        <!-- Content - form to add data to DB -->
        <h3>Input details about the trip</h3>

        <!-- form with 4 fields -->
        <!-- send values of form to admin-confirm.php -->
        <form action="admin-confirm.php" method="post" class="addAdventureForm">
          <!-- 1st field: input for heading -->
          <label for="heading" class="">Heading</label>
          <input name="heading" id="heading" type="text" required placeholder="" maxlength="255" />

          <!-- 2nd field: input for trip date -->
          <label for="tripDate" class="">Trip Date</label>
          <input type="date" name="tripDate" id="tripDate" placeholder="mm/dd/yyyy" required />

          <!-- 3rd field: input for duration -->
          <label for="duration" class="">Duration</label>
          <!-- prevent weird entries by requiring duration to be greater than 0/at least 1 -->
          <input type="number" name="duration" id="duration" placeholder="Number of days" min="1" required />

          <!-- 4th field: textarea for summary -->
          <label for="summary" class="">Summary</label>
          <textarea name="summary" id="summary" rows="4" required type="text" minlength="10" maxlength="1000"></textarea>

          <!-- submit button -->
          <button type="submit" name="submit" value="Submit">Submit</button>
        </form>
      </div>
    </section>
  </main>

  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>
</html>