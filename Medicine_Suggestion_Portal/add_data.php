<?php
include_once 'dbMySql.php';
$con = new DB_con();

// data insert code starts here.
if(isset($_POST['btn_save']))
{
	$iname = $_POST['item-name'];
	
	$res = $con->insert($iname);
	if($res)
	{
		?>
		<script>
		alert('Record inserted...');
        window.location='index.php'
        </script>
		<?php

	}
	else
	{
		?>
		<script>
		alert('error inserting record...');
        window.location='index.php'
        </script>
		<?php
	}
}
// data insert code ends here.

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Management System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
	<div id="content">
    <label>Store Management System</label>
    </div>
</div>
<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
	
	<tr>
    <th colspan="5">  <a href="index.php"><img src="b_back.jpg" alt="back" height="42" width="42"/></a></th>
    </tr>
	
    <tr>
    <td><input type="text" name="item-name" placeholder="Item Name 1" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="item-name" placeholder="Item Name 2" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="item-name" placeholder="Item Name 3" required /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" name="btn_save"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>