<?php
require 'connection.php';
include 'header.php';

$stmt = $connect->prepare('SELECT * FROM medicine');
$stmt->execute();
$data = $stmt->fetchAll();
?>

<div class="container">
  <h2>Medicine Information</h2>

   <table class="table table-hover">
    <thead>
    <tr>
      <th>Medicine Name</th>
      <th>Company</th>
      <th>Disease Name</th>
    </tr>
    </thead>
    <tbody>

    <?php if(!empty($data)) {
        foreach ($data as $row) { ?>

      <tr>
        <td><?php echo $row['med_name'] ?></td>
        <td><?php echo $row['maker_company'] ?></td>
        <td><?php echo $row['disease_name'] ?></td>
      </tr>

      <?php }
      } ?>

    </tbody>
    </table>
</div>

</body>
</html>
