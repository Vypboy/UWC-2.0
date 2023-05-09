<?php include ("header.php"); ?>

</head>
    <body id ="login">
        <!-- My signup page starts here -->
        <div class="container px-5 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-4 align-items-center mt-5 pt-3">
                <div class="col-lg-6">
                    <h1 class="my-5 display-6 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    The Urban Waste Collector
                    <span style="color: #59981A">2.0 </span>
                    </p>
                    </h1>
                </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                    <input type="text" id="form3Example1" class="form-control" />
                                    <label class="form-label" for="form3Example1">First name</label>
                                </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example2" class="form-control" />
                                        <label class="form-label" for="form3Example2">Last name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" class="form-control" />
                                <label class="form-label" for="email">Email address</label>
                            </div>
                            <!-- User Name -->
                            <div class="form-outline mb-4">
                                <input type="text" id="username" class="form-control" />
                                <label class="form-label" for="username">Username</label>
                            </div>  

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control" />
                                <label class="form-label" for="paswword">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="repassword" class="form-control" />
                                <label class="form-label" for="repaswword">Retype your password</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-lg btn-block mb-1" style="background-color: #59981A; color: white;">
                                Sign up
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>