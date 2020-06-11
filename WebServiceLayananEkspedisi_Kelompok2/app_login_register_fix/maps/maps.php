<?php
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<div id="dvMap" style="width: 1000px; height: 550px"></div>
  <script type="text/javascript">
    var markers = [
    <?php
    $sql = mysqli_query($db, "SELECT * FROM maps_marker");
    while(($data =  mysqli_fetch_assoc($sql))) {
    ?>
    {
         "lat": '<?php echo $data['latitude']; ?>',
         "long": '<?php echo $data['longitude']; ?>',
         "keterangan": '<?php echo $data['keterangan']; ?>'
    },
    <?php
    }
    ?>
    ];
    </script>
    <script type="text/javascript">
        window.onload = function () {
      
            var mapOptions = {
            center: new google.maps.LatLng(-2.2459632,116.2409634),
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }; 
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
      var drawingManager = new google.maps.drawing.DrawingManager({
                    drawingControl: true,
                    drawingControlOptions: {
                        position: google.maps.ControlPosition.TOP_CENTER,
                        drawingModes: [google.maps.drawing.OverlayType.MARKER]
                    }
                });
      drawingManager.setMap(map);
      
            for (i = 0; i < markers.length; i++) {
                var data = markers[i];
        var latnya = data.lat;
        var longnya = data.long;
        var myLatlng = new google.maps.LatLng(latnya, longnya);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.keterangan
                });
                (function (marker, data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent('<b>Keterangan</b> :' + data.keterangan + '<br>');
                        infoWindow.open(map, marker);
                    });
                })(marker, data);
            }
        }
    </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe6CZDTXHvtEMfj-lQOXd9Z53MB2jUVDM&libraries=drawing"  type="text/javascript" async defer></script>
</html>
  