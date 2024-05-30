<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "invitation";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier que les clés 'id' et 'candidat_id' existent
    if (isset($_POST['id']) && isset($_POST['candidat_id'])) {
        $id = $_POST['id'];
        $candidat_id = $_POST['candidat_id'];

        // Construire la requête SQL DELETE pour la table comites
        $sql_comite = "DELETE FROM comites WHERE candidat_id = ?";

        // Préparer la requête pour éviter l'injection SQL
        $stmt_comite = $conn->prepare($sql_comite);

        // Lier les paramètres
        $stmt_comite->bind_param("i", $candidat_id);

        // Exécuter la requête
        if ($stmt_comite->execute() === TRUE) {
            // Suppression réussie, maintenant supprimer le candidat
            $sql_candidat = "DELETE FROM candidats WHERE id = ?";

            $stmt_candidat = $conn->prepare($sql_candidat);
            $stmt_candidat->bind_param("i", $id);

            if ($stmt_candidat->execute() === TRUE) {
                echo json_encode(array("message" => "Record deleted successfully"));
            } else {
                echo json_encode(array("error" => "Error deleting candidate record: " . $conn->error));
            }

            $stmt_candidat->close();
        } else {
            echo json_encode(array("error" => "Error deleting committee record: " . $conn->error));
        }

        $stmt_comite->close();
    } else {
        echo json_encode(array("error" => "ID or candidat_id parameter is missing"));
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
