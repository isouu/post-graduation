<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./teatcher.css">
    <link rel="stylesheet" href="./menu.css">

    <title>Enseignants</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
 

</head>
<style>.user {
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}

.user img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}</style>

<body>
    
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="logo-apple"></ion-icon>
                    </span>
                    <span class="title">Badji Mokhtar </span>
                </a>
            </li>

            <li>
                <a href="teatcher.php">
                    <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                    </span>
                    <span class="title">Consultation</span>

                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <svg style="color: rgb(255, 255, 255);" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"> <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" fill="#ffffff"></path> </svg>
                    </span>
                    <span class="title">Profil</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                      <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="XMLID_303_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="help"> <path d="M13,18h-2v-2.9c0-1.6,1-3,2.4-3.4C15.6,11,17,9.1,17,7c0-2.7-2.4-5.1-5-5.1c-1.4,0-2.7,0.5-3.6,1.5 C7.5,4.3,6.9,5.6,6.9,6.9h-2C4.9,5,5.6,3.3,7,2s2.9-2,5-2c3.7,0,7,3.3,7,7.1c0,3.1-2,5.8-5,6.7c-0.6,0.2-1,0.8-1,1.5V18z"></path> <path d="M12,20c1.1,0,2,0.9,2,2s-0.9,2-2,2s-2-0.9-2-2S10.9,20,12,20z"></path> </g> </g></svg>
                    </span>
                    <span class="title">Aide</span>
                </a>
            </li>
            <hr class="hr">
            <li>
          
                  <a href="logout.php">
                      <span class="icon">
                        <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" fill="white"></path> <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" fill="white"></path> </svg>
                      </span>
                      <span class="title">se déconnecter</span>
                    
                  </a>
          </li>
        </ul>
    </div>
    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
              <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </div>

            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>
            <div class="user">
                 <img src="<?php echo isset($_SESSION["profile_picture"]) ? 'data:image/jpeg;base64,' . $_SESSION["profile_picture"] : './assets/imgs/user.png'; ?>"  alt="Photo de profil" id="profile-pic">
            </div> 
            
          
  
            <!-- ========================= Main ==================== -->
            
               

    </div>
    <div class="cardBox">
        <div class="card">
                <div class="single-line">
                <p >
                    Tracking the progress of your  <br> information  is
                     easier with our website
                <p>
                    <br>
                    <button>Go Start</button>
                </div>
               
           
           
                <div>
                <img src="./Business_woman_stock_photo__Image_of_black__person__isolated_-_8644490-removebg-preview.png" alt="">
            </div>
               
        </div>
        
        
        
          
       
    </div> 
   
   
         
   
    <?php
// Affichage de l'emploi du temps individuel
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emploi";
$conn = new mysqli($servername, $username, $password, $dbname);
 

$matricule = $_SESSION['Matricule'];
$sql_global = "SELECT Matricule, groupe, jour, seances, heure, date FROM emploi_du_temps WHERE Matricule ='$matricule'";

$result_global = $conn->query($sql_global);
$emploisDuTempsGlobal = array();

while ($row = $result_global->fetch_assoc()) {

    $Matricule = $row['Matricule'];
    $groupe = $row['groupe'];
    $jour = $row['jour'];
    $seances = $row['seances'];
    $heure = $row['heure'];
    $date = $row['date'];
    $emploisDuTempsGlobal[$groupe][$jour][] = array('date' => $date, 'heure' => $heure, 'seances' => $seances, 'Matricule' => $Matricule);
}


       
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

</div>

<h1>Historique des pris en charge</h1>
<table id="professeursTable">
    <tr>
        <th>Nom</th>
        <th>Degré</th>
        <th>Wilaya</th>
        <th>Hébergement</th>
        <th>Restauration</th>
        <th>Invitation</th>
      
    </tr>
    <?php
    // Assuming you have a database connection already established
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulaire_professeurs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $matricule = $_SESSION['Matricule'];
    $sql = "SELECT * FROM professeurs WHERE Matricule ='$matricule' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nom"] . "</td>";
            echo "<td>" . $row["degre"] . "</td>";
            echo "<td>" . $row["wilaya_name"] . "</td>";
            
            echo "<td>";
            // Check the distance and display the appropriate symbol
            if ($row["distance_to_annaba"] >= 300) {
                echo "<span class='green-check'>&#10004;</span>"; 
            } else {
                echo "<span class='non-check'>&#10006;</span>"; 
            }
            echo "</td>";
            echo "<td> <span class='green-check'>&#10004;</span> </td>";
            echo "<td>";
       
            if (!empty($_GET['file'])) {
                $file_base64 = $_GET['file'];
                $file_name = 'invitation.pdf';
            
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $file_name . '"');
                header('Content-Length: ' . strlen(base64_decode($file_base64)));
                echo base64_decode($file_base64);
                exit;
            } else {
                echo "";
            }
            
            if (!empty($row["invitation"])) {
                $file_base64 = urlencode($row["invitation"]);
                echo "<a href='" . $file_base64 . "'>Voir le PDF</a>";
            } else {
                echo "Pas d'invitation";
            } 
          
           
        
    
            
    
            echo "</td>"; 
            
        
           
            
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>0 results</td></tr>";
    }

    $conn->close();
    ?>
</table>




   
         
     
  
     <div class="calendar1">
        <div class="calendar-container">
        <div class="calendar">
          <div class="month-header">
              <span class="prev-month">&#9664;</span>
              <h2>February 2023</h2>
              <span class="next-month">&#9654;</span>
          </div>
          <div class="days-header">
              <span>Sun</span>
              <span>Mon</span>
              <span>Tue</span>
              <span>Wed</span>
              <span>Thu</span>
              <span>Fri</span>
              <span>Sat</span>
          </div>
          <div class="days">
          <script>
         document.querySelector('button').addEventListener('click', function(event) {
            var div = document.querySelector('.myDiv');
            div.style.display = "block"; // Affiche la div
          });
          document.addEventListener('DOMContentLoaded', function() {
            const prevMonthBtn = document.querySelector('.prev-month');
            const nextMonthBtn = document.querySelector('.next-month');
            const monthHeader = document.querySelector('.month-header h2');
          
            let currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();
          
            // Function to update the calendar
            function updateCalendar() {
                const daysContainer = document.querySelector('.days');
                daysContainer.innerHTML = '';
          
                const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
                const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
                const today = new Date().getDate(); // Get the current day of the month
          
                monthHeader.textContent = `${getMonthName(currentMonth)} ${currentYear}`;
          
                for (let i = 0; i < firstDayOfMonth; i++) {
                    const emptyCell = document.createElement('span');
                    daysContainer.appendChild(emptyCell);
                }
          
                // Add days of the month
                for (let i = 1; i <= daysInMonth; i++) {
                    const dayCell = document.createElement('span');
                    dayCell.textContent = i;
          
                    // Add a CSS class to the current day's cell
                    if (i === today && currentMonth === new Date().getMonth() && currentYear === new Date().getFullYear()) {
                        dayCell.classList.add('current-day');
                    }
          
                    daysContainer.appendChild(dayCell);
                }
            }
          
            // Function to get the name of the month
            function getMonthName(monthIndex) {
                const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                return months[monthIndex];
            }
          
            prevMonthBtn.addEventListener('click', function() {
                if (currentMonth === 0) {
                    currentYear--;
                    currentMonth = 11; 
                } else {
                    currentMonth--;
                }
                updateCalendar();
            });
          
            nextMonthBtn.addEventListener('click', function() {
                if (currentMonth === 11) {
                    currentYear++;
                    currentMonth = 0; // January
                } else {
                    currentMonth++;
                }
                updateCalendar();
            });
          
            // Initial display
            updateCalendar();
          });
 </script>   
          </div>
        </div>
        </div>
        </div>
      
</div>

  <script>



   document.addEventListener('DOMContentLoaded', function() {
  var profilePic = document.getElementById('profile-pic');
  var profileMenu = document.getElementById('profile-menu');
  
  profilePic.addEventListener('click', function() {
      if (profileMenu.style.display === 'none' || profileMenu.style.display === '') {
          profileMenu.style.display = 'block';
      } else {
          profileMenu.style.display = 'none';
      }
  });
});

</script>
<div class="menu" id="profile-menu">
      <div class="action">
      <img src="<?php echo isset($_SESSION["profile_picture"]) ? 'data:image/jpeg;base64,' . $_SESSION["profile_picture"] : './assets/imgs/user.png'; ?>" alt="" width="45px" height="50px">
      <span id="nom" ><span id="nom"><?php echo  isset($_SESSION["username"]); ?></span></span>
   </div> 
   <hr>
   <div class="action">
   <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#019477" class="bi bi-person-circle" viewBox="0 0 16 16" id="IconChangeColor"> <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" id="mainIconPathAttribute"></path> <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" id="mainIconPathAttribute"></path> </svg>
   
    <span id="edit">Profil</span>  </a> 
     </div>
    <div class="action" id="add-user">
    <svg width="25px" height="25px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon">
  <path d="M868 732h-70.3c-4.8 0-9.3 2.1-12.3 5.8-7 8.5-14.5 16.7-22.4 24.5a353.84 353.84 0 0 1-112.7 75.9A352.8 352.8 0 0 1 512.4 866c-47.9 0-94.3-9.4-137.9-27.8a353.84 353.84 0 0 1-112.7-75.9 353.28 353.28 0 0 1-76-112.5C167.3 606.2 158 559.9 158 512s9.4-94.2 27.8-137.8c17.8-42.1 43.4-80 76-112.5s70.5-58.1 112.7-75.9c43.6-18.4 90-27.8 137.9-27.8 47.9 0 94.3 9.3 137.9 27.8 42.2 17.8 80.1 43.4 112.7 75.9 7.9 7.9 15.3 16.1 22.4 24.5 3 3.7 7.6 5.8 12.3 5.8H868c6.3 0 10.2-7 6.7-12.3C798 160.5 663.8 81.6 511.3 82 271.7 82.6 79.6 277.1 82 516.4 84.4 751.9 276.2 942 512.4 942c152.1 0 285.7-78.8 362.3-197.7 3.4-5.3-.4-12.3-6.7-12.3zm88.9-226.3L815 393.7c-5.3-4.2-13-.4-13 6.3v76H488c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h314v76c0 6.7 7.8 10.5 13 6.3l141.9-112a8 8 0 0 0 0-12.6z" style="fill:#019477"/>
</svg>

    <span>Logout</span></a> 
  </div>

</body>
