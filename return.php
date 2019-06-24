<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Return</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style = "padding:10px;">
  <br>
  <nav class="nav nav-pills nav-justified">
    <a class="nav-item nav-link" href="index.php">Home</a>
    <a class="nav-item nav-link" href="addemployee.php">Employees</a>
    <a class="nav-item nav-link" href="adddevice.php">Devices</a>
    <a class="nav-item nav-link" href="issue.php">Issue</a>
    <a class="nav-item nav-link active" href="return.php">Return</a>
  </nav>
  <br>
  <br>
  <br>

  <div style='padding:20px'>

    <h2>Return Device</h2>
    <form action="return.php" method="post">

      <label>Date of return</label>
      <input type="date" name="date1" value="">
      <input type="number" name="employeeno" value="" placeholder="employeeno">
      <input type="text" name="deviceno" value="" placeholder="deviceno">

      <input type="submit" name="submit" value="Return">

    </form>


<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){

  #IF SUBMIT
  if(isset($_POST['submit'])){

    $date1 = strtotime($_POST["date1"]);
    $date1 = date('Y-m-d', $date1);
    $employeeno = $_POST['employeeno'];
    $deviceno = $_POST['deviceno'];
    $deviceno = substr($deviceno, 2);

    #CHECKING IF THE DEVICE IS RETURNABLE
    $res0 = mysqli_query($conn, "SELECT DeviceNo FROM Device WHERE DeviceNo=$deviceno AND Returnable='Yes'");
    if(mysqli_num_rows($res0)){

      #CHECKING IF THE DEVICE ENTERED IS IN ISSUE TABLE AND IS NOT RETURNED
      $res1 = mysqli_query($conn, "SELECT DeviceNo FROM Device WHERE DeviceNo=$deviceno AND Available='No'");
      if(mysqli_num_rows($res1)){

        #UPDATE DEVICE DATABASE TO REFLECT RETURN OF THE ISSUE DEVICE IF THE DEVICE HAS BEEN ISSUE
        $res2 = mysqli_query($conn, "UPDATE `Device` SET `Available`='Yes' WHERE `DeviceNo`=$deviceno");
        if($res2){

          $res3 = mysqli_query($conn, "INSERT INTO `Return1`(`Date`, `EmployeeNo`, `DeviceNo`) VALUES ('$date1', $employeeno, $deviceno)");
          #IF ENTERED IN THE RECORD IN RETURN DATABASE
          if($res3){
            echo "Data inserted in database successfully";}
          else{
            echo "Couln't insert given data into the database";}

        }
        else{
          echo "Couln't update returned flag";}

      }
      else{
        echo "No such device has been issued";}
    }
    else {
      echo "No such device is returnable";
    }



  }

  echo "<br>";

  //TO FETCH DATA

  $res = mysqli_query($conn, 'select Return1.ReturnNo, Return1.Date, Return1.EmployeeNo, Employee.Name, Return1.DeviceNo, Device.Company, Device.Type
                              from Return1, Employee, Device
                              where Return1.EmployeeNo=Employee.EmployeeNo and Return1.DeviceNo=Device.DeviceNo
                              ORDER BY Return1.ReturnNo');
  if(mysqli_num_rows($res)){
    $x = mysqli_fetch_all($res);
    echo "<h2>Database</h2>";
    echo "<table border = 1><th>Return No</th>  <th>Date of Return</th>   <th>Employee No</th>    <th>Employee Name</th>     <th>Device No</th>   <th>Device Company</th>   <th>Device Type</th>";
    for($i = 0; $i < sizeof($x); $i++){

      print_r('<tr>'.'<td>'.$x[$i][0].'</td>'.'<td>'.$x[$i][1].'</td>'.'<td>'.$x[$i][2].'</td>'.'<td>'.$x[$i][3].'</td>'.'</td>'.'<td>'.substr($x[$i][5], 0, 1).substr($x[$i][6], 0, 1).$x[$i][4].'</td>'.'</td>'.'<td>'.$x[$i][5].'</td>'.'</td>'.'<td>'.$x[$i][6].'</td>'.'</tr>');
    }
    echo "</table>";
  }
}
echo "</div>";
echo "</body>";
echo "</html>";

 ?>
