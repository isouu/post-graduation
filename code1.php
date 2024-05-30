<?php
// Démarrer la session

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "fichethec";

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
} 


// Traitement du formulaire "genere"
if (isset($_POST["genere"])) {
    $nombre = $_POST["nombre"];
    $_SESSION['fichethec']['nombre'] = $nombre;
}
$ids = [];
// Traitement du formulaire "valider"
if (isset($_POST["valider"])) {
    $nbr = isset($_SESSION['fichethec']['nombre']) ? $_SESSION['fichethec']['nombre'] : 1;

    for ($i = 1; $i <= $nbr; $i++) {
        // Récupérer les données du formulaire
        $nom = $_POST["nom$i"];
        $degrer = $_POST["degrer$i"];
        $UnivOrg = $_POST["UnivOrg$i"];
        $NumCompt = $_POST["NumCompt$i"];
        $Nomcondid = $_POST["Nomcondid$i"];
        $AdrsLetter = $_POST["AdrsLetter$i"];
        $DateDissc = $_POST["DateDissc$i"];
        $totalheure = $_POST["totalheure$i"];

        // Requête SQL pour insérer les données
        $sql = "INSERT INTO thec (nom,degrer ,UnivOrg, NumCompt, Nomcondid, AdrsLetter, DateDissc, totalheure) 
                VALUES ('$nom', '$degrer', '$UnivOrg', '$NumCompt', '$Nomcondid', '$AdrsLetter', '$DateDissc', '$totalheure')";

        if (mysqli_query($connexion, $sql)) {
            // Stocker les valeurs dans la session
           // $_SESSION['fichethec']["nom$i"] = $nom;
          //  $_SESSION['fichethec']["degrer$i"] = $degrer;
          //  $_SESSION['fichethec']["UnivOrg$i"] = $UnivOrg;
          //  $_SESSION['fichethec']["NumCompt$i"] = $NumCompt;
          //  $_SESSION['fichethec']["Nomcondid$i"] = $Nomcondid;
          //  $_SESSION['fichethec']["AdrsLetter$i"] = $AdrsLetter;
         //   $_SESSION['fichethec']["DateDissc$i"] = $DateDissc;
          //  $_SESSION['fichethec']["totalheure$i"] = $totalheure;

            $_SESSION['status'] = "Enregistrement réussi !";
            $inserted_id = mysqli_insert_id($connexion);
            $ids[] =  $inserted_id;
        } else {
            $_SESSION['status'] = "Erreur lors de l'enregistrement : " . mysqli_error($connexion);
        }
    }

    // Redirection vers fichthec.php après avoir traité la soumission du formulaire
    $idParams = http_build_query(['id' => $ids]);
    $redirectURL = "fichethec.php?" . $idParams;
    header("Location:$redirectURL");
    exit();
}


?>