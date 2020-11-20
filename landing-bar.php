<!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="landing.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="img/ds-logo.png" height="50" width="50">
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['username']; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <?php
      if($_SESSION['rights'] == "root"){
      ?>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="landing.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Records
      </div>

      <!-- Nav Item - Results -->
      <li class="nav-item">
        <a class="nav-link" href="result.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Results</span></a>
      </li>

      <!-- Nav Item - View Q & A -->
      <li class="nav-item">
        <a class="nav-link" href="showquestions.php">
          <i class="fas fa-fw fa-table"></i>
          <span>View Q & A</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Actions
      </div>

      <!-- Nav Item - Check Essays -->
      <li class="nav-item">
        <a class="nav-link" href="searchessay.php">
          <i class="fas fa-fw fa-check"></i>
          <span>Check Essays</span></a>
      </li>

      <!-- Nav Item - Add Questions -->
      <li class="nav-item">
        <a class="nav-link" href="addquestion.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add Questions</span></a>
      </li>

      
      <!-- Nav Item - Remove Questions -->
      <li class="nav-item">
        <a class="nav-link" href="removequestion.php">
          <i class="fas fa-fw fa-minus"></i>
          <span>Remove Questions</span></a>
      </li>

      <!-- Nav Item - Generate Exam Password -->
      <li class="nav-item">
        <a class="nav-link" href="genpw.php">
          <i class="fas fa-fw fa-terminal"></i>
          <span>Generate Exam Password</span></a>
      </li>

      <!-- Nav Item - Add an Account -->
      <li class="nav-item">
        <a class="nav-link" href="addaccount.php">
          <i class="fas fa-fw fa-address-book"></i>
          <span>Add Account</span></a>
      </li>

      <!-- Nav Item - Change a Role -->
      <li class="nav-item">
        <a class="nav-link" href="changerole.php">
          <i class="fas fa-fw fa-universal-access"></i>
          <span>Change Role</span></a>
      </li>

      <?php
      }
      else if ($_SESSION['rights'] == "Administrator"){
      ?>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="landing.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Records
      </div>

      <!-- Nav Item - Results -->
      <li class="nav-item">
        <a class="nav-link" href="result.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Results</span></a>
      </li>

      <!-- Nav Item - View Q & A -->
      <li class="nav-item">
        <a class="nav-link" href="showquestions.php">
          <i class="fas fa-fw fa-table"></i>
          <span>View Q & A</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Actions
      </div>

      <!-- Nav Item - Check Essays -->
      <li class="nav-item">
        <a class="nav-link" href="searchessay.php">
          <i class="fas fa-fw fa-check"></i>
          <span>Check Essays</span></a>
      </li>

      <!-- Nav Item - Add Questions -->
      <li class="nav-item">
        <a class="nav-link" href="addquestion.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add Questions</span></a>
      </li>

      
      <!-- Nav Item - Remove Questions -->
      <li class="nav-item">
        <a class="nav-link" href="removequestion.php">
          <i class="fas fa-fw fa-minus"></i>
          <span>Remove Questions</span></a>
      </li>

      <!-- Nav Item - Generate Exam Password -->
      <li class="nav-item">
        <a class="nav-link" href="genpw.php">
          <i class="fas fa-fw fa-terminal"></i>
          <span>Generate Exam Password</span></a>
      </li>

      <?php
    }
    else if ($_SESSION['rights'] == "Auditor"){
      ?>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="landing.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Records
      </div>

      <!-- Nav Item - Results -->
      <li class="nav-item">
        <a class="nav-link" href="result.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Results</span></a>
      </li>

      <!-- Nav Item - View Q & A -->
      <li class="nav-item">
        <a class="nav-link" href="showquestions.php">
          <i class="fas fa-fw fa-table"></i>
          <span>View Q & A</span></a>
      </li>

      <?php
    }
    else if ($_SESSION['rights'] == "Maintainer"){
      ?>

       <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="landing.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Records
      </div>

      <!-- Nav Item - Results -->
      <li class="nav-item">
        <a class="nav-link" href="result.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Results</span></a>
      </li>

      <!-- Nav Item - View Q & A -->
      <li class="nav-item">
        <a class="nav-link" href="showquestions.php">
          <i class="fas fa-fw fa-table"></i>
          <span>View Q & A</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Actions
      </div>

      <!-- Nav Item - Add Questions -->
      <li class="nav-item">
        <a class="nav-link" href="addquestion.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add Questions</span></a>
      </li>

      
      <!-- Nav Item - Remove Questions -->
      <li class="nav-item">
        <a class="nav-link" href="removequestion.php">
          <i class="fas fa-fw fa-minus"></i>
          <span>Remove Questions</span></a>
      </li>

      <?php
    }
      ?>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Change Password -->
      <li class="nav-item">
        <a class="nav-link" href="changepassword.php">
          <i class="fas fa-fw fa-key"></i>
          <span>Change Password</span></a>
      </li>

      <!-- Nav Item - Help -->
      <li class="nav-item">
        <a class="nav-link" href="help.php">
          <i class="fas fa-fw fa-question"></i>
          <span>Help</span></a>
      </li>

      <!-- Nav Item - Logout -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-door-open"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End of Sidebar -->