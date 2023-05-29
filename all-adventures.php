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
    <!-- welcome img -->
    <?php include './includes/welcome-section.php'; ?>
    <!-- ADMIN ADVENTURES -->
    <section class="adventues" id="mainContent">
      <!-- WRAPPER -->
      <div class="wrapper">
        <!-- links container for back link & logout -->
        <div class="linksContainer">
          <!-- include backLink.php for going back to options -->
          <?php include "./includes/back-link.php" ?>
          <!-- include logoutLink.php for link -->
          <?php include "./includes/logout-link.php" ?>
        </div>
        <h3>Upcoming Adventures (Admin)</h2>
        <hr>

        <!-- TODO: decide whether it's better to replace index.html with this file since it is practically the same layout (also need to decide: should placeholder data already exist without it having been inserted into DB via form?) -->
        <!-- IF SO, might have to add image file upload to form -->
        <div class="dbContainer">
          <?php
          // Check if there is any data
          if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
              // heading
              echo "<h4>" . $row["heading"] . "</h4>";
              // ul
              echo "<ul class='dbList'>";
              // Date
              echo "<li>Date: " . $row["tripDate"] . "</li>";
              // Duration
              $days = (intval($row["duration"]) === 1) ? "day" : "days"; // Compare as integer (since when retrieved from db might be treated as string)
              echo "<li>Duration: " . $row["duration"] . " " . $days . "</li>";
              // Summary
              echo "<li class='summary'>";
              echo "<h5>Summary</h5>";
              echo "<p>" . $row["summary"] . "</p>";
              echo "</li>";
              // end of ul
              echo "</ul>";
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
      </div>
    </section>
  </main>
  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>
</html>