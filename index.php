<?php
  include("config.php");
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $sid = $_POST["id"];
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    // check if student is logging in
    $sql = "SELECT St_ID FROM student WHERE St_ID = '$id' and Password = '$pass'
            UNION
            SELECT T_ID FROM teacher WHERE T_ID = '$id' and Password = '$pass'
            UNION
            SELECT P_ID FROM parent WHERE P_ID = '$id' and Password = '$pass'
            UNION
            SELECT S_ID FROM school WHERE S_ID = '$id' and Password = '$pass'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    $idVal = $row['St_ID'];
    //$active = $row['active'];

    //$count = mysqli_num_rows($result);
    //echo "<script type='text/javascript'>alert('$row');</script>";

    if(999999 <$idVal && $idVal < 2000000) {
      header("location: student.php?idVal=".$idVal);
    }

    else if(1999999 < $idVal && $idVal < 3000000) {
      header("location: Teacher.php?idVal=");
    }

    else if(2999999 < $idVal && $idVal < 4000000) {
      header("location: school.php?idVal=".$idVal);
    }
    else if(3999999 < $idVal) {
       header("location: parent.php?idVal=".$idVal);
    }
    else {
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
   <input type="text" class="form-control" name="id" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Enter ID"></input>
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
