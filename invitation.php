<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Invitation</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        h1 {
            text-align: center;
            margin-top: 15px;
            color: #019477;
            font-size:35px;
        }
        h3 {
            text-align:center;
            margin-bottom: 18px;
            color: #949292;
        }
        p {
            text-align:center;
            font-size:25px;
        }
        .allform {
            position: absolute;
            border: 1px solid #d3d3d3;
            margin-top: 5%;
            background-color: #fff;
            margin-left: 20%;
            width: 65%;
        }
        .form-container {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color:;
        }
        .form-container label{
            margin-left: 30px; 
            font-weight: bold;
            font-size: 17px;
        }
        .form-group,.form-container {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-left: 30px;
            font-weight: bold;
            font-size: 17px;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="time"],
        select {
            width: 95%;
            margin-left: 30px;
            padding: 15px;
            border: 1px solid #019477;
            border-radius: 3px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }
        .form-group button {
       display: block;
       margin: 10px auto 5px;
       padding: 10px 20px;
       background-color: #019477;
       color: white;
       border: none;
       border-radius: 5px;
       font-size: 16px;
       cursor: pointer;
     }
     
.submit-btn {
    display: block;
    width: 50%;
    margin-bottom:10px;
    padding: 20px;
    background-color: #019774;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 25%;
}
#submit-btn{
    display: none;
}
    </style>
</head>
<body>
<div class="container">
    <a href="./p6.php">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
        </svg>
    </a>
<div class="allform">
    <form action="inv.php" method="POST" class="mainForm" id="mainForm" >
        <h1>Invitation</h1>
        <h3>Veuillez  entrer les données:</h3>
        <div class="form-group">
            <label for="nom_monsieur">Monsieur:</label>
            <input type="text" id="nom_monsieur" name="nom_monsieur" placeholder="Entrez le nom :" required>
        </div>
        <div class="form-group">
            <label for="description">Sa description:</label>
            <input type="text" id="description" name="description" placeholder="Entrez sa description" required>
        </div>
        <div class="form-group">
            <label for="nom_condidat">Nom et prénom du candidat:</label>
            <input type="text" id="nom_candidat" name="nom_candidat" placeholder="Entrez le nom et lr prenom du candidat " required>
        </div>
        <div class="form-group">
            <label for="date_discussion">La date de la discussion:</label>
            <input type="date" id="date_discussion" name="date_discussion" placeholder="jj/mm/aaaa" required>
        </div>
        <div class="form-group">
            <label for="lieu_discussion">lieu de la discussion:</label>
            <input type="text" id="date_discussion" name="lieu_discussion" placeholder="lieu de la disscussion" required>
        </div>
        <div class="form-group">
            <label for="time_discussion">L'heure de la discussion on letters:</label>
            <input type="text" id="time_discussion" name="time_discussion" placeholder="l'heure de la disscussion" required>
        </div>
        <div class="form-group">
            <label for="specialite">Spécialité :</label>
            <input type="text" id="specialite" name="specialite" placeholder="Spécialité" required>
        </div>
        <div class="form-group">
            <label for="titre_msg">Titre du message:</label>
            <input type="text" id="titre_msg" name="titre_msg" placeholder="Titre du message" required>
        </div>

    <p>:(Comité de discussion)لجنــــــــة المنـــــــــاقشة</p>
    <div class="form-group">
        <label for="number">Nombre de la comité :</label>
        <input type="text" id="number" name="number" placeholder="Entrez le nombre">
        
        <button id="numberbtn">Générer le formulaire</button>
    </div>
    
      <div id="formContainer"></div>
    <input type="submit" id="submit-btn" class="submit-btn" value="Envoyer tous les formulaires" required>

</form>
</div>
<script>
    document.getElementById('numberbtn').onclick = function() {
    generateForm();
};

document.getElementById('submit-btn').onclick = function() {
    document.getElementById('mainForm').submit();
};

function generateForm() {
    var number = document.getElementById('number').value;
    var formContainer = document.getElementById('formContainer');
    var mainForm = document.getElementById('mainForm');

    if (!number || isNaN(number)) {
        alert("Veuillez entrer un numéro valide.");
        return;
    }

    // Masquer l'entrée de numéro et le bouton lorsque le formulaire est généré
    document.getElementById('number').style.display = 'none';
    document.getElementById('numberbtn').style.display = 'none';

    for (var i = 0; i < parseInt(number); i++) {
        var formHTML = `

            <div class="form-container">
                <h3>Formulaire ${i}</h3>
                <label for="nameInput${i}">Nom :</label>
                <input type="text" id="name${i}" name="name${i}" required>

                <label for="degree${i}">Degré :</label>
                <select id="degree${i}" name="degree${i}" required>
                <option value="">Sélectionner le degrer </option>
                <option value="أستاذة">أستاذة</option>
                <option value="أستاذة محاضرة ب">أستاذة محاضرة ب</option>
                <option value="أستاذ">أستاذ</option>
                <option value="أستاذ محاضر أ">أستاذ محاضر أ</option>
                <option value="أستاذ محاضرة ب">أستاذ محاضرة ب</option>
               </select>


                <label for="adjective${i}">Adjectif :</label>
               <select id="adjective${i}" name="adjective${i}" required>
              <option value="">Sélectionner </option>
              <option value="رئيسا">رئيسا</option>
              <option value="مقررا">مقررا</option>
              <option value="مقررا مساﻋدا">مقررا مساﻋدا</option>
              <option value="ﻋضوا">ﻋضوا</option>
              <option value="مدعو">مدعو</option>
             </select>


                <label for="foundation${i}">Fondation d'appartenance :</label>
                <input type="text" id="foundation${i}" name="foundation${i}" required>
            </div>
          
        `;
        // Ajouter le formulaire à formContainer
        formContainer.insertAdjacentHTML('beforeend', formHTML);
    } 

    // Afficher le bouton de soumission du formulaire principal
    document.getElementById('submit-btn').style.display = 'block';
}
</script>  
</body>
</html>
