<nav class="navbar navbar-expand-lg navbar-light mb-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="backoff.php">MVP 2.0</a>
        <div class="navbar-expand " id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Pay my bill</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Drop off location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Find my branch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">My account</a>
            </li>
            </ul>
        </div>
        <?php  
            if(!isset($_SESSION['user'])) {
               echo'<a href="login.php" class="btn btn-light shadow-0" role="button">Login</a>';
            }
            else {
                echo'<a class = "nav-link active" >Welcomeback, Back Officer</a>';
            }
        ?>
    </div>
</nav>