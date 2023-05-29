<?php include './includes/header.php'; 
      include './includes/db-header.php';

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
        $heading = $_POST['heading'];
        $tripDate = $_POST['tripDate'];
        $duration = $_POST['duration'];
        $summary = $_POST['summary'];
      }
    }
?>
