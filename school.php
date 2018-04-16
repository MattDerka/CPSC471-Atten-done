<?php
include ("config.php");
session_start();
$x = $_GET['idVal'];

if(isset($_POST['add-teacher'])) {
  // $sql = "UPDATE class 
  //         SET T_ID = '". $_POST["teacher-id"]."' 
  //         WHERE C_name = '". $_POST["class-name"]."'";
  $sql = "UPDATE class 
    SET T_ID = '". $_POST["teacher-id"]."' 
    WHERE class.C_name = '". $_POST["class-name"]."'";

  if(!mysqli_query($db, $sql)) {
    die('Error: ' . mysqli_error($db));
  }
  else {

  }
}
if(isset($_POST['create-class'])) {
  $sql = "INSERT INTO class (C_name, Capacity, Description, S_ID, T_ID) 
          VALUES ('". $_POST["class-name-create-class"]."', 
                  '". $_POST["capacity-create-class"]."',
                  '". $_POST["description-create-class"]."',
                  '". $_POST["sid-create-class"]."',
                  '". $_POST["tid-create-class"]."')";

if(!mysqli_query($db, $sql)) {
    die('Error: ' . mysqli_error($db));
  }
  else {

  }
  
}



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>School page</title>
     <link rel="stylesheet" href="App.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="App">
      <div class="container-fluid school-container">
       <div class="container school-sub-container">
         <form action="" method="post">
          <h2>Assign teacher form:</h2>
          <div>
            <div class="form-group">
              <input name="class-name" class="form-control" type="text" name="class" placeholder="Class name"></input></div>
            <div class="form-group">
          
          <input name="teacher-id" class="form-control" type="text" placeholder="Teacher's ID"></input></div>

        <button name="add-teacher" class="btn btn-success " type="submit">Submit</button>
          <h2>Create class form:</h2>
          <div>
            <div class="form-group">
              <input name="class-name-create-class" class="form-control" type="text" name="class" placeholder="Class name"></input></div>
            <div class="form-group">
              <input name="capacity-create-class" class="form-control" type="text" placeholder="Capacity of class"></input></div>
            <div class="form-group">
              <input name="description-create-class" class="form-control" type="text" placeholder="Class description"></input></div>
            <div class="form-group">
              <input name="sid-create-class" class="form-control" type="text" placeholder="School ID"></input></div>
            <div class="form-group">
              <input name="tid-create-class" class="form-control" type="text" placeholder="Teacher that teaches this class"></input></div>

            <button name="create-class" class="btn btn-success " type="submit">Submit</button>


           </form></div>
       </div>
      <div class="container school-sub-container">
         <h2>List of classes: </h2>
         <div class="innerTextField">
           <ul class="list-group">
            <?php
              $sql = "SELECT C_name FROM class WHERE S_ID = '$x'";
              $result = $db->query($sql);

              if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "" . $row["C_name"]. "<br>";
                    }
                  } else {
                  echo "0 results";
              }

            ?>
           </ul>
         </div>
       </div>
     </div>
      
         
    </div>
   </div>
 </div>
  </body>
</html>