<?php
$servername = "localhost"; 
$password = ""; 
$database = "igraci";


$conn = new mysqli($servername, "root", $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = "";

if (isset($_GET["username"])){
    $username = $_GET["username"];
    
    $sql = "SELECT * FROM igrac WHERE username='" . $username . "'";
} else{
    $sql = "SELECT * from igrac";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = array(); // Initialize an array to store all rows
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row; // Append each row to the array
    }
    echo json_encode($rows); // Encode the array as JSON and echo it
} else {
    echo json_encode(["error" => "No scores found"]);
}

$conn->close();
?>