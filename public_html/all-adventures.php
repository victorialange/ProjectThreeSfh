<?php
include "./includes/header.php";
include './includes/db-header.php';

// Retrieve all adventures from the database
$sql = "SELECT * FROM form_data";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Admin - All Adventures</title>
  <!-- logo  -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>

<body>
  <?php include './includes/nav-bar.php'; ?>
  <main>
    <section class="isntWorkingMain">
      <div class="wrapper">
        <!-- links container for back link & logout -->
        <div class="linksContainer">
          <!-- include backLink.php for going back to options -->
          <?php include "./includes/back-link.php" ?>
          <!-- include logoutLink.php for link -->
          <?php include "./includes/logout-link.php" ?>
        </div>

        <h2>Admin - All Adventures</h2>
        <hr>

        <!-- TODO: decide whether it's better to replace index.html with this file since it is practically the same layout (also need to decide: should placeholder data already exist without it having been inserted into DB via form?) -->
        <!-- IF SO, might have to add image file upload to form -->
        <!-- TODO: add styling & display data in more proper format -->

        <?php
        // Check if there is any data
        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "Heading: " . $row["heading"] . "<br>";
            echo "Trip Date: " . $row["tripDate"] . "<br>";
            echo "Duration: " . $row["duration"] . "<br>";
            echo "Summary: " . $row["summary"] . "<br>";
            echo "<br>";
            // TODO: add days and conditional logic for day VS days (check whether duration value is 1)
          }
        } else {
          echo "No adventures found.";
        }

        // Close the result set
        $result->close();

        // Close the database connection
        $conn->close();
        ?>

      </div>
    </section>
  </main>

  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>

</html>