<?php
session_start();
?>
<?php include "header.php" ?>
    <link rel="stylesheet" href="css/assign_route.css"/>
    <link rel="stylesheet" href="css/assign_area.css"/>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  </head>
  <body>
  <!-- Navigation -->
  <?php include("navigation.php") ?>
  <script>
        $(document).ready(function() {
            // Khi select thay đổi giá trị
            $('#data-table').on('click', '.Delete',function() {
                // Gửi yêu cầu AJAX để lấy dữ liệu mới từ máy chủ
                var employee = "<?php echo $_GET['id']; ?>";
                $.ajax({
                    url: 'delete_employeeMCP.php', // Đường dẫn đến file xử lý yêu cầu AJAX
                    type: 'POST',
                    data: {mcp_id: $(this).data('id'),
                           employee_id: employee
                    }, // Dữ liệu gửi đi (tuổi được chọn)
                    success: function(response) {
                      alert('Cập nhật thành công');
                      location.reload();
                    },

                    //}
                });
            });
        });
  </script>
  <!-- Main webpage-->
    <!-- Background-->
    <div id ="intro" class="p-3 bg-light">
    </div>

    <!--select area-->  
    <div class="container">
      <div class="row justify-content-md-center p-2">
        <div class="col-md-auto">

          <!-- <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
            <option value="" selected>Chọn tỉnh thành</option>           
          </select> -->
          
          <select class="form-select form-select-sm mb-3" id="district" >
            <option value="" selected>Chọn quận huyện</option>
          </select>

          <select class="form-select form-select-sm" id="ward" >
            <option value="" selected>Chọn phường xã</option>
          </select>
        </div>    
      </div>
    </div>

    
    
    <!--Button-->
    <div class="d-grid gap-2 col-6 mx-auto">
      <!--Link to calendar-->
      <button class="btn btn-primary a" type="button" id="select_mcp">Select Area</button>
    </div>

    <div class="container">
      <div class="row justify-content-md-center p-2">
        <h3>Thông tin MCP đang chọn</h3>
        <div id = "info_mcp"></div>
        <?php 
                  include "connection.php";
                  $query = "SELECT * FROM have";               
                  $res = mysqli_query($con,$query);
                  echo "<h3>các MCP thuộc Quận Thủ Đức mà Collector ". $_GET['id']. " đã được giao từ trước : </h3>";
                  ?>
                  <table class="table table-bordered table-hover" id="data-table">
                  <tr>
                  <th class="text-center border p-2">ID</th>
                  <th class="text-center border p-2">Quận</th>
                  <th class="text-center border p-2">Khu vực</th>
                  <th class="text-center border p-2">Quản lí</th>
                  <th class="text-center border p-2">Trạng thái</th>
                  <th class="text-center border p-2">Họa động</th>
                  </tr>
      
                  <?php
                  // Lặp qua các phần tử trong đối tượng và thêm các hàng vào bảng
                  while($row = mysqli_fetch_assoc($res)){ 
                    if($row['employee_id']==$_GET['id']){ 
                      $query = "SELECT * FROM mcps";               
                      $res = mysqli_query($con,$query);
                      while($row_db = mysqli_fetch_assoc($res)){ 
                        if($row_db['mcp_id']==$row['mcp_id']){ 
                          echo '<tr>';
                          echo '<td class="text-center border p-2">'.$row_db['mcp_id']. '</td>';
                          echo '<td class="text-center border p-2">'.$row_db['mcp_district']. '</td>';
                          echo '<td class="text-center border p-2">'.$row_db['mcp_address']. '</td>';
                          echo '<td class="text-center border p-2">'.$row_db['mcp_manager']. '</td>';
                          echo '<td class="text-center border p-2">'.$row_db['capacity']. '</td>';
                          echo '<td><a class="btn btn-danger Delete" data-id="' . $row_db['mcp_id'] . '">Xóa</a></td>';
                          echo "</tr>"; 
                        }  
                      }
                    }
                  }
                    echo "</table>";
                  ?>
      </div>
      <div class="button-container">
          <a class="btn" href="assign_area_view.php">Trang trước</a>
          <button class="btn" id="continue" >Tiếp tục</button>
          <script>
             var continueButton = document.getElementById("continue");
             continueButton.addEventListener("click", function() {
              if(continueButton.value=="") alert("phải chọn MCP");
              else if (continueButton.value== '0' ) alert("không có MCP phù hợp");
              else {
                 var mcpId = continueButton.value;
                 var xhr = new XMLHttpRequest();
                 xhr.open('GET', "addHaveTable.php?em_id=<?php echo $_GET['id']; ?>&mcp_id=" + mcpId, true);
                 xhr.send();
                 var url = "calendar.php?em_id=<?php echo $_GET['id']; ?>&mcp_id=" + mcpId;
                 window.location.href = url;
              }
            });
          </script>
        </div>
    </div>

     <!-- Footer  -->
  <?php include "footer.php"; ?>
  
  <!-- Select areas scripts -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <script src="js/assign_area.js"></script>
  <!--mdb-->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>
</html>