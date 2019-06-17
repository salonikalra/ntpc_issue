<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style = "padding:10px;">
    <br>
    <nav class="nav nav-pills nav-justified">
      <a class="nav-item nav-link" href="index.php">Home</a>
      <a class="nav-item nav-link" href="addemployee.php">Add Employee</a>
      <a class="nav-item nav-link active" href="adddevice.php">Add Device</a>
      <a class="nav-item nav-link" href="issue.php">Issue</a>
      <a class="nav-item nav-link" href="return.php">Return</a>
    </nav>
    <br>
    <br>
    <br>

    <div style='padding:20px'>

    <h2>Add Device</h2>
    <form action="adddevice.php" method="post">
      <input type="text" name="company" value="" placeholder="company">
      <input type="text" name="type" value="" placeholder="type">
      <label>Is it returnable</label>
      <input type="checkbox" name="returnable" value=1>
      <input type="submit" name="submit" value="Add Row">
    </form>


<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){

  //TO INSERT DATA
  if(isset($_POST['submit'])){

    $company = $_POST['company'];
    $type = $_POST['type'];
    $returnable = isset($_POST['returnable']) ? "Yes" : "No";

    $res2 = mysqli_query($conn, "INSERT INTO `Device`(`Company`, `Type`, `Available`, `Returnable`) VALUES ('$company', '$type', 1, $returnable) ");

    if($res2){
      echo "Data entered in database successfully";
    }
    else{
      echo "Some error occured while entering the data in database";
    }
  }

  echo "<br>";

  //TO FETCH DATA
  $res = mysqli_query($conn, "SELECT * FROM Device ORDER BY DeviceNo");
  if(mysqli_num_rows($res)){
    $x = mysqli_fetch_all($res);
    echo "<h2>Database</h2>";
    echo "<table border = 1><th>Device No</th>  <th>Company</th>   <th>Type</th>   <th>Available?</th>   <th>Returnable?</th>";
    for($i = 0; $i < sizeof($x); $i++){

      print_r('<tr>'.'<td>'.$x[$i][0].'</td>'.'<td>'.$x[$i][1].'</td>'.'<td>'.$x[$i][2].'</td>'.'<td>'.$x[$i][3].'</td>'.'<td>'.$x[$i][4].'</td>'.'</tr>');
    }
    echo "</table>";
  }
}
echo "</div>";
echo "</body>";
echo "</html>";

 ?>
