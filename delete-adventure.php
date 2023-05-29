<?php  include './includes/header.php'; 
       include './includes/db-header.php';

    $message = "";
    $messageClass = "";

    // Check if the adventure ID is provided in the query parameter
    if (isset($_GET["id"])) {
        $adventureId = $_GET["id"];

    // Handle the delete operation here
    // Perform necessary database query to delete the adventure
    // Use prepared statements or proper sanitization to prevent SQL injection

    // Example query using mysqli prepared statement
    $stmt = $conn->prepare("DELETE FROM form_data WHERE id=?");
    $stmt->bind_param("i", $adventureId);

    // Execute the prepared statement
    $stmt->execute();

    // Check if the delete was successful
    if ($stmt->affected_rows > 0) {
        // Delete successful, redirect to the adventures page or display a success message
        $message = "Adventure successfully deleted.";
        $messageClass = "successMessage";
    } else {
        // Delete failed, handle the error accordingly (e.g., display an error message)
        $message = "Failed to delete adventure.";
        $messageClass = "errorMessage";
    }
    header("refresh:3;url=all-adventures.php");

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Delete Adventure</title>
  <!-- logo  -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>
<body>
  <?php include './includes/nav-bar.php';?>
  <main>
    <section class="deleteAdventure">
      <div class="wrapper">
      <?php
        // Check if the update was successful
        // Check if the $message variable is defined
        if (isset($message)) {
            // Display the message with the appropriate CSS class
            echo "<h3 class=\"$messageClass message\" >" . $message . "</h3>";
        }
        ?> 
      </div>
    </section>
  </main>
  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>
</html>
