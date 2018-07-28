<?php
require_once 'connection.php';
include 'header.php';
$title = 'Suggestion';
$show_results = 0;



$disease = $_POST['disease'];
$stmt = $db->suggestMedicine($disease);
$show_results = 1;
$stmt->execute();
$results = $stmt->fetchAll();

?>

<div class="container">
  <h1>WARNING! This is not authorized by any professional.</h1>
  <h2>The Suggestion is Made Based on Generic Use of the Medicines.</h2><br><br>
  <p1>Select a Disease to Find Medicine</p1>
  <form action="" method="POST">
     <select name="disease" class="selectpicker" data-show-subtext="true" data-live-search="true">
      <option data-tokens="#">Select a Disease</option>
      <?php foreach ($data as $row) { ?>
      <option data-tokens="<?php echo $row['disease_name'] ?>"><?php echo $row['disease_name'] ?></option>
      <?php } ?>
    </select>
    <input class="btn btn-primary" type="submit" name="search" value="Search">
  </form>
</div>

<?php if($show_results==1) { ?>

<div class="container">
  <h3>Medicine Information</h3>
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Medicine Class</th>
      <th>Medicine Name</th>
      <th>Medicine Type</th>
      <th>Company</th>
      <th>Disease Name</th>
      <th>Description</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($results as $row) { ?>

      <tr>
        <td><?php echo $row['genre'] ?></td>
        <td><?php echo $row['med_name'] ?></td>
        <td><?php echo $row['med_type'] ?></td>
        <td><?php echo $row['maker_company'] ?></td>
        <td><?php echo $row['disease_name'] ?></td>
        <td><?php echo $row['description'] ?></td>

      </tr>

      <?php } ?>

    </tbody>
  </table>
</div>
<?php } ?>