<?php  
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'notesDB');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>