<?php
if (isset($_GET['lat']) && isset($_GET['lon'])) {
    $lat = $_GET['lat'];
    $lon = $_GET['lon'];
} else {
    echo "<h1>Latitude and Longitude must be set in URL</h1>";
    echo "<p>Example: <a href='map.php?lat=-7.3227418941901&lon=108.32590349452975'>map.php?lat=-37.818217&lon=144.956784</a></p>";
    exit;
}
?>
<html lang="en">
<head>
    <title>Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js"></script>
    <style>
        body {
            background: rgb(73, 234, 188);
        }

        .container {
            background-color: white;
            width: 65rem;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 1.4rem;
            box-shadow: 1px 5px 5px 0 rgba(0, 0, 0, 0.20);
            border-radius: 0.2rem;
            box-sizing: border-box;
        }

        .container * {
            box-sizing: inherit;
            font-size: inherit;
        }

        .container #MapBox {
            margin-bottom: 0.75rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div id="MapBox" style="height: 31rem"></div>
</div>
<script>
    $(function () {
        setLocation = [<?php echo $lat;?>, <?php echo $lon;?>];
        var map = L.map('MapBox').setView(setLocation, 14);
        L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        map.attributionControl.setPrefix(false);
        var marker = new L.marker(setLocation, {
            draggable: false
        });
        L.marker([-7.324929373523135, 108.33079449452985]).bindPopup('Samsat').addTo(map),
        L.marker([-7.326462615308996, 108.33685510802358]).bindPopup('Hotel Indah').addTo(map)
        L.marker([-7.323087383640943, 108.3269638945298]).bindPopup('Smea').addTo(map)
        L.marker([-7.295443721036708, 108.37040419452931]).bindPopup('RS DK').addTo(map)
    })
</script>
</body>
</html>