<?php
include("config.php");
//include("session.php");
session_start();


if(isset($_POST['submit'])){
  $sql = "INSERT INTO student (Age, Name, Password, Username) VALUES ('". $_POST["age"]."', '". $_POST["name"]."', '". $_POST["password"]."', '". $_POST["username"]."')";


if(!mysqli_query($db, $sql))
{
  die('Error: ' . mysqli_error($db));
}
else {
  echo "student added";
  header("location: index.php");
}
}
?>


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
        Student Registration
    </h2>
    <div class="container login-container">
        <form action="studentReg.php" method="post">
    <div class="form-group">
      <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Name"></input>
    </div>
    <div class="form-group">
      <input type="text" name="username" class="form-control" id="exampleInputUserName1" aria-describedby="emailHelp" placeholder="Username"></input>
    </div>
    <div class="form-group">
      <input type="text" name="age" class="form-control" id="exampleInputParentName" aria-describedby="emailHelp" placeholder="Age"></input>
    </div>
  <div class="form-group">
    <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Password"></input>
  </div>
 <button type="submit" class="btn btn-danger register-btn" name="submit">Register</button>
    </form>
    </div>
</div>
  </body>
</html>
