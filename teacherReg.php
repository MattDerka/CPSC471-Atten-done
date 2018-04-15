<?php
include("config.php");
//include("session.php");
session_start();


if(isset($_POST['submit'])){
  $sql = "INSERT INTO teacher (Name, Password, Username) VALUES ('". $_POST["name"]."', '". $_POST["password"]."', '". $_POST["username"]."')";


if(!mysqli_query($db, $sql))
{
  die('Error: ' . mysqli_error($db));
}
else {
  $sql = "SELECT T_ID FROM teacher WHERE Username= '". $_POST["username"]."'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result);

  echo "<script type='text/javascript'>alert(" . $row['T_ID']. ");</script>";

  echo '<script type="text/javascript">window.location = "index.php"</script>';
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
        Teacher Registration
    </h2>
    <div class="container login-container">
        <form action="teacherReg.php" method="post">
    <div class="form-group">
      <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Name"></input>
    </div>
    <div class="form-group">
      <input type="text" name="username" class="form-control" id="exampleInputUserName1" aria-describedby="emailHelp" placeholder="Username"></input>
    </div>
    <div class="form-group">
    <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Password"></input>
    </div>
    <button type="submit" name="submit" class="btn btn-danger register-btn" >Register</button>
    </form>
    </div>
    </div>
  </body>
</html>
