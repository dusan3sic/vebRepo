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
    $sql = "INSERT INTO igrac (username, password, highscore) VALUES ('$username', '$password', 0)";

    if ($conn->query($sql) === TRUE) {
        echo "Registracija uspesna";
    }
}else {
    echo "Korisnicko ime ili lozinka vec postoji";
}

$conn->close();
?>