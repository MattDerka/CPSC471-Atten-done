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
       Who are you?
   </h2>
   <div class="container selection-page-container bg-dark">
       <input type="button" class="btn btn-danger select-btn" onclick="location.href='studentReg.php';" value="Student" />
       <input type="button" class="btn btn-success select-btn" onclick="location.href='teacherReg.php';" value="Teacher" />
       <input type="button" class="btn btn-info select-btn" onclick="location.href='parentReg.php';" value="Parent" />
       <input type="button" class="btn btn-warning select-btn" onclick="location.href='schoolReg.php';" value="School" />
   </div>
</div>
  </body>
</html>
