<?php
  // connnect to the database
  include("config.php");
  session_start();
  $sql = "SELECT C_name FROM class";
  $class = mysqli_query($db, $sql);
  if(isset($_POST['submit'])) {
    //$id = $_POST['id'];
    $sql = "INSERT INTO class_list (C_name, St_ID) VALUES (  '". $_POST["class"]."' , '". $_POST["id"]."')";
    mysqli_query($db, $sql);
    $sql = "INSERT INTO Attn_record (length, St_ID, C_name) 
            VALUES ( '0', '". $_POST["id"]."', '". $_POST["class"]."' )";
    mysqli_query($db, $sql);
    //header('location: Teacher.php');
  }
  if(isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    mysqli_query($db, "DELETE FROM class_list WHERE C_name='$id'");
    mysqli_query($db, "DELETE FROM Attn-record WHERE C_name='$id'");
  }
  $tasks = mysqli_query($db, "SELECT C_name, St_ID FROM class_list");
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
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand" href="#">Atten-Done</a>

   <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
       <li class="nav-item active">
         <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#" onclick="location.href='index.php';">Logout</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Pricing</a>
       </li>
       <li class="nav-item">
         <a class="nav-link " href="#">Disabled</a>
       </li>
     </ul>
   </div>
 </nav>


       <h3>Adding Student</h3>
       <form action="Teacher.php" method="post">
         <label>Student ID:</label>
         <input type="text" name="id"></input>

         <select name="class">
           <option selected="selected">Select Class</option>
           <?php while($row1 = mysqli_fetch_array($class)):;?>
             <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
           <?php endwhile;?>
         </select>


         <button type="submit"  name="submit">Add</button>
      </form>



        <div class="container-fluid teacher-container">
            <div class="teacher-left bg-dark">
                <div class="teacher-top-panel">
                    <h4>Attendance Record: </h4><div class="teacher-addBtn" onClick={this.onOpenModal}><FontAwesome name="plus-circle" size='2x' style={{ color: '#6de8a8'}}/></div></div>

                <div class="teacher-text-field">

                    <table style="width: 100%">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Class</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>

                      <tbody>
                        <?php while ($row = mysqli_fetch_array($tasks)) { ?>


                          <tr>
                            <td><?php echo $row['St_ID']; ?></td>
                            <td><?php echo $row['C_name']; ?></td>
                            <td>
                              Present <input name="r" type="radio">
                              Absent <input name="r" type="radio">
                              Late <input name="r" type="radio">
                            </td>
                            <td class="delete">
                              <a href="Teacher.php?del_task=<?php echo $row['C_name']; ?>">x</a>
                            </td>
                          </tr>

                        <?php } ?>


                    </table>
                </div>
            </div>

            <div class="teacher-right bg-dark">
                <h4>View Classrooms:</h4>
                <div class="teacher-text-field">
                    <ul class="teacher-classroom-list">{classrooms}</ul>
                </div>
            </div>

        </div>
        </div>
      </body>
    </html>
