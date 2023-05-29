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
