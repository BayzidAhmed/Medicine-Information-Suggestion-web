<?php
require 'connection.php';
include 'header.php';

  if(isset($_POST['submit'])) {

    // Get data from FORM
    $username = $_POST['username'];
    $password = $_POST['password'];

      try {
        $stmt = $connect->prepare('SELECT * FROM user WHERE username = :username');
        $stmt->execute(array(
          ':username' => $username
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "User $username not found.";
        }
        else {
          if($password == $data['password']) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];

            header('Location: dashboard.php');
            exit;
          }
          else
            $errMsg = 'Password not match.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
  }

?>


<div class="container">
  <h2>Admin Only</h2>
  <form class="form-horizontal" action="login.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Name:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="username" placeholder="Enter name" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-5">          
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" class="btn btn-default" value="Login">
      </div>
    </div>
  </form>
</div>
