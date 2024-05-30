<?php


// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "certificat";

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

if(isset($_POST["genere"])) {
    $nombre = $_POST["nombre"];
    $_SESSION['certificat']['nombre'] = $nombre;
}

if(isset($_POST["valider"])) {
    $nbr = $_SESSION['certificat']['nombre'];
    for($i = 1; $i <= $nbr; $i++) {
        // Récupérer les données du formulaire
        $username_chef = mysqli_real_escape_string($connexion, $_POST["username_chef$i"]);
        $username_etud = mysqli_real_escape_string($connexion, $_POST["username_etud$i"]);
        $date_nee = mysqli_real_escape_string($connexion, $_POST["date_nee$i"]);
        $option = mysqli_real_escape_string($connexion, $_POST["option$i"]);
        $lieu = mysqli_real_escape_string($connexion, $_POST["lieu$i"]);
        $lannee_universitaire = mysqli_real_escape_string($connexion, $_POST["lannee_universitaire$i"]);
        

        // Requête SQL pour insérer les données
        $sql = "INSERT INTO certi (username_chef, username_etud, date_nee, lieu, option, lannee_universitaire) 
                VALUES ('$username_chef', '$username_etud', '$date_nee', '$lieu', '$option', '$lannee_universitaire')";

        if (mysqli_query($connexion, $sql)) {
            // Stocker les valeurs dans la session
          //  $_SESSION['certificat']["username_chef$i"] = $username_chef;
          //  $_SESSION['certificat']["username_etud$i"] = $username_etud;
          //  $_SESSION['certificat']["date_nee$i"] = $date_nee;
          //  $_SESSION['certificat']["lieu$i"] = $lieu;
          //  $_SESSION['certificat']["option$i"] = $option;
         //   $_SESSION['certificat']["lannee_universitaire$i"] = $lannee_universitaire;

            $_SESSION['status'] = "Enregistrement réussi !";
            $inserted_id = mysqli_insert_id($connexion);
            $ids[] =  $inserted_id;
        } else {
            $_SESSION['status'] = "Erreur lors de l'enregistrement : " . mysqli_error($connexion);
        }
    }

    // Redirection vers certificat.php après avoir traité la soumission du formulaire
  
     $idParams = http_build_query(['id' => $ids]);
     $redirectURL = "certificat.php?" . $idParams;
        header("Location:$redirectURL");
  
    exit(); // Terminer le script après la redirection
}

// Fermer la connexion à la base de données
mysqli_close($connexion);

?>
