<?php
session_start();
?>
<?php include "header.php" ?>
    <link rel="stylesheet" href="css/chooseMCPS.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var district = "<?php echo $_GET['kv'] ?>";
        $(document).ready(function() {
            // Khi select thay đổi giá trị
            $('#mySelect_2').on('change', function() {
                // Gửi yêu cầu AJAX để lấy dữ liệu mới từ máy chủ
                $.ajax({
                    url: 'ajax_filter_MCP.php', // Đường dẫn đến file xử lý yêu cầu AJAX
                    type: 'POST',
                    data: {capacity: $(this).val(),
                           district: district
                    }, // Dữ liệu gửi đi (tuổi được chọn)
                    success: function(data) {
                        // Cập nhật nội dung của bảng với dữ liệu mới
                        // Chuyển chuỗi JSON sang đối tượng JavaScript
var jsonData = JSON.parse(data);

// Tạo bảng và thêm tiêu đề
var table = $('<table class="table table-bordered table-hover" id="data-table">');
var headerRow = $('<tr>');
headerRow.append($('<th class="text-center">').text('ID'));
headerRow.append($('<th class="text-center">').text('Khu vực'));
headerRow.append($('<th class="text-center">').text('Quản lí'));
headerRow.append($('<th class="text-center">').text('Trạng thái'));
headerRow.append($('<th class="text-center">').text('Hoạt động'));
table.append(headerRow);

// Lặp qua các phần tử trong đối tượng và thêm các hàng vào bảng
for (var i = 0; i < jsonData.length; i++) {
    var row = $('<tr>');
    row.append($('<td>').text(jsonData[i].mcp_id));
    row.append($('<td>').text(jsonData[i].mcp_address));
    row.append($('<td>').text(jsonData[i].mcp_manager));
    row.append($('<td>').text(jsonData[i].capacity));
    row.append(
        $('<td>').append(
            $('<a class="btn btn-success myUpdate" href="UpdateMcp.php?id=' + jsonData[i].mcp_id + '">').text('Cập nhật'),
            $('<a class="btn btn-danger myDelete" data-id="' + jsonData[i].mcp_id + '">').text('Xóa')
        )
    );
    table.append(row);
}

// Gán bảng cho phần tử HTML
$('#data-table').html(table);
                    }
                });
            });

    // nut Delete
        $('#data-table').on('click','.myDelete', function() {//phai lam nhu nay thi moi xoa dc nhieu lan hoac xap xep roi xoa ma khong phai f5
                // Gửi yêu cầu AJAX để lấy dữ liệu mới từ máy chủ
                var mcp_id = $(this).data('id');
                $.ajax({
                    url: 'ajax_delete_MCP.php', // Đường dẫn đến file xử lý yêu cầu AJAX
                    type: 'POST',
                    data: {id: mcp_id, kv: "<?php echo $_GET['kv']; ?>" }, // Dữ liệu gửi đi (tuổi được chọn)
                    success: function(data) {
                        // Cập nhật nội dung của bảng với dữ liệu mới
                        // Chuyển chuỗi JSON sang đối tượng JavaScript
var jsonData = JSON.parse(data);

// Tạo bảng và thêm tiêu đề
var table = $('<table class="table table-bordered table-hover" id="data-table">');
var headerRow = $('<tr>');
headerRow.append($('<th class="text-center">').text('ID'));
headerRow.append($('<th class="text-center">').text('Location'));
headerRow.append($('<th class="text-center">').text('Manager'));
headerRow.append($('<th class="text-center">').text('Status'));
headerRow.append($('<th class="text-center">').text(''));
table.append(headerRow);

// Lặp qua các phần tử trong đối tượng và thêm các hàng vào bảng
for (var i = 0; i < jsonData.length; i++) {
    var row = $('<tr>');
    row.append($('<td>').text(jsonData[i].mcp_id));
    row.append($('<td>').text(jsonData[i].mcp_address));
    row.append($('<td>').text(jsonData[i].mcp_manager));
    row.append($('<td>').text(jsonData[i].capacity));
    row.append(
        $('<td>').append(
            $('<a class="btn btn-success myUpdate" href="UpdateMcp.php?id=' + jsonData[i].mcp_id + '">').text('Update'),
            $('<a class="btn btn-danger myDelete"  data-id="' + jsonData[i].mcp_id + '">').text('Delete')
        )
    );
    table.append(row);
}

// Gán bảng cho phần tử HTML
$('#data-table').html(table);
                    }
                });
            });

        });
    </script>
  </head>
  <body>
  <!-- Navigation -->
  <?php include("navigation.php"); ?>

  <!-- Main webpage-->
    <!-- Background-->
    <div class="content">
        <h3 class="text-center">MCPs Manage</h3>
        <h5 class="text-center">Area: <?php echo $_GET['kv'] ?></h5>
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="AddMcp.php?kv=<?php echo $_GET['kv'] ?>"><input class="btn btn-primary" type="button" value="Add MCP"></a>
                </div>

             <!--   <div class="col input-group mb-3">
                    <select class="custom-select" id="mySelect_1">
                        <option selected>Lọc theo khu vực</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div> -->
                <div class="col input-group mb-3">
                    <select class="custom-select" id="mySelect_2">
                        <option selected value="all">Status filter</option>
                        <option value="0%">0%</option>
                        <option value="25%">25%</option>
                        <option value="50%">50%</option>
                        <option value="75%">75%</option>
                        <option value="100%">100%</option>
                    </select>
                </div>
                <script>
                /*const select_2 = document.getElementById("mySelect_2");
                select_2.addEventListener("change", function() {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "url_of_your_server", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("selectedOption_2=" + this.value);
                });  */           
                </script>
            </div>
            <div class="row">
              <div class="d-flex  mb-2  ">
                <a href = 'Area_mcp_choosing.php' role="button" class="btn "><< Back</a>
              </div>
            </div>
        </div>

        <table class=" table table-bordered table-hover" id="data-table">
            <tr class="thead text-center">
                <th>ID</th>
                <th>Location</th>
                <th>Manager</th>
                <th>Status</th>
                <th></th>
            </tr>

        <?php          
                include "connection.php";
                $display_query = "SELECT * FROM mcps";             
                $results = mysqli_query($con,$display_query);   
                while($row = mysqli_fetch_assoc($results)){
                    if($row['mcp_district']==$_GET['kv']){
                    echo "<tr>";
                    echo "<td>".$row['mcp_id']."</td>";
                    echo "<td>".$row['mcp_address']."</td>";
                    echo "<td>".$row['mcp_manager']."</td>";
                    echo "<td>".$row['capacity']."</td>";
                    echo "<td>";
                    echo "<a class='btn btn-success myUpdate' href='UpdateMcp.php?id=" . $row['mcp_id'] . "'>Update</a>";
                    echo "<a class='btn btn-danger myDelete' data-id='".$row['mcp_id']."' >Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                    }
                }
        ?>
        </table>
        <script>
            function Update(id) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "UpdateMCPS.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("Delete=" + id);
            }

        </script>
       <!-- <div>
            <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div> -->
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