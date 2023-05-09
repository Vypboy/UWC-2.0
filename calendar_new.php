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
    <!-- Footer  -->
    <?php include "footer.php"; ?>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Calendar Script Start here -->
    <script>

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

        </script>
    </body>
</html>
<!-- This is end of the file >< -->