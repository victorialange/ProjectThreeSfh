<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halifax Canoe and Kayak</title>
    <!-- importing stylesheet -->
    <link rel="stylesheet" href="./style.css" type="text/css">
    <!-- logo  -->
    <link rel="shortcut icon" type="image/jpg" href="./assets/paddle-blue.jpg">
</head>
<body>
    <?php include './includes/nav-bar.php'; ?>  
    <!-- MAIN -->
    <main>
      <!-- HOME PAGE -->
      <!-- welcome img -->
      <?php include './includes/welcome-section.php'; ?>
      
      <!-- ADVENTURES section -->
      <section id="mainContent" class="adventures">
        <!-- WRAPPER -->
        <div class="wrapper">
          <h3>Upcoming Adventures</h3>
          <hr>
          <!-- HALIFAX container -->
          <div class="halifaxContainer">
            <!-- ul for Halifax -->
            <h4>Halifax</h4>
            <ul class="halifaxList">
              <li>Date: 2017-04-12</li>
              <li>Duration: 4 days</li>
              <li class="summary">
                <h5>Summary</h5>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. At, id doloremque? Quidem nihil non magnam neque enim explicabo repudiandae dolor? Quisquam fugiat soluta odio dolorem eos inventore magnam et laborum!</p>
              </li>
            </ul>
          </div><!-- END halifax container -->
          <!-- SYDNEY container -->
          <div class="sydneyContainer">
            <!-- ul for Sydney -->
            <h4>Sydney</h4>
            <ul class="sydneyList">
              <li>Date: 2017-05-10</li>
              <li>Duration: 2 days</li>
              <li class="summary">
                <h5>Summary</h5>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. At, id doloremque? Quidem nihil non magnam neque enim explicabo repudiandae dolor? Quisquam fugiat soluta odio dolorem eos inventore magnam et laborum!</p>
              </li>
            </ul>
          </div><!-- END sydney container -->
        </div><!-- END WRAPPER -->
      </section>
    </main>

    <!-- FOOTER -->
    <?php include './includes/footer.php'; ?>

</body>
</html>