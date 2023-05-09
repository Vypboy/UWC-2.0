<?php
session_start();
?>
<?php include "header.php" ?>
    <link rel="stylesheet" href="./css/AddMcp.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  </head>
  <body>
  <!-- Navigation -->
  <?php include("navigation.php") ?>
  <?php 
        include "connection.php";
        $display_query = "SELECT * FROM mcps";               
        $results = mysqli_query($con,$display_query);
        while($row = mysqli_fetch_assoc($results)){
            if($row['mcp_id']==$_GET['id']){
                $id = $row['mcp_id'];
                $district = $row['mcp_district'];
                $address = $row['mcp_address'];
                $manager =$row['mcp_manager'];
                $capacity = $row['capacity'];
            }
        }
  ?>
  <div id="wrapper1">
        <div class="container">
            <div class="row justify-content-around">
                <form  action="" method="post" class="col-md-6 bg-light p-3">
                    <h2 class= "text-center text-uppercase h3 my-5"> Cập nhập tình trạng của MCPs </h2>
                    <h3 class= "text-center text-uppercase h3 my-5"> MCP <?php echo $_GET['id'];?> </h3>
                    <h3 class= "text-center text-uppercase h3 my-5">  <?php echo $district; ?> </h3>
                    <h3 class= "text-center text-uppercase h3 my-5"> <?php echo $address; ?> </h3>
                    <div class="form-group">
                        <label for="capaMCPS"> Tình trạng của điểm MCPs</label>
                        <div>
                            <div class="form-check form-check-inline" required>
                                <?php if($capacity == '0%') echo "<input type='radio' name='capaMCPS' id='0percent' value='0%' class='form-check-input' checked>";
                                    else  echo "<input type='radio' name='capaMCPS' id='0percent' value='0%' class='form-check-input'>";
                                ?>
                                <label for="capaMCPS"   class="form-check-label"> 0%</label>                                                       
                            </div>
                            <div class="form-check form-check-inline">
                            <?php if($capacity == '25%') echo "<input type='radio' name='capaMCPS' id='25percent' value='25%' class='form-check-input' checked>";
                                    else  echo "<input type='radio' name='capaMCPS' id='25percent' value='25%' class='form-check-input'>";
                                ?>
                                <label for="capaMCPS" class="form-check-label"> 25% </label>                                                      
                            </div>
                            <div class="form-check form-check-inline">
                            <?php if($capacity == '50%') echo "<input type='radio' name='capaMCPS' id='50percent' value='50%' class='form-check-input' checked>";
                                    else  echo "<input type='radio' name='capaMCPS' id='50percent' value='50%' class='form-check-input'>";
                                ?>
                                <label for="capaMCPS"   class="form-check-label"> 50% </label>                                                       
                            </div>
                            <div class="form-check form-check-inline">
                            <?php if($capacity == '75%') echo "<input type='radio' name='capaMCPS' id='75percent' value='75%' class='form-check-input' checked>";
                                    else  echo "<input type='radio' name='capaMCPS' id='75percent' value='75%' class='form-check-input'>";
                                ?>
                                <label for="capaMCPS"   class="form-check-label"> 75% </label>                                                       
                            </div>
                            <div class="form-check form-check-inline">
                            <?php if($capacity == '100%') echo "<input type='radio' name='capaMCPS' id='100percent' value='100%' class='form-check-input' checked>";
                                    else  echo "<input type='radio' name='capaMCPS' id='100percent' value='100%' class='form-check-input'>";
                                ?>
                                <label for="capaMCPS" class="form-check-label"> 100% </label>                                                      
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="managerMCPS"> Quản lí MCPs </label>
                        <input  type="text" name="managerMCPS" id="managerMCPs" class="form-control" value="<?php echo $manager; ?>" required>
                    </div>
                    <div class="form-group">
                        <div>
                            <input type="submit" class="btn btn-primary btn-block mt-4" class="form-control" name="btn-reg" value="Gửi thông tin" > 
                        </div>
                    </div>
                    <?php   
    if($_SERVER["REQUEST_METHOD"]=="POST"){  
        echo "<br>" ;
        $error = 0; 
        $capacity = $_POST['capaMCPS'] ;
        $manager = $_POST['managerMCPS'] ;

      $display_query = "SELECT * FROM mcps";               
      $results = mysqli_query($con,$display_query);   
      while($row = mysqli_fetch_assoc($results)){
            if($row['mcp_id'] == $id&&$row['mcp_address']==$address&&$row['mcp_manager']==$manager&&$row['capacity']==$capacity) {
                echo "<p style='color: red;'> thông Tin mới của MCP trùng hoàn toàn với MCP đang tồn tại</p>";
                $error = 1;
            }
      }
      if(!$error){
        $new_sql = " UPDATE mcps SET mcp_manager = '".$manager."', capacity = '".$capacity."' WHERE mcp_id = '".$id."' ";
        mysqli_query($con,$new_sql);
        echo "<p style='color: red;'> Cập nhật MCP thành công</p>";
      }
    }
    ?>             
                </form>  
                <a href='chooseMCPS.php?kv=<?php echo $district ?>'><button class="return btn btn-success btn-block mt-4"> quay lại</button></a> 
            </div>
        </div>
    </div>
    
       <!-- Footer  -->
       <?php include "footer.php"; ?>
  
  <!-- Select areas scripts -->
  <script src="js/assign_route.js"></script>
  <!--mdb-->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>
</html>