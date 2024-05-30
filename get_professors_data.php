<?php
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulaire_professeurs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialisation des compteurs
$annabaCount = 0;
$outsideAnnabaCount = 0;

// Requête pour compter les professeurs travaillant à Annaba
$query_annaba = "SELECT COUNT(*) AS annabaCount FROM professeurs WHERE  distance_to_annaba < 300";
$result_annaba = $conn->query($query_annaba);
if ($result_annaba->num_rows > 0) {
    $row_annaba = $result_annaba->fetch_assoc();
    $annabaCount = $row_annaba["annabaCount"];
}

// Requête pour compter les professeurs travaillant à l'extérieur d'Annaba
$query_outside = "SELECT COUNT(*) AS outsideAnnabaCount FROM professeurs WHERE  distance_to_annaba >= 300";
$result_outside = $conn->query($query_outside);
if ($result_outside->num_rows > 0) {
    $row_outside = $result_outside->fetch_assoc();
    $outsideAnnabaCount = $row_outside["outsideAnnabaCount"];
}

// Fermeture de la connexion à la base de données
$conn->close();

// Retour des données au format JSON
echo json_encode(array(
    'annabaCount' => $annabaCount,
    'outsideAnnabaCount' => $outsideAnnabaCount
));
?>
