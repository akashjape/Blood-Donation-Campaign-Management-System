<?php
error_reporting(0);
include 'conn.php';

if(isset($_POST['submit'])){

$fullname = $_POST['fullname'];
$mobileno = $_POST['mobileno'];
$hos_name = $_POST['hos_name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_id = $_POST['blood'];
$files = $_FILES['file'];

$filename = $files['name'];
$filetmp = $files['tmp_name'];
$fileerror = $files['error'];

$fileext = explode('.',$filename);
 $filecheck = strtolower(end($fileext));

$fileextstored = array('png', 'jpg', 'jpeg');
if(in_array($filecheck, $fileextstored)){
    $destinationfile = 'upload/'.$filename;
    move_uploaded_file($filetmp, $destinationfile);


$sql = "INSERT INTO requests (fullname, mobileno, hos_name, age, gender, blood_id, prescription)
VALUES ('$fullname', '$mobileno', '$hos_name', '$age', '$gender', '$blood_id','$destinationfile')";

if (mysqli_query($conn, $sql)) {
  echo '<script>alert("Request sent Successfully!");</script>';
  header('refresh:1 url=../request-blood.php');

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
mysqli_close($conn);
?>
