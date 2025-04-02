<?php
include 'conn.php';

if(isset($_POST['search'])) {
  $name = $_POST['name'];
  $mobile = $_POST['mobileno'];


  $sql = "SELECT * FROM request WHERE name='$name' AND mobile='$mobile'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output the search results in a table
    echo "<table>";
    echo "<tr><th>Name</th><th>Mobile</th><th>Request</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["fullname"]."</td><td>".$row["mobileno"]."</td><td>".$row["Status"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "No results found.";
  }

  $conn->close();
}


?>