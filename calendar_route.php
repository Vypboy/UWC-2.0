<?php
    session_start();
?>
<?php include "header.php" ?>
    <!-- Calendar Script -->
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src = 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js'></script>
</head>
    <body>
    <!-- Navigation Include -->
    <?php include("navigation.php") ?>
    <!-- Main content -->
        <!-- Calendar define -->
        <div class="container m-5">
            <div id ="calendar" ></div>
        </div>
        <!-- Popup Window -->
            <!-- Modal -->
            <div class="modal fade" id="event_entry_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body">
                <div class="img-container">
                        <div class="row">
                            <div class="col-sm-6">  
                                <div class="form-group">
                                <label for="event_start_hour">Event start</label>
                                <input type="datetime-local" name="event_start_hour" id="event_start_hour" class="form-control" placeholder="Event start hour">
                                </div>
                            </div>
                            <div class="col-sm-6">  
                                <div class="form-group">
                                <label for="event_end_hour">Event end</label>
                                <input type="datetime-local" name="event_end_hour" id="event_end_hour" class="form-control" placeholder="Event end hour">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  onclick="save_event()" >Save</button>
                </div>
                </div>
            </div>
            </div>
    <!-- Footer  -->
    <?php include "footer.php"; ?>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Calendar Script Start here -->
    <?php
    // Kết nối database
    include "connection.php";
    // Kiểm tra kết nối
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    <script>
        <?php
$sql = "SELECT * FROM employee WHERE employee_id = '".$_GET['id']."'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$employee_name = $row['employee_name'];
?>
var employee_name = "<?php echo $employee_name; ?>";

function removeVietnameseTones(str) {
  var from = "àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ";
  var to   = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydAAAAAAAAAAAAAAAAAEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYD";
  for (var i = 0, l = from.length; i < l; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }
  return str;
}

var district = removeVietnameseTones("<?php echo $_GET['kv']; ?>");
var event = "Janitor:" + employee_name + ", district: "+ district+ ", route: "+ "<?php echo $_GET['route']; ?>"+ ",vehicle: "+ "<?php echo str_replace('_',' ',$_GET['vehicle']); ?>";

        $(document).ready(function() {
            display_events();
        }); //end document.ready block
        function display_events(){
            var events = new Array();
            $.ajax({
                url: 'display.php',  
                dataType: 'json',
                success: function (response) {
                    var result = response.data;
                    $.each(result, function (i, item) {
                        events.push({
                            event_id: result[i].event_id,
                            title: result[i].title,
                            start: result[i].start,
                            end: result[i].end,
                            color: result[i].color,
                    }); 	
                    })
                    var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                        editable: true,
                        initialView: 'timeGridWeek',
                        selectable: true,
                        selectHelper: true,
                        select: function(start, end) {
                            $('#event_start_hour').val(moment(start).format('YYYY-MM-DD hh:mm'));
                            $('#event_end_hour').val(moment(end).format('YYYY-MM-DD hh:mm'));
                            $('#event_entry_modal').modal('show');
                        },
                        events: events,
                            eventRender: function(event, element, view) { 
                                element.bind('click', function() {
                                        alert(event.event_id);
                                    });
                            }
                    });
                        calendar.render();
                },//end success
                    error: function (xhr, status) {
                    alert(response.msg);
                    }
            });//end ajax 
        }
        function save_event(){
            var event_start_hour=$("#event_start_hour").val();
            var event_end_hour=$("#event_end_hour").val();
            if(event_start_hour=="" || event_end_hour=="")
            {
            alert("Please enter all required details.");
            return false;
            }
            $.ajax({
            url:"save.php",
            type:"POST",
            dataType: 'json',
            data: {event_name:event,event_start_hour:event_start_hour,event_end_hour:event_end_hour},
            success:function(response){
            $('#event_entry_modal').modal('hide');  
            if(response.status == true)
            {
                alert(response.msg);
                location.reload();
            }
            else
            {
                alert(response.msg);
            }
            },
            error: function (xhr, status) {
            console.log('ajax error = ' + xhr.statusText);
            alert(response.msg);
            }
            });    
            return false;
        }
        </script>
    </body>
</html>
<!-- This is end of the file >< -->