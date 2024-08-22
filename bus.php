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
  <link rel="stylesheet" href="css/admin-style.css">
</head>

<body>
  <header style="background-color: white;">
    <img src="images/Marakez.PNG" alt="LOGO" style="height: 50px;" />
  </header>
  <div class="main-container">
    <?php include_once('nav.php') ?>

    <div class="main">

      <div class="report-container " id="Manageroutes">
        <div class="report-body">
          <div iopenRolesSection class="container content-space-1">
            <form method="post">
              <div class="report-header">
                <h1 class="recent-Articles">Search Buses</h1>
                <button class="view" name="search_type" type='submit'>Search</button>

              </div>
              <div class="row gx-2 gx-md-3 mb-4">
                <div class="col-md-4 mb-2 mb-md-0">
                  <div class="input-group input-group-merge">
                    <input type="text" name="type_name" class="form-control form-control-lg" id="searchJobCareers"
                      placeholder="Search Bus Name" aria-label="Search job">
                  </div>
                </div>

                <div class="col-md-4 mb-2 mb-md-0">
                  <div class="input-group input-group-merge">
                    <input type="text" name="cap" class="form-control form-control-lg" id="searchJobCareers"
                      placeholder="Enter Capacity" aria-label="Search job">
                  </div>
                </div>

                <div class="col-md-4 mb-2 mb-md-0">
                  <div class="input-group input-group-merge">
                    <input type="text" name="plateNum" class="form-control form-control-lg" id="searchJobCareers"
                      placeholder="Enter Plates" aria-label="Search job">
                  </div>
                </div>
              </div>
              <div class="row gx-2 gx-md-3">
                <div class="col-sm-6 col-md-4">
                  <label class="form-label visually-hidden" for="departmentsJobCareers">Select department</label>
                  <select class="form-select form-select-lg" id="departmentsJobCareers" aria-label="Select department">
                    <option selected>Select Driver</option>
                    <option value="1">Software Development</option>
                    <option value="2">Sales</option>
                    <option value="3">Business strategy</option>
                    <option value="4">Design</option>
                  </select>
                </div>

                <div class="col-sm-6 col-md-4">
                  <label class="form-label visually-hidden" for="departmentsJobCareers">Select department</label>
                  <select class="form-select form-select-lg" id="departmentsJobCareers" aria-label="Select department">
                    <option selected>All departments</option>
                    <option value="1">Software Development</option>
                    <option value="2">Sales</option>
                    <option value="3">Business strategy</option>
                    <option value="4">Design</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>


      <div class="report-container" id="buses">

        <div class="report-header">
          <h1 class="recent-Articles">Manage Buses</h1>
          <a href="add-bus.php"><button class="view">Add New Bus </button></a>
        </div>
        <table class="table">
          <thead>
            <tr>

              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Capacity</th>
              <th scope="col">Plates</th>
              <th scope="col">Driver</th>
              <th scope="col">Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once('connection.php');

            $query = "SELECT * FROM bus";
            $result = mysqli_query($conn, $query);

            if (isset($_POST['search_type'])) {
              echo 'searching';
              $bus_name = $_POST['type_name'];
              $cap = $_POST['cap'];
              $plateNum = $_POST['plateNum'];
              $stmt = $conn->prepare("SELECT * FROM bus where bus_name like ? or capacity = ? or plates like ?");
              $search_term = '%' . $bus_name . '%';
              $plates_term = '%' . $plateNum . '%';
              echo $search_term;
              echo $cap;
              echo $plates_term;
              $stmt->bind_param("sis", $search_term, $cap, $plates_term);
            } else {
              $stmt = $conn->prepare("SELECT * FROM bus");
            }
            $stmt->execute();
            $result = $stmt->get_result();

            if (isset($_POST['delete'])) {
              $delete_id = $_POST['id'];
              $delete_comment = $conn->prepare("DELETE FROM `bus` WHERE ID = ?");
              $delete_comment->bind_param("i", $delete_id);
              $delete_comment->execute();
              $message = 'Bus deleted successfully!';
            }

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
                  <td><?= $row['plates']; ?></td>
                  <td><?= $row['driver_id']; ?></td>
                  <td><?= $row['type_id']; ?></td>
                  <td>
                    <a type='button' href="edit_bus.php?id=<?= $row['ID']; ?>" class='btn-sm btn-primary me-1'>Edit</a>
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