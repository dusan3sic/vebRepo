<?php
$servername = "localhost"; // Hostname MySQL servera (obično localhost)
$username = "root"; // Korisničko ime MySQL baze podataka
$password = ""; // Lozinka MySQL baze podataka
$database = "igraci"; // Naziv MySQL baze podataka

// Povezivanje na MySQL bazu podataka
$conn = new mysqli($servername, $username, $password, $database);

// Provera uspešnosti povezivanja
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br><br>";
?>
