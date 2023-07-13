<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login_form.php');
    exit();
}
?>

<!-- Rest of the dashboard page HTML content goes here -->

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Accident Reporting System</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="dashboard.php"><img src="images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="logout.php">
              <i class="ti-power-off text-primary"></i>
              Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="repo_acc_form.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Accident</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_user_form.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="mdi mdi-calendar"></i> Today (<?php echo date('d M Y'); ?>)
                    </button>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Kigali</h4>
                        <h6 class="font-weight-normal">Rwanda</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
// Establish a database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'a_repo_sys';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to count the accidents
$sql = "SELECT COUNT(*) AS accidentCount FROM accidents";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);
    $accidentCount = $row['accidentCount'];
} else {
    // Display an error message
    echo "Error: Unable to count accidents." . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Accidents</p>
                      <p class="fs-30 mb-2"><?php echo $accidentCount; ?></p>
                    </div>
                  </div>
                </div>
                <?php
// Establish a database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'a_repo_sys';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to count the users
$sql = "SELECT COUNT(*) AS userCount FROM users";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);
    $userCount = $row['userCount'];
} else {
    // Display an error message
    echo "Error: Unable to count users." . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Users</p>
                      <p class="fs-30 mb-2"><?php echo $userCount; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="fs-30 mb-2">34040</p>
                      <p>2.00% (30 days)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="fs-30 mb-2">47033</p>
                      <p>0.22% (30 days)</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users</h4>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            id
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Username
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Password
                          </th>
                          <th>
                            Update
                          </th>
                          <th>
                            Delete
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
              // Establish a database connection
              $host = 'localhost';
              $username = 'root';
              $password = '';
              $dbname = 'a_repo_sys';
              
              $conn = mysqli_connect($host, $username, $password, $dbname);
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }
              
              // Fetch data from the users table
              $sql = "SELECT id, email, username, phone, password FROM users";
              $result = mysqli_query($conn, $sql);
              
              // Check if any rows are returned
              if (mysqli_num_rows($result) > 0) {
                  // Loop through each row and display the data in the table
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['username'] . "</td>";
                      echo "<td>" . $row['phone'] . "</td>";
                      echo "<td>" . $row['password'] . "</td>";
                      echo "<td><a href='update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm mr-2'>Update</a></td>"; // Update button with link to update.php
                      echo "<td><a href='delete_user.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; 
                      echo "</tr>";
                      
                  }
              } else {
                  echo "<tr><td colspan='5'>No data found</td></tr>";
              }
              
              // Close the database connection
              mysqli_close($conn);
              ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
              
              </div>

              <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Accidents Reported</h4>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            id
                          </th>
                          <th>
                            datetime
                          </th>
                          <th>
                            location
                          </th>
                          <th>
                            severity
                          </th>
                          <th>
                            City
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Update
                          </th>
                          <th>
                            Delete
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
              // Establish a database connection
              $host = 'localhost';
              $username = 'root';
              $password = '';
              $dbname = 'a_repo_sys';
              
              $conn = mysqli_connect($host, $username, $password, $dbname);
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }
              
              // Fetch data from the users table
              $sql = "SELECT id, datetime, location, severity, city, description FROM accidents";
              $result = mysqli_query($conn, $sql);
              
              // Check if any rows are returned
              if (mysqli_num_rows($result) > 0) {
                  // Loop through each row and display the data in the table
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['datetime'] . "</td>";
                      echo "<td>" . $row['location'] . "</td>";
                      echo "<td>" . $row['severity'] . "</td>";
                      echo "<td>" . $row['city'] . "</td>";
                      echo "<td>" . $row['description'] . "</td>";
                      echo "<td><a href='update_acc.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm mr-2'>Update</a></td>"; // Update button with link to update.php
                      echo "<td><a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";

                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='5'>No data found</td></tr>";
              }
              
              // Close the database connection
              mysqli_close($conn);
              ?>
              
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
              
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
