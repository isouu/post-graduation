<?php
 
include("code.php");

function genererFormulaires($nombre) {
    // Vérifier si le nombre est valide
    if ($nombre > 0) {
      $conteneurFormulaires  = '<form action="" method="post">';
        $conteneurFormulaires .= '<div class="row">';


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
        $conteneurFormulaires .=' <input type="submit" name="valider" id="valider" value="enregistrer">';
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

    <div class="bord">
        <h1>bordereau d\'envoi</h1>  
        <h3>Veuillez entrer les données :</h3>
       
            <div class="form-group">
                <label for="type_bordereau'.$index.'">Type de bordereau :</label>
                <select id="type_bordereau'.$index.'" name="type_bordereau'.$index.'" required>
                    <option value="">Sélectionnez un type de bordereau</option>
                    <option value="type1">Type 1</option>
                    <option value="type2">Type 2</option>
                    <option value="type3">Type 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="documents'.$index.'">Documents :</label><br>
                <input type="checkbox" id="document1'.$index.'" name="documents'.$index.'[]" value="document1">document1
                <input type="checkbox" id="document2'.$index.'" name="documents'.$index.'[]" value="document2">document2
                <input type="checkbox" id="document3'.$index.'" name="documents'.$index.'[]" value="document3">document3
            </div>
            <div class="form-group">
                <label for="numero'.$index.'">Numéro :</label>
                <input type="text" id="numero'.$index.'" name="numero'.$index.'" required placeholder="numero">
            </div>
            <div class="form-group">
                <label for="remarque'.$index.'">Remarque :</label>
                <textarea id="remarque'.$index.'" name="remarque'.$index.'" placeholder="remarque"></textarea>
            </div>
            <div class="form-group">
                <label for="date_arrivee'.$index.'">Date d\'arrivée :</label>
                <input type="Date" id="date_arrivee'.$index.'" name="date_arrivee'.$index.'" placeholder="jj/mm/aaaa" required>
            </div>
           
     
    </div>
    ';

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

  .form-group textarea,
  select {
    width: 90%;
    padding: 15px;
    border: 1px solid #a09e9e;
    border-radius: 3px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
  }
  input[type="number"] {
    width: 55%;
    margin-left:20%;
    padding: 20px;
    border: 1px solid #a09e9e;
    border-radius: 3px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
  }
  input[type="submit"] {
    background-color: #019477;
    margin-left:40%;
    width:20%;
    color: white;
    padding:20px 40px;
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
  
  .bord {
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
