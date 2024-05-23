<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM create_db WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $room = $result->fetch_assoc();
    } else {
        echo "No Records has found from the given id";
        exit();
    }
} else {
    echo "No Id has provided.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $survey_details = $_POST['survey_details'];
    $title = $_POST['title'];
    $questions = $_POST['questions'];
  
    $sql = "UPDATE create_db SET name='$name', email='$email', survey_details='$survey_details', title='$title', questions='$questions' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Survey updated successfully";
        header('Location: display.php');
    } else {
        echo "Error updating Survey: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Survey</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
      <header>
        <h1>Edit Survey</h1>
    </header>      </div>
    </nav> <div class="project"> <div class="pro">
    <a href="https://cartrabbit.io/" id="home">Home</a>
            <a href="https://cartrabbit.io/" id="home">Help</a>
            <a href="display.php" id="home">Back</a></body></div></div>
    <style>

</style>
<link rel="stylesheet" href="edit.css">

 
<div class="container">
<main>
        <section id="room-form">
<form action="edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <label> Survey_details </label>
                <input type="text"  placeholder="Survey_Details" name="survey_details" required>
                <label> Title </label>
                <input type="text" name="title" placeholder="Title" class="form-control">
                <label> Questions </label>
                <input type="text" name="questions"  placeholder="Questions" required>
                <label> Responsive count </label>
                <input type="number" name="id"  placeholder="Count" required>
               
                <div class="button-container">
                    <button type="submit" name="submit" class="save-button">Save</button>
                    <button type="submit" name="cancel" href="display.php" class="cancel-button">Cancel</button>
                </div>
                
</form>
</section>
    </main></div>
</body>
</html>
