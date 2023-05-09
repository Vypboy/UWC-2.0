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
    <!--select area-->  
    <div class="wrapper">
      <div class="select-btn">
        <span>Select Area</span>
        <i class="uil uil-angle-down"></i>
      </div>
      <div class="content">
        <div class="search">
          <i class="uil uil-search"></i>
          <input spellcheck="false" type="text" placeholder="Search">
        </div>
        <ul class="options"></ul>
      </div>
    </div>
    <div class="row">
           <div class="d-flex justify-content-center mb-2 ">
                <a href = 'backoff.php' role="button" class="btn "> << Back</a>
           </div>
    </div>


    
     <!-- Footer  -->
  <?php include "footer.php"; ?>
  
  <!-- Select areas scripts -->
  <script src="js/area_mcp.js"></script>
  <!--mdb-->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>
</html>