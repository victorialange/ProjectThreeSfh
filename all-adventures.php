<?php
include "./includes/header.php";
include './includes/db-header.php';

// Retrieve all adventures from the database
$sql = "SELECT * FROM form_data";
$result = $conn->query($sql);
?>
