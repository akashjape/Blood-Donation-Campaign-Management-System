<?php
include 'conn.php';
$donor_id = $_GET['id'];

// Fetch the donor details from the donor_details table
$sql = "SELECT * FROM donor_details WHERE donor_id={$donor_id}";
$result = mysqli_query($conn, $sql);

// Get the values from the $result variable
$row = mysqli_fetch_assoc($result);
$name = $row['donor_name'];
$number = $row['donor_number'];
$email = $row['donor_mail'];
$age = $row['donor_age'];
$gender = $row['donor_gender'];
$blood_group = $row['donor_blood'];
$address = $row['donor_address'];

// Insert the donor details into the completed_donor table
$sql = "INSERT INTO completed_donor(donor_name,donor_number,donor_mail,donor_age,donor_gender,donor_blood,donor_address) values('{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$address}')";
$result = mysqli_query($conn, $sql);

$sql3 = "DELETE FROM donor_details WHERE donor_id='$donor_id'";
  mysqli_query($conn, $sql3);

// Handle errors, if any
if ($result) {
    header("Location: http://localhost/BDMS/admin/volunteer_list.php");
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
