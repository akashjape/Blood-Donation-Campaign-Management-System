<?php
include 'conn.php';
$id = $_GET['id'];

// Fetch the donor details from the donor_details table
$sql = "SELECT * FROM requests WHERE id={$id}";
$result = mysqli_query($conn, $sql);

// Get the values from the $result variable
// $row = mysqli_fetch_assoc($result);
// $name = $row['fullname'];
// $number = $row['mobileno'];
// $hos_name = $row['hos_name'];
// $age = $row['age'];
// $gender = $row['gender'];
// $blood_id = $row['blood_id'];

// Insert the donor details into the completed_donor table
$sql = "UPDATE `requests` SET `Status`='Approved' WHERE id = $id";
$result = mysqli_query($conn, $sql);


// Handle errors, if any
if($result){
echo '<script language="javascript">';
        echo 'alert("Approved"); location.href="donor_request.php"';
        echo '</script>';

} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($conn);
?>
