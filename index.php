<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Marakez Bus Reservation</title>
  <link rel="stylesheet" href="css/home-style.css">
  <script defer src="js/carousel.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="icon" type="image/x-icon" href="/images/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-black navbar-dark p-2 fs-5">
    <div class="container">
      <a class="navbar-brand text-uppercase fw-bold" href="#">MARAKEZ Bus Reservation</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a style="margin-right: 8px;" class="nav-link active text-uppercase" aria-current="page"
              href="#routes-section">Routes</a>
          </li>
          <li class="nav-item">
            <a style="margin-right: 8px;" class="nav-link text-uppercase" href="#contact-section">Contact</a>
          </li>
          <li class="nav-item">
            <a href="admin.php"><button class="loginBtn">Login</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Rehab Modal -->
  <!-- Modal Template (will be duplicated by PHP) -->
  <?php
  // Fetch the point names and image paths from the database
  require_once('connection.php');
  $query = "SELECT ID, bus_name, image_path FROM bus";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $routeId = $row['ID'];
      $pointName = $row['bus_name'];
      $imagePath = $row['image_path'];
  ?>
      <div class="modal fade pt-5 mt-5" tabindex="-1" id="rehab-modal-<?= $routeId ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> <?= $pointName ?> Route</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="#">
                <div class="row g-2 mb-2">
                  <div class="col-sm-12">
                    <div class="form-floating">
                      <input id="fname-<?= $routeId ?>" type="name" class="form-control" placeholder="Enter your full name" required>
                      <label for="fname-<?= $routeId ?>">Enter your full name <span class="text-danger">*</span></label>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-floating">
                      <input id="phnumber-<?= $routeId ?>" type="tel" class="form-control" placeholder="Enter your phone number" required>
                      <label for="phnumber-<?= $routeId ?>">Enter your phone number <span class="text-danger">*</span></label>
                    </div>
                  </div>
                </div>
                <div class="row g-2 mb-2">
                  <!-- <div class="col-sm-6">
                    <div class="form-floating">
                      <input id="email-<?= $routeId ?>" type="email" class="form-control" placeholder="Enter your email address">
                      <label for="email-<?= $routeId ?>">Enter your email address</label>
                    </div>
                  </div> -->
                  <div class="col-sm-12">
                    <div class="form-floating">
                      <select id="trip-time-<?= $routeId ?>" class="form-select">
                        <?php
                        // SQL query to get point names from the bus_points table
                        $sql4 = "SELECT p.point_name, bp.point_id 
                                 FROM bus_points bp 
                                JOIN points p ON bp.point_id = p.ID where bp.bus_id = $routeId";
                        $result4 = mysqli_query($conn, $sql4);

                        if (mysqli_num_rows($result4) > 0) {
                          while ($row = mysqli_fetch_assoc($result4)) {
                        ?>
                            <option value="<?= htmlspecialchars($row['point_id']) ?>">
                              <?= htmlspecialchars($row['point_name']) ?>
                            </option>
                        <?php
                          }
                        } else {
                          echo "<option>No points available</option>";
                        }
                        ?>
                      </select>

                      <label for="trip-time-<?= $routeId ?>">Choose a location <span class="text-danger">*</span></label>
                    </div>
                  </div>
                </div>
                <div class="row g-2 mb-2">
                  <!-- <div class="col-sm-6">
                    <div class="form-floating">
                      <input id="email-<?= $routeId ?>" type="email" class="form-control" placeholder="Enter your email address">
                      <label for="email-<?= $routeId ?>">Enter your email address</label>
                    </div>
                  </div> -->
                  <div class="col-sm-12">
                    <div class="form-floating">
                      <select id="trip-time-<?= $routeId ?>" class="form-select">
                        <?php
                        $sql3 = "SELECT * FROM rides";
                        $result3 = mysqli_query($conn, $sql3);
                        while ($row = mysqli_fetch_assoc($result3)) {
                        ?>
                          <option><?= $row['time'] ?></option>
                        <?php
                        } ?>
                      </select>
                      <label for="trip-time-<?= $routeId ?>">Pick a trip time <span class="text-danger">*</span></label>
                    </div>
                  </div>
                </div>
                <div class="row g-2 mb-2">
                  <!-- <div class="col-sm-6">
                    <div class="form-floating">
                      <input id="email-<?= $routeId ?>" type="email" class="form-control" placeholder="Enter your email address">
                      <label for="email-<?= $routeId ?>">Enter your email address</label>
                    </div>
                  </div> -->
                  <div class="col-sm-12">
                    <div class="form-floating">
                      <input id="phnumber-<?= $routeId ?>" type="number" class="form-control" placeholder="Enter your phone number" required>
                      <label for="phnumber-<?= $routeId ?>">Choose number of seats <span class="text-danger">*</span></label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name = 'reserve' class="btn btn-primary" onclick="reserveAlert()">Reserve!</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  <?php
    }
  } else {
    echo "No points found.";
  }
  ?>

  <!-- Carousel and Route Section -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item c-item active" data-bs-interval="4000">
        <img src="images/1.jpg" class="d-block w-100 c-image" alt="image">
        <div class="carousel-content">
          <h2 class="carousel-heading">Fast, Convenient, and Efficient</h2>
          <p class="carousel-subhead">Make sure you are always on time while maintaining the maximum level of comfort and entertainment in MARAKEZ's high-end transportation services. Operating all over Egypt's bustling capital, "Cairo," anywhere and anytime, you will find us striving for your comfort.</p>
          <button type="button" class="btn btn-primary rounded-5 me-1" onClick="document.getElementById('routes-section').scrollIntoView();">Book Your Seat Now!</button>
          <button type="button" class="btn btn-outline-light rounded-5 ms-1" onClick="document.getElementById('contact-section').scrollIntoView();">Contact Us</button>
        </div>
      </div>
    </div>
  </div>

  <div id="routes-section">
    <div id="slider-container">
      <span onclick="slideLeft()" class="btn"></span>
      <div id="slider">
        <?php
        // Loop through routes again for slider
        $result->data_seek(0); // Reset the result pointer to the start
        while ($row = $result->fetch_assoc()) {
          $routeId = $row['ID'];
          $pointName = $row['bus_name'];
          $imagePath = $row['image_path'];
        ?>
          <div class="slide">
            <a target="_blank" href="https://www.google.com" class="slide-link" data-bs-toggle="modal" data-bs-target="#rehab-modal-<?= $routeId ?>">
              <img src="<?= $imagePath ?>" alt="<?= $pointName ?> Route">
              <div class="slide-title"><?= $pointName ?></div>
            </a>
          </div>
        <?php
        }
        ?>
      </div>
      <span onclick="slideRight()" class="btn"></span>
    </div>
  </div>


  <!-- Contact 3 - Bootstrap Brain Component -->
  <section id="contact-section" class="bg-light pb-5 px-4 px-md-1">
    <div class="container">
      <div class="row gy-3 gy-md-4 gy-lg-0 align-items-md-center">
        <div class="col-12 col-lg-6">
          <div class="row justify-content-xl-center">
            <div class="col-12 col-xl-11">
              <h2 class="h1 mb-3">Get in touch</h2>
              <p class="lead fs-4 text-secondary mb-5">We are always striving for your comfort, make sure to let us know
                if you ever encounter any issues or need any assistance</p>
              <div class="d-flex mb-5">
                <div class="me-4 text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-geo"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                  </svg>
                </div>
                <div>
                  <h4 class="mb-3">Address</h4>
                  <address class="mb-0 text-secondary">District 5 Marakez,Ain El Sokhna Road, Cairo 4064051</address>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-12 col-sm-6">
                  <div class="d-flex mb-5 mb-sm-0">
                    <div class="me-4 text-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                        <path
                          d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                      </svg>
                    </div>
                    <div>
                      <h4 class="mb-3">Phone</h4>
                      <p class="mb-0">
                        <a class="link-secondary text-decoration-none" href="tel:+15057922430">19876</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="d-flex mb-0">
                    <div class="me-4 text-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-envelope-at" viewBox="0 0 16 16">
                        <path
                          d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                        <path
                          d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                      </svg>
                    </div>
                    <div>
                      <h4 class="mb-3">E-Mail</h4>
                      <p class="mb-0">
                        <a class="link-secondary text-decoration-none"
                          href="mailto:demo@yourdomain.com">info@marakez.com</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex">
                <div class="me-4 text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-alarm"
                    viewBox="0 0 16 16">
                    <path
                      d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                    <path
                      d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                  </svg>
                </div>
                <div>
                  <h4 class="mb-3">Opening Hours</h4>
                  <div class="d-flex mb-1">
                    <p class="text-secondary fw-bold mb-0 me-5">Sun - Thu</p>
                    <p class="text-secondary mb-0">9am - 5pm</p>
                  </div>
                  <div class="d-flex">
                    <p class="text-secondary fw-bold mb-0 me-5">Fri - Sat</p>
                    <p class="text-secondary mb-0">9am - 2pm</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="bg-white border rounded shadow-sm overflow-hidden">

            <form action="#!">
              <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                <div class="col-12">
                  <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                </div>
                <div class="col-12 col-md-6">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                          d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                      </svg>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" value="" required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="phone" class="form-label">Phone Number</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-telephone" viewBox="0 0 16 16">
                        <path
                          d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                      </svg>
                    </span>
                    <input type="tel" class="form-control" id="phone" name="phone" value="">
                  </div>
                </div>
                <div class="col-12">
                  <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="subject" name="subject" value="" required>
                </div>
                <div class="col-12">
                  <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Send Message</button>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-black text-start text-white">
    <div class="container">
      <!-- Copyright -->
      <div class="text-start py-2 fs-6" style="background-color: rgba(0, 0, 0, 0.2);">
        ©
        <script>
          document.write(new Date().getFullYear())
        </script> Copyright:
        <a class="text-white" target="_blank" href="https://marakez.net/">Marakez</a>
      </div>
      <!-- Copyright -->
    </div>
  </footer>


  <script src="js/carousel.js"></script>
  <script> function reserveAlert() {
      alert("Reserved successfully");
    }
    </script>

</body>

</html>