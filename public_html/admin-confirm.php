<?php include './includes/header.php'; 
      include './includes/db-header.php';

    // checking if session run is false (only initialize variables and populate session variables with form data when session isn't run)
    // initialize variables with empty values
    $heading = "";
    $tripDate = "";
    $duration = "";
    $summary = "";

    // checking if data posted from form is set
    if (isset($_POST['heading']) && isset($_POST['tripDate']) && isset($_POST['duration']) && isset($_POST['summary'])) {
      // checking that data isn't empty
      if (!empty($_POST['heading']) && !empty($_POST['tripDate']) && !empty($_POST['duration']) && !empty($_POST['summary'])) {
        // retrieving post variables from form
        // storing values from post variable in initialized variables from above
        // if user selects other for title don't display it on the screen
        $heading = $_POST['heading'];
        $tripDate = $_POST['tripDate'];
        $duration = $_POST['duration'];
        $summary = $_POST['summary'];
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Confirm</title>
  <link href="style.css" rel="stylesheet" type="text/css"/>
  <!-- logo  -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>
<body>
  <?php include './includes/nav-bar.php';?>
  <main>
    <section class="problemMain">
      <div class="wrapper">
        <!-- links container for back link & logout -->
        <div class="linksContainer">
          <!-- include backLink.php for going back to options -->
          <?php include "./includes/back-link.php"?>
          <!-- include logoutLink.php for link -->
          <?php include "./includes/logout-link.php"?>
        </div>

        <h2>Admin - Confirm</h2>
        <hr>
        <!-- check if insertion/update was successful (affected rows greater than 0)  -->
        <!-- error handling for when error in saving form data to db -->
        <?php 
          // insert form data into form_data table
          // use placeholders for insertion query through prepared statements to prevent SQL injection attacks
          $insertQuery = "INSERT INTO form_data (heading, tripDate, duration, summary)
          VALUES (?, ?, ?, ?)
          ON DUPLICATE KEY UPDATE tripDate = VALUES(tripDate), duration = VALUES(duration), summary = VALUES(summary)";

          // stmt - represents prepared statement for insertQuery
          // prepare() - prepares query for execution by the database server
          $stmt = $conn->prepare($insertQuery);
          // bind_param() - binds variables to prepared statement's placeholders (4 question marks) => helps prevent SQL injection attacks (escape values & ensure correct data types); first parameter for data types of the bound variables (string "ssis" represents data types of inserted values - string, string, int, string), parameters after are variables themselves
          $stmt->bind_param("ssis", $heading, $tripDate, $duration, $summary);
          // execute() - executes prepared statement with bound parameters; sends parameter values to the database server & performs query (if execution successful, returns true, else returns false)
          // Execute the prepared statement
          $stmt->execute();

          // Get the number of affected rows
          $affectedRows = $stmt->affected_rows;

          // Check if any columns have been updated
          if ($affectedRows > 0) {
              if ($affectedRows == 1) {
                  if ($stmt->insert_id > 0) {
                      echo "<p>A new record has been inserted.</p>";
                  }
              } else {
                  echo "An existing record has been updated.</p>";
              }
              echo '<a href="all-adventures.php">View All Adventures</a>';
          } else {
              // No changes were made to the database
              if ($stmt->insert_id > 0) {
                  echo "<p>A new record has been inserted.</p>";
              } else {
                  if ($stmt->error) {
                      echo "<p>Error: " . $stmt->error . "</p>";
                  } else {
                      echo "<p>No changes were made to the database.</p>";
                  }
              }
              echo '<a href="all-adventures.php">View All Adventures</a>';
          }
        ?>
      </div>
    </section>
  </main>
  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>
</html>