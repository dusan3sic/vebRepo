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

$query = "SELECT * FROM igrac WHERE username = '$username' OR password = '$password'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "Login uspesan";
    header("Location: frontend/zmijica.php");
    exit(); 
}else {
    echo "Pogresno korisnicko ime ili sifra";
}

$conn->close();
?>