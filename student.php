<?php
  include("config.php");
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Student</title>
  <link rel="stylesheet" href="App.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


      <div class="App">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand" href="#">Student Page</a>

   <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
       <li class="nav-item active">
         <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" onclick="location.href='index.php';">Logout</a>
       </li>
       <li class="nav-item">
         <a class="nav-link " href="#">Disabled</a>
       </li>
     </ul>
   </div>
 </nav>


     <Modal open={this.state.open} onClose={this.onCloseModal} little>
       <h3>Hello:</h3>
     </Modal>
        <div class="container-fluid teacher-container">
            <div class="teacher-left bg-dark">
                <div class="teacher-top-panel">
                    <h4>Attendance Record:</h4><div class="teacher-addBtn" onClick={this.onOpenModal}></div></div>

                <div class="teacher-text-field">
                    <ul class="teacher-students-list">
                      <?php
                        $idVal = $_GET['idVal'];
                        $sql = "SELECT C_name FROM class_list WHERE St_ID='$idVal'";
                        $result = $db->query($sql);

                        if($result->num_rows > 0){

                          while($row = $result->fetch_assoc()){
                            echo "" . $row["C_name"]. "<br>";

                          }
                        }
                        else{
                          echo "0 results";
                        }
                      ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>

</body>
</html>