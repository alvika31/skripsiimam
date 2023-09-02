<main class="main-content position-relative border-radius-lg">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" />
    <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
    <style>
        #map {
            height: 600px;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card" style="width:100%;">
                    <div id="map"></div>
                    <form action="<?= site_url('absensi/do_edit_radius') ?>" method="post">
                        <input type="hidden" name="id_radius" value="<?= $radius['id_radius'] ?>">
                        <input type="hidden" name="kordinat" id="kordinat2"></input>
                        <input type="submit" value="Edit Radius" class="btn btn-primary mt-2" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    var map = L.map('map').setView([-6.943097, 107.633545], 13);

    // Add a base map layer (you can use any tile provider)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Initialize a polygon drawn layer
    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    // Initialize the draw control
    var drawControl = new L.Control.Draw({
        draw: {
            polygon: true,
            marker: false,
            polyline: false,
            circle: false,
            circlemarker: false
        },
        edit: {
            featureGroup: drawnItems,
            remove: false
        }
    });

    map.addControl(drawControl);

    var coordinates = <?= $radius['kordinat']; ?>; // Ambil koordinat dari database
    console.log(coordinates);

    // Create a polygon and add it to the feature group
    var polygon = L.polygon(coordinates).addTo(drawnItems);

    // Event handler for when a polygon is created or edited
    map.on('draw:created', function(e) {
        var layer = e.layer;
        drawnItems.addLayer(layer);

        var coordinates = layer.getLatLngs();

        // Set the coordinates in the textarea
        document.getElementById('kordinat2').value = JSON.stringify(coordinates);
    });
</script>