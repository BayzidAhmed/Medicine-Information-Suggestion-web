<?php
require 'connection.php';
include 'header.php';
?>

<div class="container">
  <?php
  if(isset($_POST['search'])) {
    $key = $_POST['search'];
    $stmt = $connect->prepare("SELECT * FROM medicine WHERE med_name = '$key'");
    $stmt->execute();
    $data = $stmt->fetchAll();
  ?>


  <h3>Search results for: <?php echo $key; ?></h3>

    <?php if(!empty($data)) { ?>
     <table class="table table-hover">
        <thead>
        <tr>
          <th>Medicine Class</th>
          <th>Medicine Name</th>
          <th>Medicine Type</th>
          <th>Company</th>
          <th>Disease Name</th>
          <th>Contains</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($data as $row) { ?>

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
    <?php } else { ?>
      <div class="error">No medicine found!</div>
    <?php } ?>

  <?php } else { ?>
  <div class="error">No keyword entered</div>
  <?php }?>

</div>

</body>
</html>