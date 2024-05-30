<?php

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "reservation_salle";

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}


if(isset($_POST["genere"])) {
    $nombre = $_POST["nombre"];
    $_SESSION['reserve']['nombre'] = $nombre;
}
$ids = [];
if(isset($_POST["valider"])) {
    $i = 1;
        // Récupérer les données du formulaire
        $specialite = $_POST["specialite$i"];
        $username = $_POST["username$i"];
        $date_arrivee = $_POST["date_arrivee$i"];
        $heure = $_POST["heure$i"];
        $date_demande = $_POST["date_demmande$i"];

        // Requête SQL pour insérer les données
        $sql = "INSERT INTO salle (specialite, username, date_arrivee, heure, date_demmande) 
                VALUES ('$specialite', '$username', '$date_arrivee', '$heure', '$date_demande')";

        if (mysqli_query($connexion, $sql)) {
            // Stocker les valeurs dans la session
          //  $_SESSION['reserve']["specialite$i"] = $specialite;
          //  $_SESSION['reserve']["username$i"] = $username;
           // $_SESSION['reserve']["date_arrivee$i"] = $date_arrivee;
           // $_SESSION['reserve']["heure$i"] = $heure;
           // $_SESSION['reserve']["date_demande$i"] = $date_demande;

           $_SESSION['status'] = "Enregistrement réussi !";
           
             $inserted_id = mysqli_insert_id($connexion);
             $ids[] =  $inserted_id;
           
        } else {
            $_SESSION['status'] = "Erreur lors de l'enregistrement : " . mysqli_error($connexion);
        }
  
    
    // Fermer la connexion à la base de données
    mysqli_close($connexion);

    // Redirection vers reservee.php après avoir traité la soumission du formulaire
    $idParams = http_build_query(['id' => $ids]);
    $redirectURL = "reservee.php?" . $idParams;
       header("Location:$redirectURL");
    exit(); // Terminer le script après la redirection
}
?>
