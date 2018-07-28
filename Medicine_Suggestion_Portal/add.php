<?php
require 'connection.php';
include 'header.php';

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}

if(isset($_POST['add'])) {

	// Get data from FROM
  $genre        = $_POST['genre'];
  $name         = $_POST['name'];
  $med_type     = $_POST['med_type'];
  $company      = $_POST['maker_company'];
  $disease_name = $_POST['disease_name'];
  $description  = $_POST['description'];

	try {
		$stmt = $connect->prepare('INSERT INTO medicine (genre, med_name, med_type, maker_company, disease_name, description) VALUES (:genre,:name, :med_type, :maker_company, :disease_name, :description)');
		$stmt->execute(array(
      ':genre'         => $genre,
      ':name'          => $name,
      ':med_type'      => $med_type,
      ':maker_company' => $company,
      ':disease_name'  => $disease_name,
      ':description'   => $description
			));
		header('Location: add.php?action=joined');
		exit;
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
}

if(isset($_GET['action']) && $_GET['action'] == 'joined') {
	$msg = 'Successfull....!';
}
?>

<div class="container">
  <h2>Add Medicine</h2>
  <?php if(isset($msg)) echo $msg; ?>
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Medicine Class:</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" id="name" placeholder="Enter Medicine Class" name="genre">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Medicine Type:</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" id="name" placeholder="Enter Medicine Type" name="med_type">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="company">Company:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="company" placeholder="Enter Company" name="maker_company">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="disease_name">Disease Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="disease_name" placeholder="Enter Disease" name="disease_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Description:</label>
      <div class="col-sm-10">
      <textarea rows="4" cols="50" class="form-control" placeholder="Short Description" name="description"></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="add">Add Medicine</button>
      </div>
    </div>
  </form>
</div>



<?php //include 'footer.php'; ?>