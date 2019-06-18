<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style = "padding:10px;">
  <br>
  <nav class="nav nav-pills nav-justified">
    <a class="nav-item nav-link active" href="index.php">Home</a>
    <a class="nav-item nav-link" href="addemployee.php">Employees</a>
    <a class="nav-item nav-link" href="adddevice.php">Devices</a>
    <a class="nav-item nav-link" href="issue.php">Issue</a>
    <a class="nav-item nav-link" href="return.php">Return</a>
  </nav>
  <br>
  <br>
  <br>
  <div style='padding:20px'>


<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($conn){
  //In Stock
  $res = mysqli_query($conn, "SELECT COUNT(Device.DeviceNo), Device.Type, Device.Company
                              FROM Device
                              WHERE Device.Available='Yes'
                              GROUP BY Device.Type, Device.Company");

  //Issued Devices
  $res1 = mysqli_query($conn, "SELECT COUNT(Device.DeviceNo), Device.Type, Device.Company
                              FROM Device
                              WHERE Device.Available='No'
                              GROUP BY Device.Type, Device.Company");
  // //Total Devices
  // $res2 = mysqli_query($conn, "SELECT COUNT(DeviceNo), Type, Company
  //                             FROM Device
  //                             GROUP BY Type, Company;");
  // if(mysqli_num_rows($res)){
    if(mysqli_num_rows($res)){


      $stock = mysqli_fetch_all($res);
      $issued = mysqli_fetch_all($res1);
      // $total = mysqli_fetch_all($res2);


      echo "<h2>In Stock</h2>";
      echo "<table border = 1><th>Count</th>  <th>Type</th>  <th>Company</th>";
      for($i = 0; $i < sizeof($stock); $i++){
        print_r('<tr>'.'<td>'.$stock[$i][0].'</td>'.'<td>'.$stock[$i][1].'</td>'.'<td>'.$stock[$i][2].'</td>'.'</tr>');
      }
      echo "</table>";


      echo "<h2>Issued Devices</h2>";
      echo "<table border = 1><th>Count</th>  <th>Type</th>  <th>Company</th>";
      for($i = 0; $i < sizeof($issued); $i++){
        print_r('<tr>'.'<td>'.$issued[$i][0].'</td>'.'<td>'.$issued[$i][1].'</td>'.'<td>'.$issued[$i][2].'</td>'.'</tr>');
      }
      echo "</table>";


      // echo "<h2>Total Devices</h2>";
      // echo "<table border = 1><th>Count</th>  <th>Type</th>  <th>Company</th>";
      // for($i = 0; $i < sizeof($total); $i++){
      //   print_r('<tr>'.'<td>'.$total[$i][0].'</td>'.'<td>'.$total[$i][1].'</td>'.'<td>'.$total[$i][2  ].'</td>'.'</tr>');
      // }
      // echo "</table>";


    // }
  }
}

echo "</div>";
echo "</body>";
echo "</html>";
 ?>
