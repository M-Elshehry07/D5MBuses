<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/admin-style.css">
</head>

<body>
  <header style="background-color: white;">
    <img src="images/Marakez.PNG" alt="LOGO" style="height: 50px;" />
  </header>
  <div class="main-container">
    <?php include_once('nav.php') ?>
    <div class="main">
      <div class="searchbar2">
        <input type="text" name="" id="" placeholder="Search">
        <div class="searchbtn">
          <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
            class="icn srchicn" alt="search-button">
        </div>
      </div>
      <div class="box-container">
        <div class="box box1">
          <div class="text">
            <h6 class="topic-heading">Total Bookings</h6>
            <h2 class="topic">Article Views</h2>
          </div>
        </div>
        <div class="box box4">
          <div class="text">
            <h2 class="topic-heading">70</h2>
            <h2 class="topic">Number of Buses</h2>
          </div>
          <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
        </div>
      </div>
      <div class="report-container " id="Manageroutes">
        <div class="report-header">
          <h1 class="recent-Articles">Manage Points</h1>
          <a href="add-point.php"><button class="view">Add New Point </button></a>
        </div>
        <div class="report-body">
          <div class="report-topic-heading">
            <h3 class="t-op">Point ID</h3>
            <h3 class="t-op">Point Name</h3>
            <h3 class="t-op">Location</h3>
          </div>
          <div class="items">
            <?php
            require_once('connection.php');
            $query = "SELECT * FROM points";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              $point_id = $row['point_id'];
              $point_name = $row['point_name'];
              $location = $row['location'];
              ?>
              <div class="item1">
                <h3 class="t-op-nextlvl"><?php echo $point_id; ?></h3>
                <h3 class="t-op-nextlvl"><?php echo $point_name; ?></h3>
                <h3 class="t-op-nextlvl"><?php echo $location; ?></h3>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
      <div class="report-container" id="buses">
        <div class="report-header">
          <h1 class="recent-Articles">Manage Buses</h1>
          <a href="add-bus.php"><button class="view">Add New Bus </button></a>
        </div>
        <div class="report-body">
          <div class="report-topic-heading">
            <h3 class="t-op">Bus ID</h3>
            <h3 class="t-op">capacity</h3>
            <h3 class="t-op" style="margin-right: 20px;">type</h3>
            <h3 class="t-op">Actions</h3>
          </div>
          <div class="items">
            <div class="item1">
              <h3 class="t-op-nextlvl">Article 73</h3>
              <h3 class="t-op-nextlvl">2.9k</h3>
              <h3 class="t-op-nextlvl">210</h3>
              <div class="card" style="
                            left: 8px;
                            height: 52px;
                            width: 82px;
                            bottom: 20px;
                            border-color: white;
                        ">
                <button class="editView" style="
                            margin-bottom: 3px;
                        "> Edit</button>
                <button class="editView">Delete</button>
              </div>
            </div>
            <div class="item1">
              <h3 class="t-op-nextlvl">Article 65</h3>
              <h3 class="t-op-nextlvl">1.3k</h3>
              <h3 class="t-op-nextlvl">220</h3>
              <div class="card" style="
                            left: 8px;
                            height: 52px;
                            width: 82px;
                            bottom: 20px;
                            border-color: white;
                        ">
                <button class="editView" style="
                            margin-bottom: 3px;
                        "> Edit</button>
                <button class="editView">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>