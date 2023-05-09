<?php include ("header.php"); ?>
</head>
    <body id ="login">
        <!-- My login page starts here -->
        <div class="container px-5 py-5 px-md-5 text-center text-lg-start my-5">
            <div class=" row gx-lg-4 align-items-center mt-5 pt-5 ">
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
                            <form method = "post" action = "" >
                                <!-- User Name -->
                                <div class="form-outline mb-4">
                                    <input name ='user' type="text" id="username" class="form-control" />
                                    <label class="form-label" for="username">Username</label>
                                </div>  
                    
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input name = 'pass' type="password" id="password" class="form-control" />
                                    <label class="form-label" for="paswword">Password</label>
                                </div>
                    
                                <!-- Checkbox -->
                                <div class="form-check d-flex mb-4">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="check" checked = "checked" />
                                    <label class="form-check-label" for="check">
                                    Save your password
                                    </label>
                                </div>       
                    
                                <!-- Submit button -->
                                <input name ='submit' value="Log In" type ="submit" class="btn btn-lg btn-block mb-1" style="background-color: #59981A; color: white;">
                                <p class = "signup">Don't have an account ? <a  href="register.php">Sign Up !</a></p>
                                </div>
                            </form>
                            <?php
                            
                                if(isset($_POST['submit'])){
                                    if(!empty($_POST['user']) && !empty($_POST['pass'])) {
                                        $user = $_POST['user'];
                                        $pass = $_POST['pass'];
                                        require 'connection.php';
                                        $query=mysqli_query($con," SELECT * FROM users WHERE username='".$user."' AND password ='".$pass."' ");
                                        $numrows=mysqli_num_rows($query);
                                        if($numrows!=0){
                                        while($row=mysqli_fetch_assoc($query)){
                                            $dbusername=$row['username'];
                                            $dbpassword=$row['password'];
                                        }
                                        if($user == $dbusername && $pass == $dbpassword && $user='admin'){
                                            session_start();
                                            $_SESSION['user']=$user;
                                            header("Location: backoff.php");
                                        }
                                        } else {
                                            echo "<script>alert('Invalid username or password!')</script>";
                                        }
                                    } 
                                    else {
                                        echo "<script>alert('All fields are required!')</script>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <!-- MDB -->
        <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>
<!-- This is end of the file >< -->
