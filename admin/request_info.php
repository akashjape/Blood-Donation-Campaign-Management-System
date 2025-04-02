<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #04AA6D;
  color: white;
}
</style>
</head>

<body>
  <?php 
  $active ='';
  include('../head.php') ?>

  <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
    <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">

  <div class="row">
      <div class="col-lg-6">
          <h1 class="mt-4 mb-3">Search History</h1>

        </div>
  </div>
  <form name="search" action="" method="post">
  <div class="row">
  <div class="col-lg-4 mb-4">
  <div class="font-italic">Patient Name<span style="color:red">*</span></div>
  <div><input type="text" name="name" class="form-control" required>
</div>
</div>

  <div class="col-lg-4 mb-4">
  <div class="font-italic">Mobile Number<span style="color:red">*</span></div>
  <div><input type="number" name="mobileno" class="form-control" required>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="search" class="btn btn-primary" value="Search" style="cursor:pointer"></div>
</div>

</div>
<div class="row">
<?php
  include 'conn.php';
if(isset($_POST['search'])){
  $name=$_POST['name'];
  $mobileno=$_POST['mobileno'];

$limit = 10;
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $count=$offset+1;


  $sql = "SELECT * FROM requests JOIN blood WHERE requests.blood_id=blood.blood_id AND fullname='{$name}'AND mobileno='{$mobileno}' ORDER BY created_at";
  $result = mysqli_query($conn, $sql) or die("query unsuccessful.");

  if(mysqli_num_rows($result) > 0) {
          echo "<table border=1>";
    echo "<tr><th>Sr.No</th><th>Name</th><th>Phone</th><th>Hospital Name</th><th>Prescription</th><th>Status</th></tr>";

    while($row = mysqli_fetch_assoc($result)) {
?>



        <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $row['fullname']; ?></td>
                  <td><?php echo $row['mobileno']; ?></td>
                  <td><?php echo $row['hos_name']; ?></td>                  
                  <td><img src="<?php echo $row['prescription']; ?>" height="100px" width = "100px"></td>
                  <td><?php echo $row['Status']; ?></td>

        </tr>

    </table>


  <?php  }

  }

  else {
    echo '<div class="alert alert-danger">No Details Found For Your Search</div>';
  }
}
?>


<!--  -->

<!--  -->
</div>
<div>
<h6 class="mt-4 mb-3">Click here <u><a href="../home.php">Go Home</a>.</u></h6>
</div>
</div>

</div>

<!-- <?php include 'footer.php' ?> -->
</div>
</body>

</html>
