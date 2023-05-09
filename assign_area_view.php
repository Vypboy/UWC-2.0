<?php
session_start();
?>
<?php include "header.php" ?>
  </head>
  <body id="main">
  <!-- Navigation -->
  <?php include("navigation.php") ?>

    <div class="container select_collector" >
      <!-- Three columns of text below the carousel -->
      <div class="row mt-5" >
          <h1 class = "mb-3">Select Your Janitor</h1>
          <?php 
                  include "connection.php";
                  $display_query = "SELECT * FROM employee";               
                  $results = mysqli_query($con,$display_query);
                  while($row = mysqli_fetch_assoc($results)){ 
                    if($row['position']=="Janitor"){
            ?>
              <div class="col-lg-4" >
                  <img src="<?php echo $row['employee_image'] ?>" class="rounded-circle" style="width: 150px;"alt="Avatar" />            
                  <h2 class = "mt-2"><?php echo $row['employee_name'] ?></h2>
                  <h5 class = "mt-2">MCPS được giao</h5>
                  <?php 
                  include "connection.php";
                  $query = "SELECT * FROM have";               
                  $res = mysqli_query($con,$query);
                  while($row_db = mysqli_fetch_assoc($res)){ 
                    if($row_db['employee_id']==$row['employee_id']){
                  ?>
                  <h5 class = "mt-2"><?php echo $row_db['mcp_id'] ?></h5>
                  <?php
                  }}
                  ?>
                  <p><a href = "assign_area_choosing.php?id=<?php echo $row['employee_id'] ?>" class="btn btn-secondary">Select Collector »</a></p>
              </div>
            <?php 
                    }}
            ?>
        </div>
        <div class="row">
           <div class="d-flex justify-content-center mb-2 ">
                <a href = './backoff.php' role="button" class="btn "> << Back</a>
           </div>
        </div>
      </div>

  <!-- Footer  -->
  <?php include "footer.php"; ?>
  <!-- MDB -->  
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>
</html>