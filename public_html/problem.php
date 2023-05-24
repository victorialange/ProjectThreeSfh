<?php include './includes/header.php'; 
  // checking if session run is false (only initialize variables and populate session variables with form data when session isn't run)
  if (!isset($_SESSION["run"]) || $_SESSION["run"] !== true) {
    // initialize variables with empty values
    $title = "";
    $fName = "";
    $lName = "";
    $role = "";
    $emailType= "";

    // checking if data posted from form is set
    if (isset($_POST['title']) && isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['role'])) {
      // checking that data isn't empty
      if (!empty($_POST['title']) && !empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['role'])) {
        // retrieving post variables from form
        // storing values from post variable in initialized variables from above
        // if user selects other for title don't display it on the screen
        if ($_POST["title"] !== "other") {
          $title = $_POST["title"];
        } 
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $role = $_POST['role'];
          
        // if post variable for emailType is set from forms store into initialized emailType variable 
        if (isset($_POST['emailType'])){
          $emailType = $_POST['emailType'];
        }
      }
    }
    
    // populating session variables with values
    // user is logged in upon form submission
    $_SESSION["loggedIn"] = true;
    // settting session variables equal to values retrieved from post variables from form submission
    $_SESSION['title'] = $title;
    $_SESSION['fName'] = $fName;
    $_SESSION['lName'] = $lName;
    $_SESSION['role'] = $role;
    // session is now run upon form submission
    $_SESSION["run"] = true;

    // setting emailType based on selected role from form
    // setting headers to same location as on project2-home.php when user is logged in (session variable for loggedIn is set)
    if ($_SESSION['role'] == "Admin") {
      $_SESSION['emailType'] = "newAccount";
      header("location: problem.php");
    }

    if ($_SESSION['role'] == "Manager") {
      $_SESSION['emailType'] = "lostPassword";
      header("location: problem.php");
    }

    if ($_SESSION['role'] == "CEO") {
      header("location: problem.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IT System Problems</title>
  <link href="style.css" rel="stylesheet" type="text/css"/>
  <!-- logo  -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>
<body>
  <?php include './includes/nav-bar.php';?>
  <main>
    <section class="problemMain">
      <div class="wrapper">
        <!-- include logoutLink.php for link -->
        <?php include "./includes/logout-link.php"?>

        <!-- greeting according to role and form data -->
        <!-- error handling for when session variable fails (if role is clear can still show options) -->
        <?php
         if (!empty($_SESSION['role'])) { ?> 
          <h2>Hello, <?php echo $_SESSION['title'], " ", $_SESSION['fName'], " ", $_SESSION['lName'], " ", " ({$_SESSION['role']} account)" ?></h2>
          <hr>
          <h3>Here are your options:</h3>
         <?php } 
         else if (empty($_SESSION['fName']) || empty($_SESSION['lName'])) { ?> 
          <h2>Hello, <?php echo $_SESSION['role'] ?></h2>
          <hr>
          <h3>Here are your options:</h3>
         <?php }
         else {?>
          <h2>Hello, stranger</h2>
          <hr>
          <h3>Sorry no options for you, something seems to have gone wrong, maybe a session timeout. We apologize for the inconvenience.</h3>
         <?php
         }
        ?>

        <!-- if role= 'admin' -> link to: new-account.php and isnt-working.php  -->
        <?php if ( $_SESSION['role'] == "Admin" ) { ?> 
          <ul class="optionsUl">
            <!-- redirect to computer isn't working -->
            <li>
              <a href="isnt-working.php">My computer isn't working</a>
            </li>
            <!-- redirect to create new account -->
            <li>
              <a href="new-account.php">Create New Account</a>
            </li>
          </ul>
        <?php } ?>

        <!-- if role = 'manager' ->link to: lost-password.php and isnt-working.php  -->
        <?php if ( $_SESSION['role'] == "Manager" ) { ?> 
          <ul class="optionsUl">
            <!-- redirect to computer isn't working -->
            <li>
              <a href="isnt-working.php">My computer isn't working</a>
            </li>
            <!-- redirect to lost-password -->
            <li>
              <a href="lost-password.php">Lost Password</a>
            </li>
          </ul>
        <?php } ?>

        <!-- if role= 'ceo' ->link to: need-help.php and isnt-working.php -->
        <?php if ( $_SESSION['role'] == "CEO" ) { ?> 
          <ul class="optionsUl">
            <!-- redirect to computer isn't working -->
            <li>
              <a href="isnt-working.php">My computer isn't working</a>
            </li>
            <!-- redirect to need help -->
            <li>
              <a href="need-help.php">Need Help</a>
            </li>
          </ul>
        <?php } ?>
      </div>
    </section>
  </main>
  <!-- include footer.php for copyright -->
  <?php include './includes/footer.php'; ?>
</body>
</html>