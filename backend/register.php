<?php
$servername = "localhost"; 
$password = ""; 
$database = "igraci";

$conn = new mysqli($servername, "root", $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO igrac (id, username, password, highscore) VALUES (0, '$username', '$password', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Registracija uspesna";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>