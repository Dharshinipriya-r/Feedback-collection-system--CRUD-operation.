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

$sql = "SELECT id,name,email,survey_details,title,questions FROM create_db";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Display Survey</title>
<link rel="stylesheet" href="display.css">
</head>
<body>


<div class="bordered">
    <div class="project">
        <h1>Display-Survey</h1>
        <div class="pro">
            <a href="https://cartrabbit.io/" id="home">Home</a>
            <a href="create.php" id="Help">Create new Survey</a>
            </div>
            </div>
<table>
    <tr>
        <th>Survey_details</th>
        <th>Title</th>
        <th>Question</th>
        <th>Responsive count</th>
        
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           
            echo "<tr>
            
            <td style='color: black;'>{$row['survey_details']}</td>
            <td style='color: black;'>{$row['title']}</td>
            <td style='color: black;'>{$row['questions']}</td>
            <td style='color: black;'>{$row['id']}</td>
            <td><a href='edit.php?id={$row['id']}' ' style='color: white; background-color: green; padding: 5px 10px; text-decoration: none; border-radius: 4px;'>Edit</a></td>
            <td><a href='delete.php?id={$row['id']}' ' style='color: white; background-color: blue; padding: 5px 10px; text-decoration: none; border-radius: 4px;'>Delete</></td>
          </tr>";
        }
      
    } else {
        echo "<tr><td colspan='9'>No records found.</td></tr>";
    }
    $conn->close();
    ?>
</table>

<div class="popup" id="popup">
    <span class="close" onclick="closePopup()">&times;</span>
    <img id="popup-img" src="">
</div>
<script src="display.js"></script>
</body>
</html>
