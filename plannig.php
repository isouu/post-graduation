<?php 

session_start();
include('emploi.php');
include("Datebase.php");
	include("func.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning</title>
    <link rel="stylesheet" href="./emploi.css">
    <link rel="stylesheet" href="./menu.css">
    <link rel="stylesheet" href="./notification.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</head>
<body>
    
<div class="container">
<?php  include('navigation.php');?>


        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                       
                    </label>
                </div>
                <svg id="svg-click" xmlns="http://www.w3.org/2000/svg"  height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#019477" d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
                <div class="container-notification">
                <div id="notifications">
                    <!-- Les notifications seront ajoutées ici dynamiquement -->
                 <?php    include('notification_script.php'); ?>
                </div>
              </div>
           


                <div class="user">
                <img src="<?php echo isset($_SESSION["profile_picture"]) ? 'data:image/jpeg;base64,' . $_SESSION["profile_picture"] : './assets/imgs/user.png'; ?>"  alt="Photo de profil" id="profile-pic">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="btn11">
            <button class="btn1" onclick="afficherEmploiGlobal()">Afficher les emplois du temps global</button>
    <button class="btn1" onclick="afficherEmploiIndividuel()">Afficher l'emploi du temps individuels</button>
    </div>
    <div id="emploi-du-temps-global" class="emploi-du-temps">
        <h2 class='h2'>Emploi du temps global</h2>
        <table class="1">
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Nom D'enseignants</th>
                <th>jour</th>
                <th>Salle</th>
              
            </tr>
            <?php
            // Affichage de l'emploi du temps global
            foreach ($emploisDuTempsGlobal as $groupe => $emploi) {
                foreach ($emploi as $jour => $seances) {
               
                    foreach ($seances as $seance) {
                        echo "<tr>";
                        echo "<td>{$seance['date']}</td>";
                        echo "<td>{$seance['heure']}</td>";
                        echo "<td>{$groupe}</td>";
                        echo "<td>{$jour}</td>";
                        echo "<td>{$seance['seances']}</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </div>

    <?php
    // Affichage de l'emploi du temps individuel
    foreach ($emploisDuTempsGlobal as $groupe => $emploi) {
        echo "<div class='emploi-du-temps'>";
        echo "<h2 class='h2'>Emploi du temps pour le groupe $groupe</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Jour</th><th>Séances</th><th>Heure</th></tr>";
        foreach ($emploi as $jour => $seances) {
            foreach ($seances as $seance) {
                echo "<tr><td>$jour $date</td><td>{$seance['seances']}</td><td>{$seance['heure']}</td></tr>";
            }
        }
        echo "</table>";
        echo "</div>";
    }
    ?>
               <h2>Remplir le Formulaire:</h2>

    <form class="form" method="post">
    <div>
           <br>
           <br>
           
           <div class="form-group">
            <label for="groupe">Matricule:</label>
            <input type="text" id="groupe" name="Matricule" required placeholder="Nom du groupe">
        </div>
        <div class="form-group">
            <label for="groupe">Nom de enseignats :</label>
            <input type="text" id="groupe" name="groupe" required placeholder="Nom du groupe">
        </div>
        <div class="form-group">
        <label for="jour">Jour :</label>
        <select name="jour" id="jour">
            <option value="Dimanche">Dimanche</option>
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <!-- Ajoutez les autres jours ici -->
        </select>
        </div>
        <br>
        <div class="form-group">
            <label for="heure">Heure :</label>
            <input type="text" id="heure" name="heure" required placeholder="Heure">
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required placeholder="date">
        </div> 
         <br>
         <div class="form-group">
        <label for="seances">Salle :</label>
        <input type="text" name="seances" id="seances" class="seances" ><br>
        </div>
        <input type="submit" name="ajouter_seances" class="btnA" value="Ajouter séances">

     
    </form>
    </div> 
    <script>
     
    </script>
   <?php include('profil_menu.php'); ?>
   <script src="assets/js/main.js"></script>
    <script src="profile_menu_script.js"></script>
    <script src="count.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="statcirl.js"></script>
  
   </html>