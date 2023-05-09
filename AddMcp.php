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
  ?>
  <div id="wrapper1">
        <div class="container">
            <div class="row justify-content-around">
                <form  action="" method="post" class="col-md-6 bg-light p-3">
                    <h2 class= "text-center text-uppercase h3 my-5"> Tạo MCPs </h2>
                    <h4 class= "text-center text-uppercase h3 my-5"> Khu vực : <?php echo $_GET['kv']; ?></h4>
                    <div class="form-group">
                        <label for="idMCPS"> Mã MCPs</label>
                        <input type="text" name="idMCPS" id="idMCPs" class="form-control" required>                    
                    </div>                    
                    <div class="form-group">
                        <label for="addressMCPS"> địa chỉ của MCPs(phường, ấp, tên đường,...) </label>
                        <input  type="text" name="addressMCPS" id="addressMCPs" class="form-control" placeholder="ghi theo định dạng ví dụ: Ấp 6, Phường 1" required>
                    </div>
                    <div class="form-group">
                        <label for="capaMCPS"> Tình trạng của điểm MCPs</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="capaMCPS" id="0percent" value="0%" class="form-check-input" required>
                                <label for="capaMCPS"   class="form-check-label"> 0%</label>                                                       
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="capaMCPS" id="25percent" value="25%" class="form-check-input" required>
                                <label for="capaMCPS" class="form-check-label"> 25% </label>                                                      
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="capaMCPS" id="50percent" value="50%" class="form-check-input" required>
                                <label for="capaMCPS"   class="form-check-label"> 50% </label>                                                       
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="capaMCPS" id="75percent" value="75%" class="form-check-input" required>
                                <label for="capaMCPS"   class="form-check-label"> 75% </label>                                                       
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="capaMCPS" id="100percent" value="100%" class="form-check-input" required>
                                <label for="capaMCPS" class="form-check-label"> 100% </label>                                                      
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="managerMCPS"> Quản lí MCPs </label>
                        <input  type="text" name="managerMCPS" id="managerMCPs" Placeholder="ví dụ: Văn Nam" class="form-control" required>
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
        $id = $_POST['idMCPS'] ;
        $address = $_POST['addressMCPS'] ;
        $capacity = $_POST['capaMCPS'] ;
        $manager = $_POST['managerMCPS'] ;
        $district = $_GET['kv'] ;

      include "connection.php";
      $display_query = "SELECT * FROM mcps";               
      $results = mysqli_query($con,$display_query);   
      while($row = mysqli_fetch_assoc($results)){
           if($row['mcp_id'] == $id) {
                echo "<p style='color: red;'> ID đã tồn tại</p>";
                $error = 1;
            } 
            if($row['mcp_address'] == $id) {
                echo "<p style='color: red;'> Địa chỉ đã tồn tại</p>";
                $error = 1;
            } 
            if($row['mcp_manager'] == $id) {
                echo "<p style='color: red;'> Quản lí đã tồn tại</p>";
                $error = 1;
            } 
      }
      if(!$error){
        $new_sql = " INSERT INTO mcps(mcp_id,mcp_district,mcp_address,mcp_manager,capacity) VALUES ('".$id."','".$district."','".$address."','".$manager."','".$capacity."')";
        mysqli_query($con,$new_sql);
        echo "<p style='color: red;'> Thêm MCP thành công</p>";
      }
    }
    ?>        
                </form>  
                <a href='chooseMCPS.php?kv=<?php echo $_GET['kv']; ?>'><button class="return btn btn-success btn-block mt-4"> quay lại</button></a> 
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