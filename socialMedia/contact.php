<!doctype html>
<html lang="en-us">
<head>
  <!-- Including main head informations -->
  <?php include_once("includes/headEssential.php"); ?>
  <!-- End of including main head informations -->

  <link rel="stylesheet" href="css/main.css">
  <title>contact us</title>

  <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat: -25.344, lng: 131.036 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>

</head>
<body>

<!-- Navbar -->
<?php require ("includes/nav.php"); ?>
  <!-- End navbar -->

  <div class="container-fluid">
    <div class="row">
      <div id="map" class="contact_header">
        
      </div>
      <div class="contact_form col-12">
        <form action="" method="POST" class="col-md-7 col-lg-7">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h4>Leave a Message</h4>
                <div class="form_els">
                  <label><i class="fas fa-user"></i> Enter your name *</label>
                  <input type="text" name="name" value="">
                </div>
                <div class="form_els">
                  <label><i class="fas fa-envelope"></i> Enter your Email *</label>
                  <input type="email" name="name" value="">
                </div>
                <div class="form_els">
                  <label><i class="fas fa-phone"></i> Enter your Phone *</label>
                  <input type="number" name="name" value="">
                </div>
                <div class="form_els">
                  <label><i class=""></i>Enter your message *</label>
                  <textarea name="name" rows="8" cols="50"></textarea>
                </div>
              </div>
              <div class="contact_rs_form col-md-6">
                <h4>Reach Us</h4>
                <p><i class="fas fa-phone"></i> (+237) 690 00 00 00</p>
                <p><i class="fas fa-envelope"></i> SmeetUp-cam@gmail.com</p>
                <p><i class="fas fa-map-marker-alt"></i> 288 Parker street</p>
                <div class="contact_icons">
                  <p>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                    <a href="#"><i class="fab fa-invision"></i></a>
                  </p>
                </div>
              </div>
              <input type="button" class="contact_sub_but" name="submit" value="Send Message">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
      async
    ></script>
</body>
</html>
