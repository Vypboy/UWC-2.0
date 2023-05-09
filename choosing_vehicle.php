<?php
session_start();
?>
<?php include 'header.php' ?>

</head>
  <body id ="main" >
  <!-- My login page starts here -->
<!-- Section: Design Block -->
<!-- Navigation -->
<?php include("navigation.php") ?>
<!-- Main webpage -->
    <div id ="intro" class="p-3 bg-light">
        <div class="container">
            <div class="headerwall col-4" >
                <h1 class="display-3 ">Welcome back, Back Officer </h1>
                <p class="fw-light">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p>
            </div>
        </div>
    </div>
    <div class="container mt-2 chose_veh">
        <h1 class = "my-5">Choose your vehicles</h1>
        <div class="row my-5" >
        <?php 
                include "connection.php";
                $query = "SELECT * FROM vehicle";               
                $res = mysqli_query($con,$query);
                while($row = mysqli_fetch_assoc($res)){ 
        ?>
            <div class="col-md-3" >
                <div class="row g-0 border rounded overflow-hidden position-relative" >
                    <div class="col-auto d-none d-lg-block">
                    <img class="img-fluid mt-4" src="<?php echo $row['vehicle_image']; ?>">
                </div>
                <div class="col p-4 d-flex flex-column position-static" >
                <h3 class="mb-0"><?php echo str_replace('_',' ',$row['vehicle_name']); ?></h3>
                <div class="mb-1 text-muted" ><?php echo $row['vehicle_id']; ?></div>
                <div class="mb-1 text-muted" ><b>Remaining amount: </b><?php echo $row['remaining_amount']; ?></div>
                <a href="calendar_route.php?id=<?php echo $_GET['id'] ?>&kv=<?php echo $_GET['kv'] ?>&route=<?php echo $_GET['route'] ?>&vehicle=<?php echo $row['vehicle_name'] ?>" class="btn btn-lg">Choose</a>
                </div>
            </div>
            </div>
        <?php 
        }
        ?>


        </div>
        <div class="row">
           <div class="d-flex justify-content-center mb-2 ">
               <a href="route_choosing.php?id=<?php echo $_GET['id'] ?>&kv=<?php echo $_GET['kv'] ?>" class="btn">&lt;&lt; Back</a>
           </div>
        </div>
      </div>

<?php include './footer.php'; ?>