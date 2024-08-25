<div class="navcontainer" style="
        margin-right: 50px;
        padding-right: 0px;
        width: 300px;">
  <nav class="nav">
    <div class="nav-upper-options">
      <?php
      // Get the current page name
      $current_page = basename($_SERVER['PHP_SELF']);
      ?>

      <div class="nav-option <?php echo ($current_page == 'admin2.php') ? 'option1' : ''; ?>">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
          class="nav-img" alt="dashboard">
        <a class="nav-link <?php echo ($current_page == 'admin2.php') ? 'active' : ''; ?>"
          href="admin2.php">Dashboard</a>
      </div>

      <div class="nav-option <?php echo ($current_page == 'AdminPage.php') ? 'option1' : ''; ?>">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" class="nav-img"
          alt="articles">
        <a class="nav-link <?php echo ($current_page == 'AdminPage.php') ? 'active' : ''; ?>"
          href="AdminPage.php">Admin</a>
      </div>

      <div class="nav-option <?php echo ($current_page == 'points.php') ? 'option1' : ''; ?>">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" class="nav-img"
          alt="articles">
        <a class="nav-link <?php echo ($current_page == 'points.php') ? 'active' : ''; ?>"
          href="points.php">Points</a>
      </div>

      <div
        class="nav-option btn disabled <?php echo ($current_page == 'bus.php' || $current_page == 'driver.php' || $current_page == 'Bus_Type.php') ? 'option1' : ''; ?>">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png" class="nav-img" alt="report">
        <a class="nav-link">Buses</a>
      </div>

      <div class="sub-nav-option <?php echo ($current_page == 'bus.php') ? 'option1' : ''; ?>">
        <a class="nav-link <?php echo ($current_page == 'bus.php') ? 'active' : ''; ?>" href="bus.php">Bus</a>
      </div>

      <div class="sub-nav-option <?php echo ($current_page == 'driver.php') ? 'option1' : ''; ?>">
        <a class="nav-link <?php echo ($current_page == 'driver.php') ? 'active' : ''; ?>" href="driver.php">Driver</a>
      </div>

      <div class="sub-nav-option <?php echo ($current_page == 'Bus_Type.php') ? 'option1' : ''; ?>">
        <a class="nav-link <?php echo ($current_page == 'Bus_Type.php') ? 'active' : ''; ?>"
          href="Bus_Type.php">Type</a>
      </div>

      <div class="nav-option logout">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img" alt="logout">
        <h3>Logout</h3>
      </div>
    </div>
  </nav>
</div>