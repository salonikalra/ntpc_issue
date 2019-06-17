<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style = "padding:10px;">
  <br>
  <div style='padding:20px'>
    <h2>Login</h2>
    <form action="login.php" method="post">
      <input type="text" name="name" placeholder="Name" value="">
      <input type="password" name="password" placeholder="Password" value="">
      <input type="submit" name="submit" value="Login">
    </form>


<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){

  if(isset($_POST["submit"])){
    $givenuser = $_POST["name"];
    $givenpassword = $_POST["password"];

    $res = mysqli_query($conn, "SELECT *
                                FROM User
                                WHERE username='$givenuser'
                                ");
    if(mysqli_num_rows($res)){
      $x = mysqli_fetch_all($res);

      $dbuser = $x[0][0];
      $dbpassword = $x[0][1];

      if($givenpassword==$dbpassword){
        header('Location:index.php');
      }
      else{
        echo "<h2>Wrong password</h2>";
      }
    }
    else{
      echo "<h2>Username doesn't exist in database</h2>";
    }
  }
}
echo "</div>";
echo "</body>";
echo "</html>";

 ?>
