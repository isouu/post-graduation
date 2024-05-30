<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "invitation";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Fetch the number of soutenances
$sql_count = "SELECT COUNT(*) as count FROM candidats";
$result = $conn->query($sql_count);
$row = $result->fetch_assoc();
$soutenances_count = $row['count'];

// Close the database connection
$conn->close();

// Return the count as a JSON response
echo json_encode(['count' => $soutenances_count]);
?>
