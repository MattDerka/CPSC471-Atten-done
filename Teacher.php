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
         <a class="nav-link" href="#" onClick={handler1}>Login</a>
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

     <Modal open={this.state.open} onClose={this.onCloseModal} little>
       <h3>Adding Student</h3>
       <label>Student ID:</label>
       <input></input>
       <button class="btn btn-success" onClick={this.onCloseModal}>Add</button>
     </Modal>
        <div class="container-fluid teacher-container">
            <div class="teacher-left bg-dark">
                <div class="teacher-top-panel">
                    <h4>Attendance Record: </h4><div class="teacher-addBtn" onClick={this.onOpenModal}><FontAwesome name="plus-circle" size='2x' style={{ color: '#6de8a8'}}/></div></div>

                <div class="teacher-text-field">
                    <ul class="teacher-students-list">{students}</ul>
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
