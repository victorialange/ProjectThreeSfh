<?php
  include '../config.php';
  // Attempt MySQL server connection
  // Use credentials from config file
  $servername = DB_SERVER;
  $username = DB_USERNAME;
  $password = DB_PASSWORD;
  $dbname = DB_NAME;

  // Establish database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // check connection
  if ($conn->connect_error) {
    die("ERROR: Failed to connect: " .$conn->connect_error);
  }

  // unique constraint added to database to use upsert-like approach (more efficient to have it all in one query instead of having to check first with separate query whether data already exists), so id as primary key and heading as unique key, to ensure unique combination
  // if unique constraint is not met, entry for heading doesn't get inserted into database, but remaining columns get updated with new entries
?>