<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employees</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style = "padding:10px;">
    <br>
    <nav class="nav nav-pills nav-justified">
      <a class="nav-item nav-link" href="index.php">Home</a>
      <a class="nav-item nav-link active" href="addemployee.php">Employees</a>
      <a class="nav-item nav-link" href="adddevice.php">Devices</a>
      <a class="nav-item nav-link" href="issue.php">Issue</a>
      <a class="nav-item nav-link" href="return.php">Return</a>
      <a class="nav-item nav-link" href="report.php">Report</a>
    </nav>
    <br>
    <br>
    <br>

    <div style='padding:20px'>

    <h2>Add Employee</h2>
    <form action="addemployee.php" method="post">
      <input type="text" name="name" value="" placeholder="name">
      <input type="text" name="designation" value="" placeholder="designation">
      <input type="number" name="raxno" value="" placeholder="raxno">
      <input type="text" name="department" value="" placeholder="department">
      <input type="submit" name="submit" value="Add Employee`">
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

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $raxno = $_POST['raxno'];
    $department = $_POST['department'];

    $res2 = mysqli_query($conn, "INSERT INTO Employee(name, designation, raxno, department) VALUES('$name', '$designation', $raxno, '$department' )");

    if($res2){
      echo "Data entered in database successfully";
    }
    else{
      echo "Some error occured while entering the data in database";
    }
  }

  echo "<br>";

  //TO FETCH DATA
  $res = mysqli_query($conn, "SELECT * FROM Employee ORDER BY EmployeeNo");
  if(mysqli_num_rows($res)){
    $x = mysqli_fetch_all($res);
    echo "<h2>Database</h2>";
    echo "<table border = 1><th>Employee No</th>  <th>Name</th>   <th>Designation</th>    <th>Rax No</th>   <th>Department</th>";
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
