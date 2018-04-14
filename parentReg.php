<?php
include("config.php");
//include("session.php");
session_start();


if(isset($_POST['submit'])){
  $sql = "INSERT INTO parent (Email, Name, Password, Phone, Username) VALUES ('". $_POST["email"]."', '". $_POST["name"]."', '". $_POST["password"]."', '". $_POST["phone"]."', '". $_POST["username"]."')";


if(!mysqli_query($db, $sql))
{
  die('Error: ' . mysqli_error($db));
}
else {
  echo "teacher added";
  header("location: index.php");
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="App.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="App">
    <h2 class="welcome-header">
        Parent Registration
    </h2>
    <div class="container login-container">
        <form action="parentReg.php" method="post">
    <div class="form-group">
      <input type="text" class="form-control" name="name" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Name"></input>
    </div>
    <div class="form-group">
    <input type="email" class="form-control" name="email" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="Enter email"></input>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="phone" id="exampleInputUserName1" aria-describedby="emailHelp" placeholder="Phone Number"></input>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="username" id="exampleInputUserName1" aria-describedby="emailHelp" placeholder="Username"></input>
    </div>
    <div class="form-group">
    <input type="password" class="form-control" name="password" id="exampleInputPassword1"  placeholder="Password"></input>
    </div>
    <button type="submit" name="submit" class="btn btn-danger register-btn" >Register</button>
    </form>
    </div>
    </div>
  </body>
</html>
