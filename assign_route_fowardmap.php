<?php
session_start();
?>
<?php include "header.php" ?>
    <link rel="stylesheet" href="css/assign_route.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  </head>
  <body>
  <!-- Navigation -->
  <?php include("navigation.php") ?>

  <!-- Main webpage-->
    <!-- Background-->
    <div id ="intro" class="p-3 bg-light">
    </div>

    <!--Button-->
    <div class="d-grid gap-2 col-6 mx-auto">
      <!--Link to map-->
      <button class="btn btn-primary" type="button" onclick="location.href='route_choosing.php'">Choose An Available Route</button>
      <button class="btn btn-primary a" type="button" onclick="location.href='chooseMCPS.php'"> Manage MCPS </button>

    </div>

     <!-- Footer  -->
  <?php include "footer.php"; ?>
  
  <!-- Select areas scripts -->
  <script src="js/assign_route.js"></script>
  <!--mdb-->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>
</html>