<?php
  include("config.php");
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nm = mysqli_real_escape_string($db, $_POST['username']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT St_ID FROM student WHERE Username = '$nm' and Password = '$pass'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
      header("location: student.php");
    } else {
      $message = "wrong answer";
echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
?>

<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Attendone Login</title>
     <link rel="stylesheet" href="App.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="App">
   <h1 class="welcome-header">
       Atten-Done
   </h1>
   <div class="container login-container">
       <form action="" method="POST">
 <div class="form-group">
   <input type="email" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Enter Username"></input>
 </div>
 <div class="form-group">
   <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password"></input>
 </div>
<button class="btn btn-success login-btn" type="submit">Login</button>
</form>


  <input type="button" class="btn btn-danger register-btn" onClick="location.href='selection.php'" value="Not a Member"/>


   </div>
 </div>
  </body>
</html>
