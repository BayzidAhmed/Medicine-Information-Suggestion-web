<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">BAYMAX</a>
    </div>
    
    <?php
	if(!isset($_SESSION['username'])) {
    ?>
    <!-- for user -->
    <ul class="nav navbar-nav">
      <li><a href="med_info.php">Medicines</a></li>
      <li><a href="sugg_med.php">Medicine Suggestion</a></li>
      <li><a href="about_us.php">About Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>

    <form class="navbar-form navbar-left" action="results.php" method="POST">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Medicine" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div> 
    </form>
    <?php } else {?>
    <!-- for admin -->
    <ul class="nav navbar-nav">
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="add.php">Add Medicine</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    <?php
	}
    ?>

  </div>
</nav>
