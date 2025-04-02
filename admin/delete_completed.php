<?php
include 'conn.php';
  $donor_id = $_GET['id'];
$sql= "DELETE FROM completed_donor where donor_id={$donor_id}";
$result=mysqli_query($conn,$sql);

header("Location: donors_list.php");

mysqli_close($conn);

 ?>
