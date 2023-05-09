<?php
    session_start();
?>
<?php include "header.php" ?>
</head>
    <body id ="main">
    <!-- Navigation Include -->
    <?php include("navigation.php") ?>
    <!-- Main content -->
    <div id ="intro" class="p-3 bg-light">
        <div class="container-fluid">
            <div class="headerwall col-4" >
                <h1 class="display-3 ">Welcome back, Back Officer </h1>
                <p class="fw-light">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p>
            </div>
        </div>
    </div>
    <!-- Image Showcases-->
    <div class="container py-5 collector-information">
        <div class="row">
         <?php 
                  include "connection.php";
                  $display_query = "SELECT * FROM employee";               
                  $results = mysqli_query($con,$display_query);
                  while($row = mysqli_fetch_assoc($results)){ 
                    if($row['employee_id']==$_GET['id']){?>

          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="<?php echo $row['employee_image'] ?>" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-1"><?php echo $row['employee_name'] ?></h5>
                <p class="mb-0"><?php echo $row['position'] ?></p>
                <p class="mb-2"><?php echo $row['state'] ?></p>
                <div class="d-flex justify-content-center mb-2 button_infor">
                    <a role="button" class="btn ">Message</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 ">
            <div class="card mb-4">
              <div class="card-body pb-lg-5">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="mb-0"><?php echo $row['email'] ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class=" mb-0"><?php echo $row['phone'] ?></p>
                  </div>
                </div>
                <hr>    
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Street</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="mb-0"><?php echo $row['street'] ?></p>
                  </div>
                </div>
                <hr>    
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">State</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="mb-0"><?php echo $row['state'] ?></p>
                  </div>
                </div>
                <hr>    
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Country</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="mb-0"><?php echo $row['country'] ?></p>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>

          <?php 
                    }}
          ?>

        </div>
        <div class="row">
          <div class="d-flex justify-content-center mb-2 ">
            <a href = './select_col.php' role="button" class="btn "><< Back</a>
          </div>
        </div>
      </div>
    <!-- Footer  -->
    <?php include "footer.php"; ?>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>
<!-- This is end of the file >< -->