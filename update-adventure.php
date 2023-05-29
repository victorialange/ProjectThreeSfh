<?php include './includes/header.php'; 
      include './includes/db-header.php';

    $message = "";
    $messageClass = "";

// Perform validation
if (empty($_POST['updateHeading']) && empty($_POST['updateDate']) && empty($_POST['updateDuration']) && empty($_POST['updateSummary'])) {
    // Set error message in session
   $message = "Please fill out at least one field.";
   $messageClass = "errorMessage";
   header("refresh:3;url=all-adventures.php");
}
// Check if the adventure ID is provided in the query parameter
if (isset($_GET["id"])) {
    // Retrieve the adventure ID from the query parameter
    $adventureId = $_GET["id"];

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the updated form data
        $heading = $_POST['updateHeading'];
        $tripDate = $_POST['updateDate'];
        $duration = $_POST['updateDuration'];
        $summary = $_POST['updateSummary'];

        // Handle the update operation here
        // Perform necessary database query to update the adventure
        // Use prepared statements or proper sanitization to prevent SQL injection
        // Perform the update operation
        // Build the update query dynamically based on the provided input fields (to avoid null entries when no user input for certain fields)
        $updateQuery = "UPDATE form_data SET ";
        $updateParams = [];
        if (!empty($heading)) {
            $updateQuery .= "heading = ?, ";
            $updateParams[] = $heading;
        }
        if (!empty($tripDate)) {
            $updateQuery .= "tripDate = ?, ";
            $updateParams[] = $tripDate;
        }
        if (!empty($duration)) {
            $updateQuery .= "duration = ?, ";
            $updateParams[] = $duration;
        }
        if (!empty($summary)) {
            $updateQuery .= "summary = ?, ";
            $updateParams[] = $summary;
        }
        $updateQuery = rtrim($updateQuery, ", ") . " WHERE id = ?";
        $updateParams[] = $adventureId;

        // Prepare and execute the update statement
        $stmt = $conn->prepare($updateQuery);

        if ($stmt === false) {
            // Error occurred while preparing the query
            $message = "Failed to prepare the update statement due to empty form input.";
            $messageClass = "errorMessage";
            header("refresh:3;url=all-adventures.php");
        } else {
            // Check if there are parameters to bind and execute the update statement
            // subtract 1 from the count of $updateParams to exclude adventure ID from binding since id is bound separately as an integer, so should not be included in the type definition string
            $stmt->bind_param(str_repeat('s', count($updateParams) - 1).'i', ...$updateParams);
            $stmt->execute();
        
            // Check if the update was successful
            if ($stmt->affected_rows > 0) {
                // Update successful, redirect to the adventures page or display a success message
                $message = "Adventure updated successfully!";
                $messageClass = "successMessage";
            } else {
                // Update failed, handle the error accordingly (e.g., display an error message)
                $message = "Adventure remains unchanged.";
                // $messageClass = "error-message";
            }
            header("refresh:3;url=all-adventures.php");

            // Close the prepared statement
            $stmt->close();
        }
    }
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
  <title>Update Adventure</title>
  <!-- logo  -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>
<body>
  <?php include './includes/nav-bar.php';?>
  <main>
    <section class="updateAdventure">
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
