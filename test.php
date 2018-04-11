<?php
  include("config.php");
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nm = mysqli_real_escape_string($db, $_POST['email']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT id FROM student WHERE email = '$nm' and password='$pass'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
      header("location: student.php");
    } else {
      $error = "email or password is incorrect";
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
   <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Enter email"></input>
 </div>
 <div class="form-group">
   <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password"></input>
 </div>
<button class="btn btn-success" type="submit">Login</button>
</form>

 <input type="button" class="btn btn-success" value="Not a Member" />

   </div>
 </div>
  </body>
</html>
