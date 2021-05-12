<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <style>
        #mapcontainer {
            height: 65%;
            border: 5px solid black;
        }

        #mapid {
            height: 100%;
        }

        #desc {
            height: 35%;
            border: 5px solid white;
        }

        #embed-map {
            width: 50%;
            float: left;
        }

        #name {
            min-width: 18%;
            padding-left: 15px;
            margin-left: 15px;
            float: right;
            font-style: italic;
            background-color: lightgray;
        }
    </style>
    <title>Tugas 5 Praktikum SIG</title>
</head>

<body>
    <div id="mapcontainer">
        <div id="mapid"></div>
    </div>
    <div id="desc">
        <div id="embed-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63465.33198583073!2d106.83409106108145!3d-6.186486398355229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f436b8c94b07%3A0x6ea6d5398b7c82f6!2sCentral%20Jakarta%2C%20Central%20Jakarta%20City%2C%20Jakarta!5e0!3m2!1sen!2sid!4v1620761584089!5m2!1sen!2sid" width=100% height=100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div id="name">
            <h4>Kelompok 7
                <p>1917051024 Ardella Dean Awalia
                    <br>1917051047 Gladie Thoriqudin
                </p>
            </h4>
        </div>
    </div>
</body>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<script>
    var mymap = L.map('mapid').setView([-6.1701629955790604, 106.82402122181303], 16);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 20,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
    }).addTo(mymap);

    var marker = L.marker([-6.1701629955790604, 106.82402122181303]).addTo(mymap);

    var circle = L.circle([-6.1701629955790604, 106.82402122181303], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 150
    }).addTo(mymap);

    var polygon = L.polygon([
        [-6.171622, 106.823397],
        [-6.171650113270604, 106.82910600733149],
        [-6.173113349246676, 106.82919704452966],
        [-6.17346386976021, 106.82980468330398],
        [-6.1777586047123725, 106.82989051350519],
        [-6.178476160086912, 106.83063030436551],
        [-6.179995903266579, 106.83099262710031],
        [-6.180033957249775, 106.82324803057956]
    ]).addTo(mymap);

    marker.bindPopup("<b>Gedung Istana Merdeka, Jakarta.").openPopup();
    circle.bindPopup("Kompleks Istana Merdeka");
    polygon.bindPopup("Kompleks Monumen Nasional");

    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("Koordinat lokasi " + e.latlng.toString())
            .openOn(mymap);
    }

    mymap.on('click', onMapClick);
</script>

</html>