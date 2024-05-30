<?php

include("code1.php");

function genererFormulaires($nombre) {
  
    if ($nombre > 0) {
        $conteneurFormulaires  = '<form action="" method="post">'; // Spécifiez la page de traitement ici
        $conteneurFormulaires .= '<div class="row">';
        $conteneurFormulaires .= '';


        // Créer un formulaire d'inscription pour chaque nombre
        for ($i = 1; $i <= $nombre; $i++) {
            // Générer le contenu du formulaire avec la valeur de $i
            $contenuFormulaire = creerFormulaire($i);
            
            // Ajouter le contenu du formulaire au conteneur
            $conteneurFormulaires .= $contenuFormulaire;

            // Fermer la rangée et ouvrir une nouvelle après chaque deux formulaires
            if ($i % 2 == 0) {
                $conteneurFormulaires .= '</div><div class="row">';
            }
        }

        // Fermer la dernière rangée
        $conteneurFormulaires .= '</div>';
        $conteneurFormulaires .= ' <input type="submit" name="valider" id="valider" value="Enregistrer">';
        $conteneurFormulaires .= '</form>';
        return $conteneurFormulaires;
    } else {
        // Si le nombre n'est pas valide, afficher un message d'erreur
        return "Veuillez entrer un nombre valide supérieur à zéro.";
    }
}

function creerFormulaire($index) {
    // Créer le contenu du formulaire avec la valeur de $index
    $contenuFormulaire = '
    <div class="fich">
        <h1>Fiche Technique</h1>  
        <h3>Veuillez entrer les données :</h3>
       
            <div class="form-group">
                <label>Nom et Prénom :</label>
                <input type="text" name="nom'.$index.'" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <label for="degree">Degré :</label>
                <input type="text" id="degrer'.$index.'" name="degrer'.$index.'" placeholder="Degré" required>
            </div>
            <div class="form-group">
                <label for="university">Université d\'Origine :</label>
                <input type="text" id="UnivOrg'.$index.'" name="UnivOrg'.$index.'" placeholder="Université d\'Origine" required>
            </div>
            <div class="form-group">
                <label for="account_number">Numéro de Compte Courant :</label>
                <input type="text" id="account_number'.$index.'" name="NumCompt'.$index.'" placeholder="Numéro de Compte Courant" required>
            </div>
            <div class="form-group">
                <label for="candidate_name">Nom du Candidat :</label>
                <input type="text" id="candidate_name" name="Nomcondid'.$index.'" placeholder="Nom du Candidat '.$index.'" required>
            </div>
            <div class="form-group">
                <label for="letter_address">Adresse de la Lettre :</label>
                <input type="text" id="letter_address" name="AdrsLetter'.$index.'" placeholder="Adresse de la Lettre'.$index.'" required>
            </div>
            <div class="form-group">
                <label for="discussion_date">Date des Discussions :</label>
                <input type="date" id="discussion_date'.$index.'" name="DateDissc'.$index.'" placeholder="Date des Discussions" required>
            </div>
            <div class="form-group">
                <label for="total_hours">Total d\'Heures :</label>
                <input type="number" id="total_hours'.$index.'" name="totalheure'.$index.'" placeholder="Total d\'Heures " required>
            </div>
      
           
       
    </div>';
    
    return $contenuFormulaire;
}


// Traitement du formulaire soumis
if (isset($_POST["genere"])) {
    $nombre = $_POST["nombre"];
    echo genererFormulaires($nombre);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulaire d'inscription dynamique</title>
<style>
  h1 {
    text-align: center;
    color: #019477;
    font-size: 35px;
    margin-top: 15px;
  }
  
  h3 {
    margin-bottom: 10px;
    color: #949292;
    text-align: center;
    font-size: 25px;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  label {
    text-align: center;
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 17px;
  }
  
  input[type="text"],
  input[type="date"],
  input[type="time"],
  input[type="number"],
  .form-group textarea,
  select {
    width: 90%;
    padding: 15px;
    border: 1px solid #a09e9e;
    border-radius: 3px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
  }
  input[type="number"]
  {
    width: 55%;
    margin-left:20%;
    padding: 20px;
    border: 1px solid #a09e9e;
    border-radius: 3px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
  }
  input[type="submit"] {
    background-color: #019477;
    color: white;
    padding: 15px 35px;
    border: none;
    border-radius: 4px;
    margin-top: 20px;
    cursor: pointer;
    font-size: 17px;
  }
  
  input[type="submit"]:hover {
    background-color: #11c5a7;
  }
  
  .row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
  }
  
  .fich {
    border: 1px solid #ccc;
    padding: 20px;
    width: 45%;
  }
  #genere {
    background-color: #019477; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 8px;
}
form{
  margin-top:2%;
}
</style>
</head>
<body>
<div class="container">
<a href='./document.php'>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
        </svg>
    </a>
 <form action="" method="post">
  
<h1>Générateur de formulaires d'inscription</h1>

<label for="nombre">Entrez le nombre de formulaires d'inscription :</label>
<input name="nombre" type="number" id="nombre" min="1" required>
<button type="submit" name="genere" id="genere">Générer les formulaires</button>

<div id="conteneurFormulaires">
  <!-- Les formulaires seront ajoutés ici -->
</div>
</form>
</body>
</html>

