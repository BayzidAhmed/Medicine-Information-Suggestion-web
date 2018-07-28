<?php
require 'connection.php';
include 'header.php';

$stmt = $connect->prepare('SELECT * FROM medicine');
$stmt->execute();
$data = $stmt->fetchAll();
?>

<div class="container">
  <h3>Medicine by Companies</h3>
  <?php if(!empty($data)) { ?>

  <form class="form-horizontal" action="login.php" method="POST">
  	<select class="selectpicker" data-show-subtext="true" data-live-search="true">
		<option data-tokens="#">Select a Company</option>
		<?php foreach ($data as $row) { ?>
		<option data-tokens="<?php echo $row['maker_company'] ?>"><?php echo $row['maker_company'] ?></option>
		<?php } ?>
	</select>
	<select class="selectpicker" data-show-subtext="true" data-live-search="true">
		<option data-tokens="#">Select a Diseases</option>
		<?php foreach ($data as $row) { ?>
		<option data-tokens="<?php echo $row['disease_name'] ?>"><?php echo $row['disease_name'] ?></option>
		<?php } ?>
	</select>
	<input class="btn btn-primary" type="submit" name="submit" value="Search Medicine">
  </form>





  <div class="tab-content">
    <div id="tab1" class="tab-pane fade in active">
      <h3>Fixtures</h3>
       <table class="table table-hover">
        <thead>
        <tr>
          <th>Medicine Name</th>
          <th>Company</th>
          <th>Disease Name</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($data as $row) { ?>

          <tr>
            <td><?php echo $row['med_name'] ?></td>
            <td><?php echo $row['maker_company'] ?></td>
            <td><?php echo $row['disease_name'] ?></td>
          </tr>

          <?php } ?>

        </tbody>
        </table>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Fixtures1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Fixtures</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Fixtures</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>

  <?php }?>
</div>

</body>
</html>
