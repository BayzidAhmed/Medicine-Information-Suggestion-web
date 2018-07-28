<?php
require 'connection.php';
include 'header.php';

?>

<div class="container">
  <?php

    $getCompany = $_POST['company'];
    $getGenre = $_POST['genre'];

    if(!empty($getCompany) AND empty($getGenre) ) {
      $stmt = $connect->prepare("SELECT * FROM medicine WHERE maker_company = '$getCompany'");
    }
    else if(!empty($getGenre) AND empty($getCompany) ) {
      $stmt = $connect->prepare("SELECT * FROM medicine WHERE genre = '$getGenre'");
    }
    else if(!empty($getGenre) AND !empty($getCompany) ) {
      $stmt = $connect->prepare("SELECT * FROM medicine WHERE maker_company = '$getCompany' AND genre = '$getGenre'");
    }

    $stmt->execute();
    $data = $stmt->fetchAll();
  ?>
  <h3>Search results for: <?php echo $getGenre . ' (' . $getCompany . ')' ; ?></h3>

    <?php if(!empty($data)) { ?>
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
    <?php } else { ?>
      <div class="error">No medicine found!</div>
    <?php } ?>

</div>

</body>
</html>