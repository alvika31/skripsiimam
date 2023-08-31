<html lang="en">

<head>
 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="icon" type="image/png" href="<?= base_url() . '/upload/logo.png' ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            z-index: 0;
            width: 100%;
            height: 100vh;
        }
        
  
    </style>

</head>

<body>
  <div class="position-fixed " style="z-index:100; top:90%; left:45%">
    <button id="checkLocationButton" type="button" class="btn btn-danger">Cek Lokasi Anda</button>
    <form action="absensi" method="POST" enctype="multipart/form-data">
    <!-- Your existing form elements here -->
    <input type="file" name="selfie_image" accept="image/*" capture="camera" id="cameraInput" >
    <button type="submit" name="submit" class="btn btn-danger">Submit</button>
</form>

    <button type="button" class="btn btn-danger">Primary</button>

    
  </div>

  <div id="popup" class="custom-popup" style="display: none;">
    <p id="popupMessage"></p>
  </div>

  <div id="map"></div>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script>
    var map_init = L.map('map', {
      center: [-6.943097, 107.633545],
      zoom: 8
    });

    var polygonPoints = [
      [-6.959825703893487, 107.58570109915313],
      [-6.9602196572947665, 107.58572966172632],
      [-6.960292828786697, 107.58629142133141],
      [-6.95980923952627, 107.58630495409348]
    ];

    var presensiPolygon = L.polygon(polygonPoints, {
      color: 'blue',
      fillColor: 'cyan',
      fillOpacity: 0.5
    }).addTo(map_init);

    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map_init);
    
    L.Control.geocoder().addTo(map_init);

    var marker, circle, lat, long, accuracy;
    var userLatLng; // Deklarasikan userLatLng di luar fungsi getPosition

    function getPosition(position) {
      lat = position.coords.latitude;
      long = position.coords.longitude;
      accuracy = position.coords.accuracy;

      if (marker) {
        map_init.removeLayer(marker);
      }

      if (circle) {
        map_init.removeLayer(circle);
      }

      marker = L.marker([lat, long]);
      circle = L.circle([lat, long], {
        radius: accuracy
      }, 100);

      var featureGroup = L.featureGroup([marker, circle]).addTo(map_init);
      map_init.fitBounds(featureGroup.getBounds());

      console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy);

      userLatLng = L.latLng(lat, long); // Atur userLatLng di dalam fungsi getPosition
    }

    if (!navigator.geolocation) {
      console.log("Your browser doesn't support geolocation feature!");
    } else {
      setInterval(() => {
        navigator.geolocation.getCurrentPosition(getPosition);
      }, 4000);
    }

    var popupStyle = document.createElement('style');
    popupStyle.innerHTML = `
      .custom-popup {
        display: none;
        position: absolute;
        background-color: white;
        color: black;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        z-index: 200;
        transition: opacity 0.5s ease-in-out;
      }
      .popup-message {
        margin: 0;
      }
    `;
    document.head.appendChild(popupStyle);
    var checkLocationButton = document.getElementById('checkLocationButton');
    var popupMessageElement = document.getElementById('popupMessage');
    
    

    checkLocationButton.addEventListener('click', function () {
      checkLocation();
    });

    function checkLocation() {
      if (presensiPolygon.getBounds().contains(userLatLng)) {
        popupMessageElement.textContent = "Anda telah di lokasi kantor";
      } else {
        popupMessageElement.textContent = "Anda belum di kantor.";
      }

      document.getElementById('popup').style.display = 'block';

      setTimeout(hidePopup, 5000);
    }

    function hidePopup() {
      document.getElementById('popup').style.display = 'none';
    }


    

  // Potongan kode JavaScript untuk tombol "Selfie" dan input kamera
  var selfieButton = document.getElementById('selfieButton');
  var cameraInput = document.getElementById('cameraInput');

  selfieButton.addEventListener('click', function () {
    cameraInput.click();
  });

  cameraInput.addEventListener('change', function (event) {
    var imageFile = event.target.files[0];
    if (imageFile) {
      console.log('Gambar diambil dari kamera:', imageFile);
    }
  });

  function uploadSelfie(imageFile) {
  var formData = new FormData();
  formData.append('selfie_photo', imageFile);

  fetch('<?= site_url('controller/upload_selfie') ?>', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Handle success
      alert('Selfie photo uploaded successfully!');
    } else {
      // Handle error
      alert('Selfie photo upload failed.');
    }
  })
  .catch(error => {
    console.error('Error uploading selfie photo:', error);
    alert('An error occurred while uploading the selfie photo.');
  });
}


  </script>

<style>
  /* ... gaya-gaya sebelumnya ... */

  .custom-popup {
    /* ... properti yang lain ... */
    position: fixed;
    top: 25%; /* Pindahkan lebih ke atas */
    left: 50%; /* Pusatkan secara horizontal */
    transform: translate(-50%, -50%); /* Atur posisi vertikal dan horizontal */
  }

  /* ... gaya-gaya sebelumnya ... */
</style>

</body>

</html>

</html>

 