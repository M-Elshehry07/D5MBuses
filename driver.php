<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
    integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
     scroll-behavior: smooth;   
    }

    :root {
      --background-color1: #fafaff;
      --background-color2: #ffffff;
      --background-color3: #ededed;
      --background-color4: #cad7fda4;
      --primary-color: #4b49ac;
      --secondary-color: #0c007d;
      --Border-color: #3f0097;
      --one-use-color: #3f0097;
      --two-use-color: #5500cb;
    }

    body {
      background-color: var(--background-color4);
      max-width: 100%;
      overflow-x: hidden;
    }

    header {
      height: 70px;
      width: 100vw;
      padding: 0 30px;
      background-color: var(--background-color1);
      position: fixed;
      z-index: 100;
      box-shadow: 1px 1px 15px rgba(161, 182, 253, 0.825);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    a {
      text-decoration: none;
      color: black;
    }

    table tbody tr:hover {
      background-color: #f5f5f5;
    }

    .logo {
      font-size: 27px;
      font-weight: 600;
      color: rgb(47, 141, 70);
    }

    .icn {
      height: 30px;
    }

    .menuicn {
      cursor: pointer;
    }

    .searchbar,
    .message,
    .logosec {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .searchbar2 {
      display: none;
    }

    .logosec {
      gap: 60px;
    }

    .searchbar input {
      width: 250px;
      height: 42px;
      border-radius: 50px 0 0 50px;
      background-color: var(--background-color3);
      padding: 0 20px;
      font-size: 15px;
      outline: none;
      border: none;
    }

    .searchbtn {
      width: 50px;
      height: 42px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 0px 50px 50px 0px;
      background-color: var(--secondary-color);
      cursor: pointer;
    }

    .message {
      gap: 40px;
      position: relative;
      cursor: pointer;
    }

    .circle {
      height: 7px;
      width: 7px;
      position: absolute;
      background-color: #fa7bb4;
      border-radius: 50%;
      left: 19px;
      top: 8px;
    }

    .dp {
      height: 40px;
      width: 40px;
      background-color: #626262;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .main-container {
      display: flex;
      width: 100vw;
      position: relative;
      top: 70px;
      z-index: 1;
    }

    .dpicn {
      height: 42px;
    }

    .main {
      height: calc(100vh - 70px);
      width: 100%;
      overflow-y: scroll;
      overflow-x: hidden;
      padding: 40px 30px 30px 30px;
    }

    .main::-webkit-scrollbar-thumb {
      background-image:
        linear-gradient(to bottom, rgb(0, 0, 85), rgb(0, 0, 50));
    }

    .main::-webkit-scrollbar {
      width: 7px;
    }

    .main::-webkit-scrollbar-track {
      background-color: #9e9e9eb2;
    }

    .report-body::-webkit-scrollbar-thumb {
      background-image:
        linear-gradient(to bottom, rgb(0, 0, 85), rgb(0, 0, 50));
      border-radius: 10px;
    }

    .report-body::-webkit-scrollbar {
      width: 7px;
    }

    .report-body::-webkit-scrollbar-track {
      background-color: transparent;
    }

    .box-container {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      flex-wrap: wrap;
      gap: 50px;
    }

    .nav {
      min-height: 91vh;
      width: 250px;
      background-color: var(--background-color2);
      position: absolute;
      top: 0px;
      left: 00;
      box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      overflow: hidden;
      padding: 30px 0 20px 10px;
    }

    .navcontainer {
      height: calc(100vh - 70px);
      width: 250px;
      position: relative;
      overflow-y: scroll;
      overflow-x: hidden;
      transition: all 0.5s ease-in-out;
    }

    .navcontainer::-webkit-scrollbar {
      display: none;
    }

    .navclose {
      width: 80px;
    }

    .nav-option {
      width: 250px;
      height: 60px;
      display: flex;
      align-items: center;
      padding: 0 30px 0 20px;
      gap: 20px;
      margin-top: -20px;
      transition: all 0.1s ease-in-out;
    }

    .nav-option:hover {
      border-left: 5px solid #a2a2a2;
      background-color: #dadada;
      cursor: pointer;
    }

    .sub-nav-option {
      width: 150px;
      height: 30px;
      display: flex;
      align-items: center;
      padding: 0 30px 0 10px;
      margin-left: 50px;
      margin-top: -30px;
      margin-bottom: 15px;


      transition: all 0.1s ease-in-out;
    }

    .sub-nav-option:hover {
      border-left: 5px solid #a2a2a2;
      background-color: #dadada;
      cursor: pointer;
    }

    .nav-img {
      height: 30px;
    }

    .nav-upper-options {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 30px;
    }

    .option1 {
      border-left: 5px solid #010058af;
      background-color: var(--Border-color);
      color: white;
      cursor: pointer;
    }

    .option1:hover {
      border-left: 5px solid #010058af;
      background-color: var(--Border-color);
    }

    .box {
      height: 130px;
      width: 230px;
      border-radius: 20px;
      box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-around;
      cursor: pointer;
      transition: transform 0.3s ease-in-out;
    }

    .box:hover {
      transform: scale(1.08);
    }

    .box:nth-child(1) {
      background-color: var(--one-use-color);
    }

    .box:nth-child(2) {
      background-color: var(--two-use-color);
    }

    .box:nth-child(3) {
      background-color: var(--one-use-color);
    }

    .box:nth-child(4) {
      background-color: var(--two-use-color);
    }

    .box img {
      height: 50px;
    }

    .box .text {
      color: white;
    }

    .topic {
      font-size: 13px;
      font-weight: 400;
      letter-spacing: 1px;
    }

    .topic-heading {
      font-size: 30px;
      letter-spacing: 3px;
    }

    .report-container {
      min-height: 100px;
      max-width: 1200px;
      margin: 70px auto 0px auto;
      background-color: #ffffff;
      border-radius: 30px;
      box-shadow: 3px 3px 10px rgb(188, 188, 188);
      padding: 0px 20px 0px 20px;
    }

    .report-header {
      height: 80px;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 20px 10px 20px;
      border-bottom: 2px solid rgba(0, 20, 151, 0.59);
    }

    .recent-Articles {
      font-size: 30px;
      font-weight: 600;
      color: #5500cb;
    }

    .view {
      padding: 10px;
      border-radius: 8px;
      background-color: #5500cb;
      color: white;
      font-size: 15px;
      border: none;
      cursor: pointer;
    }

    .editView {
      border-radius: 8px;
      background-color: #5500cb;
      color: white;
      font-size: 15px;
      border: none;
      cursor: pointer;
    }

    .report-body {
      max-width: 1160px;
      overflow-x: hidden;
      padding: 20px;
      max-height: 200px;
      overflow-y: auto;
    }

    .report-topic-heading,
    .item1 {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .t-op {
      font-size: 18px;
      letter-spacing: 0px;
    }

    .items {
      margin-top: 15px;
    }

    .item1 {
      margin-top: 20px;
    }

    .t-op-nextlvl {
      font-size: 14px;
      letter-spacing: 0px;
      font-weight: 600;
    }

    .label-tag {
      width: 100px;
      text-align: center;
      background-color: rgb(0, 177, 0);
      color: white;
      border-radius: 4px;
    }

    @media screen and (max-width: 950px) {
      .nav-img {
        height: 25px;
      }

      .nav-option {
        gap: 30px;
      }

      .nav-option h3 {
        font-size: 15px;
      }

      .report-topic-heading,
      .item1,
      .items {
        width: 800px;
      }
    }

    @media screen and (max-width: 850px) {
      .nav-img {
        height: 30px;
      }

      .nav-option {
        gap: 30px;
      }

      .nav-option h3 {
        font-size: 20px;
      }

      .report-topic-heading,
      .item1,
      .items {
        width: 700px;
      }

      .navcontainer {
        width: 100vw;
        position: absolute;
        transition: all 0.6s ease-in-out;
        top: 0;
        left: -100vw;
      }

      .nav {
        width: 100%;
        position: absolute;
      }

      .navclose {
        left: 00px;
      }

      .searchbar {
        display: none;
      }

      .main {
        padding: 40px 30px 30px 30px;
      }

      .searchbar2 {
        width: 100%;
        display: flex;
        margin: 0 0 40px 0;
        justify-content: center;
      }

      .searchbar2 input {
        width: 250px;
        height: 42px;
        border-radius: 50px 0 0 50px;
        background-color: var(--background-color3);
        padding: 0 20px;
        font-size: 15px;
        border: 2px solid var(--secondary-color);
      }
    }

    @media screen and (max-width: 490px) {
      .message {
        display: none;
      }

      .logosec {
        width: 100%;
        justify-content: space-between;
      }

      .logo {
        font-size: 20px;
      }

      .menuicn {
        height: 25px;
      }

      .nav-img {
        height: 25px;
      }

      .nav-option {
        gap: 25px;
      }

      .nav-option h3 {
        font-size: 12px;
      }

      .nav-upper-options {
        gap: 15px;
      }

      .recent-Articles {
        font-size: 20px;
      }

      .report-topic-heading,
      .item1,
      .items {
        width: 550px;
      }
    }

    @media screen and (max-width: 400px) {
      .recent-Articles {
        font-size: 17px;
      }

      .view {
        width: 60px;
        font-size: 10px;
        height: 27px;
      }

      .report-header {
        height: 60px;
        padding: 10px 10px 5px 10px;
      }

      .searchbtn img {
        height: 20px;
      }
    }

    @media screen and (max-width: 320px) {
      .recent-Articles {
        font-size: 12px;
      }

      .view {
        width: 50px;
        font-size: 8px;
        height: 27px;
      }

      .report-header {
        height: 60px;
        padding: 10px 5px 5px 5px;
      }

      .t-op {
        font-size: 12px;
      }

      .t-op-nextlvl {
        font-size: 10px;
      }

      .report-topic-heading,
      .item1,
      .items {
        width: 300px;
      }

      .report-body {
        padding: 10px;
      }

      .label-tag {
        width: 70px;
      }

      .searchbtn {
        width: 40px;
      }

      .searchbar2 input {
        width: 180px;
      }

      .view {
        text-decoration: none;
        color: white;
        background-color: #4CAF50;
        border: none;
        padding: 15px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        margin: 5px;
      }

      .view:hover {
        background-color: #45a049;
      }

      .report-body {
        margin-top: 20px;
      }

      .report-topic-heading h3 {
        display: inline-block;
        margin-right: 20px;
      }
    }
  </style>
</head>

<body>
  <header style="background-color: white;">
    <img src="images/Marakez.PNG" alt="LOGO" style="height: 50px;" />
  </header>
  <div class="main-container">
    <div class="navcontainer" style="
        margin-right: 50px;
        padding-right: 0px;
        width: 300px;">
      <nav class="nav">
        <div class="nav-upper-options">
          <div class="nav-option option1">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
              class="nav-img" alt="dashboard">
            <a class="nav-link active" href="#dashboard" style="color: white;">Dashboard</a>
          </div>
          <div class="option2 nav-option">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" class="nav-img"
              alt="articles">
            <a class="nav-link active" href="#Manageroutes">Admin</a>
          </div>
          <div class="nav-option option3 btn disabled">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png" class="nav-img"
              alt="report">
            <a class="nav-link">Buses</a>
          </div>
          <div class="sub-nav-option">
            <a class="nav-link" href="bus.php">Bus</a>
          </div>
          <div class="sub-nav-option">
            <a class="nav-link" href="driver.php">Driver</a>
          </div>
          <div class="sub-nav-option">
            <a class="nav-link" href="type.php">Type</a>
          </div>
          <div class="nav-option option4">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png" class="nav-img"
              alt="institution">
            <a class="nav-link" href="#schedules">Manage reservarions</a>
          </div>
          <div class="nav-option option5">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png" class="nav-img"
              alt="blog">
            <a class="nav-link" href="#bookings">Manage Tickets</a>
          </div>
          <div class="nav-option logout">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img"
              alt="logout">
            <h3>Logout</h3>
          </div>
        </div>
      </nav>
    </div>
    <div class="main">

      <div class="report-container " id="Manageroutes">
        <div class="report-header">
          <h1 class="recent-Articles">Search Drivers</h1>
          <a href="add-driver.php"><button class="view">Search</button></a>
        </div>
        <div class="report-body">
          <div iopenRolesSection class="container content-space-1">
            <form>
              <div class="row gx-2 gx-md-3 mb-4">
                <div class="col-12 mb-md-0">
                  <div class="input-group input-group-merge">
                    <input type="text" class="form-control form-control-lg" id="searchJobCareers"
                      placeholder="Search Driver Name" aria-label="Search job">
                  </div>
                </div>

            

              </div>
            </form>
          </div>
        </div>
      </div>


      <div class="report-container" id="drivers">

        <div class="report-header">
          <h1 class="recent-Articles">Manage Drivers</h1>
          <a href="add-driver.php"><button class="view">Add New Driver </button></a>
        </div>
        <table class="table">
          <thead>
            <tr>

              <th scope="col">#</th>
              <th scope="col">Driver Name</th>
              <th scope="col">Phone number</th>
              
              
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once('connection.php');
            if (isset($_POST['delete'])) {
              $delete_id = $_POST['id'];
              $delete_comment = $conn->prepare("DELETE FROM `driver` WHERE ID = ?");
              $delete_comment->bind_param("i", $delete_id);
              $delete_comment->execute();
              $message = 'Driver deleted successfully!';
            }

            // Fetch data from the database
            $query = "SELECT * FROM bus";
            $result = mysqli_query($conn, $query);

            $stmt = $conn->prepare("SELECT * FROM bus");
            $stmt->execute();
            $result = $stmt->get_result();
            // Initialize the row counter
            $rowNumber = 1;
            while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <form action="" method="post" class="flex-btn">
                  <input type="hidden" name="id" value="<?= $row['ID']; ?>">
                  <td><?= $rowNumber++; ?></td>
                  <td><?= $row['bus_name']; ?></td>
                  <td><?= $row['capacity']; ?></td>
                  
                  
                  <td>
                    <button type='button' class='btn-sm btn-primary me-1'>Edit</button>
                    <button id='rmButton' name="delete" type='submit' class='btn-sm btn-danger'
                      onclick="return confirm('Delete <?= $row['bus_name']; ?>');">Delete</button>
                  </td>
                </form>
              </tr>
              <?php
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
          </tbody>
        </table>
        <!--  <div class="report-body">
          <div class="report-topic-heading">
            <h3 class="t-op">#</h3>
            <h3 class="t-op">Name</h3>
            <h3 class="t-op">Capacity</h3>
            <h3 class="t-op">Plates</h3>
            <h3 class="t-op">Driver</h3>
            <h3 class="t-op">Type</h3>
            <h3 class="t-op">Actions</h3>
          </div>
          <div class="items">
            <div class="item1">
              <h3 class="t-op-nextlvl">1</h3>
              <h3 class="t-op-nextlvl">Haram</h3>
              <h3 class="t-op-nextlvl">26</h3>
              <h3 class="t-op-nextlvl">فنج 327</h3>
              <h3 class="t-op-nextlvl">Essam Mohamed</h3>
              <h3 class="t-op-nextlvl">Coaster</h3>
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
        </div> -->
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>