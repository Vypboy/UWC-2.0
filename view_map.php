<!DOCTYPE html>
<html>
<?php include "header.php" ?>
<link rel="stylesheet" href="css/assign_route.css" />
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
  <!-- Navigation -->
  <?php include("navigation.php") ?>

  <head>
    <title>Google Maps PHP</title>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhfSh2lfppoMcqrFTw9sZYnFeYXu52QDc&callback=Function.prototype"></script>
    <style>
      /* #info {
        position: fixed;
        top: 70px;
        right: 20px;
        width: 200px;
        height: 100px;
        overflow: auto;
        background-color: #FFFFFF;
        color: #1c1c1c;
      } */
    </style>
  </head>

  <body onload="initMap()">
    <div id="map" style="width: 100%; height: 500px;"></div>
    <!-- <div id="info"></div> -->
    <script type="text/javascript">
      function initMap() {
        var location = { lat: 10.852719, lng: 106.755505 };
        var location1 = { lat: 10.852719, lng: 106.755505 };
        var location2 = { lat: 10.052719, lng: 106.055505 };
        var locations = [
          { lat: 10.852719, lng: 106.755505 },
          { lat: 10.853000, lng: 106.755800 },
          { lat: 10.853300, lng: 106.756100 }
        ];
        var contents = [
          "MCP ID: 1 <br> status: Full",
          "MCP ID: 2 <br> status: Not Full",
          "MCP ID: 3 <br> status: Empty"
        ];
        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 19,
          center: location,
          disableDefaultUI: true,
          styles: [
            {
              featureType: "poi",
              elementType: "labels",
              stylers: [
                { visibility: "off" }
              ]
            },
            {
              featureType: "poi",
              elementType: "geometry",
              stylers: [
                { visibility: "off" }
              ]
            },
            {
              featureType: "administrative",
              elementType: "labels",
              stylers: [
                { visibility: "off" }
              ]
            },
            {
              featureType: "road",
              elementType: "labels",
              stylers: [
                { visibility: "off" }
              ]
            },
            {
              featureType: "transit",
              elementType: "labels",
              stylers: [
                { visibility: "off" }
              ]
            },
            {
              featureType: "poi",
              stylers: [
                { visibility: "off" }
              ]
            },
            {
              featureType: "water",
              stylers: [
                { visibility: "off" }
              ]
            },
            {
              featureType: "landscape",
              stylers: [
                { visibility: "off" }
              ]
            }
          ]
        });

        const icon = {
          url: "recycle-bin-icon.png",
          scaledSize: new google.maps.Size(48, 48),
        };
        let currentInfoWindow = null; // biến lưu trữ info window hiện tại
        const markers = [];
        locations.forEach((location) => {
          const marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: icon,
          });
          markers.push(marker);
          marker.addListener("click", (event) => {
            // const info = $("#info");
            if (currentInfoWindow !== null) {
              currentInfoWindow.close(); // đóng info window hiện tại nếu có
            }
            // info.html(contents[markers.indexOf(marker)]);
            // info.toggle(); // toggle display của div info
            // info.style.top = event.pixel.y + "px";
            // info.style.left = event.pixel.x + "px";
            // info.show(); // show div info
            currentInfoWindow = new google.maps.InfoWindow({
              content: contents[markers.indexOf(marker)],
              position: location,
            });
            currentInfoWindow.open(map, marker);
          });
        });
      }
    </script>
    <?php include "footer.php"; ?>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>

</html>