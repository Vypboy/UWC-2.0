<?php
session_start();
?>
<?php include "header.php" ?>
</head>

<body id="main">
    <!-- Navigation -->
    <?php include("navigation.php") ?>

    <div class="container select_collector">
        <!-- Three columns of text below the carousel -->
        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <h1 class="mb-3">Select Your Route</h1>
            <?php 
                include "connection.php";
                $query = "SELECT * FROM route";               
                $res = mysqli_query($con,$query);
                echo "<h3 class='mb-3'>".$_GET['kv']."</h3>";
                while($row = mysqli_fetch_assoc($res)){ 
                    if($row['route_district']==$_GET['kv']){ 
            ?>
            <div class="col-lg-5">
                <img src="<?php echo $row['route_image'] ?>" class="rounded" style="width: 450px; height: 270px;" alt="Route1" />
                <p class="d-flex justify-content-center" style="margin-top: 10px;">
                    <a href="choosing_vehicle.php?id=<?php echo $_GET['id'] ?>&kv=<?php echo $_GET['kv'] ?>&route=<?php echo $row['route_name'] ?>" 
                    class="btn btn-secondary" style="width: 200px;">SELECT</a>
                </p>
            </div>
            <?php }}
            ?>
        </div>
        <div class="row">
           <div class="d-flex justify-content-center mb-2 ">
               <a href="assign_route_choosing.php?id=<?php echo $_GET['id'] ?>" class="btn">&lt;&lt; Back</a>
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