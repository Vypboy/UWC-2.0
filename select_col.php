<?php include "header.php" ?>
<?php
    session_start();
?>
</head>
    <body id ="main">
    <!-- Navigation Include -->
    <?php include("navigation.php") ?>
    <!-- Main content -->
    <div id ="intro" class="p-3 bg-light">
        <div class="container">
            <div class="headerwall col-4" >
                <h1 class="display-3 ">Welcome back, Back Officer </h1>
                <p class="fw-light">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p>
            </div>
        </div>
    </div>
        <div class="container select_collector" >
            <!-- Three columns of text below the carousel -->
            <div class="row mt-5" >
                <h1 class = "mb-3">Select Your Employees</h1>
                <?php 
                  include "connection.php";
                  $display_query = "SELECT * FROM employee";               
                  $results = mysqli_query($con,$display_query);
                  while($row = mysqli_fetch_assoc($results)){ ?>
                  <div class="col-lg-4" >
                  <img src="<?php echo $row['employee_image'];?>" class="rounded-circle" style="width: 150px;"alt="Avatar" />            
                  <h2 class = "mt-2"><?php echo $row['employee_name'];?></h2>
                  <h5 class = "mt-2"><?php echo $row['position'];?></h5>
                  <p><a href = "collector_view.php?id=<?php echo $row['employee_id'];?>" class="btn btn-secondary">View details »</a></p>
                  </div>
               <?php 
                }
                ?>
            </div>
            <div class="row">
              <div class="d-flex justify-content-center mb-2 ">
                <a href = './backoff.php' role="button" class="btn "><< Quay lại</a>
              </div>
            </div>
        </div>
    <!-- Footer  -->
    <?php include "footer.php"; ?>
    </body>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</html>
<!-- This is end of the file >< -->