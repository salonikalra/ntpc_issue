<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Issue</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style = "padding:10px;">
  <br>
  <nav class="nav nav-pills nav-justified">
    <a class="nav-item nav-link" href="index.php">Home</a>
    <a class="nav-item nav-link" href="addemployee.php">Employees</a>
    <a class="nav-item nav-link" href="adddevice.php">Devices</a>
    <a class="nav-item nav-link" href="issue.php">Issue</a>
    <a class="nav-item nav-link" href="return.php">Return</a>
    <a class="nav-item nav-link active" href="report.php">Report</a>
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

  //TO FETCH DATA
  $res = mysqli_query($conn, "select Issue.IssueNo, Issue.Date, Issue.EmployeeNo, Employee.Name, Issue.DeviceNo, Device.Company, Device.Type
                              from Issue, Employee, Device
                              where Issue.EmployeeNo=Employee.EmployeeNo and Issue.DeviceNo=Device.DeviceNo and Month(Issue.Date) = MONTH(CURDATE()) ORDER BY Issue.Date");
  if(mysqli_num_rows($res)){
    $x = mysqli_fetch_all($res);
    echo "<h2>Report of the month</h2>";
    echo "<table border = 1><th>Issue No</th>  <th>Date of Issue</th>   <th>Employee No</th>   <th>Employee Name</th>     <th>Device No</th>   <th>Device Company</th>   <th>Device Type</th>";
    for($i = 0; $i < sizeof($x); $i++){

      print_r('<tr>'.'<td>'.$x[$i][0].'</td>'.'<td>'.$x[$i][1].'</td>'.'<td>'.$x[$i][2].'</td>'.'<td>'.$x[$i][3].'</td>'.'<td>'.substr($x[$i][5], 0, 1).substr($x[$i][6], 0, 1).$x[$i][4].'</td>'.'<td>'.$x[$i][5].'</td>'.'<td>'.$x[$i][6].'</td>'.'</tr>');
    }
    echo "</table>";
  }
}
echo "</div>";
echo "</body>";
echo "</html>";
 ?>
