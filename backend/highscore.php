<?php
$servername = "localhost"; 
$password = ""; 
$database = "igraci";


$conn = new mysqli($servername, "root", $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $highscore = filter_var($_POST['highscore'], FILTER_VALIDATE_INT);

    if ($username !== false && $highscore !== false) {
        $sql = "INSERT INTO igrac (player_name, highscore) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("si", $username, $highscore);
        $result = $stmt->execute();
        if ($result) {
            echo "New player added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid data received.";
    }
} if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET["username"])){
        $username = $_GET["username"];
        
        $sql = "SELECT * FROM igrac WHERE username='" . $username . "'";
    } else{
        $sql = "SELECT * from igrac";
    }
    $result = $conn->query($sql);
}
else {
    echo "Invalid request method.";
}



if ($result->num_rows > 0) {
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo json_encode(["error" => "No scores found"]);
}

$conn->close();
?>