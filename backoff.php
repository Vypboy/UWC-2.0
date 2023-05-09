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
    <section class="abilities mt-5">
        <div class="container-fluid p-0">
            <div class="row g-0 ab1 ">
                <div class="col-lg-6 order-lg-2 text-white images rounded-1">
                    <div class="d-flex p-4 texts">
                        <h2>Map</h2>
                    </div>
                    <a role="button" class="btn btn-primary mapbtn" href="view_map.php">View Map</a>
                </div>
                <div class="col-lg-6 order-lg-1 mt-lg-5">
                    <div class="row row-cols-lg-2 mx-2 text-center justify-content-center">
                        <div class="col my-3 abi">
                            <a  href = "calendar_new.php" class="card btn abi2">
                                <div class="card-body">
                                    <h6 class="font-weight-bold mb-3"><strong>View Calendar</strong></h6>
                                    <p class="mb-0">View details job of your janitors, collectors </p>
                                </div>
                            </a>
                        </div>
                        <div class="col my-3 abi0">
                            <a href = "select_col.php" class="card btn abi2">
                                <div class="card-body">
                                    <h6 class="font-weight-bold mt-0"><strong>View information</strong></h6>
                                    <p class="mb-0">View your janitors, collectors information like name, job, phone number,...</p>
                                </div>
                            </a>
                        </div>
                        <div class="col my-3">
                            <a href="assign_route_view.php" class="card btn abi2">
                                <div class="card-body">
                                    <h6 class="font-weight-bold mb-3"><strong>Assign Route</strong></h6>
                                    <p class="mb-0">Assign Route for your collectors</p>
                                </div>
                            </a>
                        </div>
                        <div class="col my-3">
                            <a href="assign_area_view.php" class="card btn abi2">
                                <div class="card-body">
                                    <h6 class="font-weight-bold mb-3"><strong>Assign Area</strong></h6>
                                    <p class="mb-0">Assign Area for your janitors</p>
                                </div>
                            </a>
                        </div>
                        <div class="col my-3">
                            <a href="Area_mcp_choosing.php" class="card btn abi2">
                                <div class="card-body">
                                    <h6 class="font-weight-bold mb-3"><strong>Update MCPs</strong></h6>
                                    <p class="mb-0">Add, delete, update mcps</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer  -->
    <?php include "footer.php"; ?>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>
<!-- This is end of the file >< -->