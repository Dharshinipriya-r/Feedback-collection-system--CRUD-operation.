<?php
    $conn= new mysqli("localhost","root","","crud");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $survey_details = $_POST['survey_details'];
        $title = $_POST['title'];
        $questions = $_POST['questions'];
       
        $q = "INSERT INTO create_db (name, email, survey_details, title, questions) 
        VALUES ('$name', '$email', '$survey_details', '$title', '$questions')";
        $query = mysqli_query($conn,$q);
    }
?>
<!DOCTYPE html>
<html>
<head>
 <title> Create-feedback form</title>
 <link rel="stylesheet" href="create.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
      <header>
       <center> <h1>Feedback form</h1></center>
    </header>      </div>
    </nav> <div class="project"> <div class="pro">
    <a href="https://cartrabbit.io/" id="home">Home</a>
            <a href="display.php" id="home">Display</a></div></div>
    <style>
</style>

<div class="container" > 
    <main>
        <section id="room-form">
           
            <form  method="post" id="room-form" enctype="multipart/form-data">
                <label> Name </label>
                <input type="text" placeholder="Name" name="name" required>
                <label> Email </label>
                <input type="text" name="email" placeholder="Email" class="form-control" required>
                <label> Survey_details</label>
                <input type="text" name="survey_details"  placeholder="Details about the survey" required>
                <label> Title </label>
                <input type="text" name="title"  placeholder="title" required>
                <label> Questions</label>
                <input type="text" name="questions"  placeholder="Questions you want to ask" required>
                
                <div class="button-container">
                    <button type="submit" name="submit" class="save-button">Save</button>
                    <button type="submit" name="cancel" href="display.php" class="cancel-button">Cancel</button>
                </div>
            </form>
        </section>
    </main>

    </div>
 
 </form>
 </div>
</body>
</html>