<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emploi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}



// Traitement de l'ajout de séances à la base de données
if (isset($_POST['ajouter_seances'])) {
    
    $Matricule = $_POST['Matricule'];
    $groupe = $_POST['groupe'];
    $jour = $_POST['jour'];
    $seances = $_POST['seances'];
    $heure = $_POST['heure'];
    $date = $_POST['date'];

    // Vérifier si les variables sont définies et non vides
    if (empty($Matricule) || empty($groupe) || empty($jour) || empty($seances) || empty($heure) || empty($date)) {
        echo '<p style="color: red;">Tous les champs sont obligatoires.</p>';
    } else {
        // Vérifier si une entrée avec la même date, heure et salle existe déjà
        $sql_check = "SELECT * FROM emploi_du_temps WHERE date = '$date' AND heure = '$heure' AND seances = '$seances'";
        $result_check = $conn->query($sql_check);

        if ($result_check === false) {
            echo "Erreur dans la requête SQL : " . $conn->error;
        } else {
            if ($result_check->num_rows > 0) {
                echo '<p  class="messege"style="color: red;">La salle a été réservée déjà dans cette date et heure.</p>';
            } else {
                // Si aucune entrée correspondante n'est trouvée, ajouter la nouvelle séance
                $sql = "INSERT INTO emploi_du_temps (Matricule, date, heure, groupe, jour, seances) VALUES ('$Matricule', '$date', '$heure', '$groupe', '$jour', '$seances')";

                if ($conn->query($sql) === TRUE) {
                    echo "Les données ont été enregistrées.";
                } else {
                    echo "Erreur lors de l'ajout des séances : " . $conn->error;
                }
            }
        }
    }
}

// Récupération des séances pour l'emploi du temps global
$sql_global = "SELECT Matricule, groupe, jour, seances, heure, date FROM emploi_du_temps";
$result_global = $conn->query($sql_global);
$emploisDuTempsGlobal = array();

if ($result_global === false) {
    echo "Erreur dans la requête SQL globale : " . $conn->error;
} else {
    while ($row = $result_global->fetch_assoc()) {
        $Matricule = $row['Matricule'];
        $groupe = $row['groupe'];
        $jour = $row['jour'];
        $seances = $row['seances'];
        $heure = $row['heure'];
        $date = $row['date'];
        $emploisDuTempsGlobal[$groupe][$jour][] = array('date' => $date, 'heure' => $heure, 'seances' => $seances, 'Matricule' => $Matricule);
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du temps des séances</title>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <style>
        .emploi-du-temps {
            display: none;
        }
        .btn {
            background-color: #019477;
            color: white;
            padding: 70px 130px;
            border: none;
            border-radius: 4px;
            margin-top: 70px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            font-size: 14px;
            font-weight:bold;
        }
        .form {
            width: 60%;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
            margin-left: 20%;
            margin-top: 6%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn1 {
            background-color: #019477;
            color: white;
            padding: 20px 30px;
            border: none;
            border-radius: 4px;
            margin-top: 8%;
            margin-left: 15%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            font-size: 14px;
            font-weight:bold;
        }
        .btn11
        {
            margin-left:30%;
        }
        h2 {
            margin-top: 6%;
        }
        table {
            width: 25%;
            margin-top: 30px;
        }
        th,
        td {
            border: 1px solid hsl(0, 0%, 68%);
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: hsl(0, 0%, 100%);
        }
       
        .messege
        {
          top:20px;
        }
    </style>
</head>
<body>
</body>
</html>
