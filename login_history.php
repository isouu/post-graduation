<?php 

 session_start();
 include('Datebase.php');
 include('func.php');
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="./menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
   

   
  
    <title>Login History</title>
   <style>
.table {
width: 65%;
   margin-left:10%;
}


th, td {

padding: 25px;
text-align: center;
color: hsl(240, 28%, 28%);
}

td td{
font-family: serif;
}

th {
  padding: 8px;
}
tr:hover {
background-color: #ddd;
}
.thh
{
 background-color: #3e3e5f;
 color: #fff;
}
.custom-button {
background-color: #019477; 
color: #ffffff; 
border: none;
padding: 20px 40px; 
font-size: 16px; 
cursor: pointer; 
border-radius: 5px; 
margin-left: 90px;
margin-top: 30px;

}

.custom-button:hover {
background-color: #017a5b; 
}


.custom-button i {
margin-right: 5px; 
}
.icon1
{
position: relative;
flex: 1;
height: 60px;
width: 450px;
margin-left: 230px;
margin-top: 40px;
background: transparent;
box-shadow: 0 0 5px 7px hwb(180 71% 28%);
border-radius:5px ;


}
.icon1  svg
{
margin-left: 70px;
margin-top: 20px;
}
 /************************NOTIFICATION***********************/
 .container-notification {
  position:absolute;
  top:0;
  right:25%;
  display:none;
  width: 35%;
  height: 50%;
  border: 2px solid #ccc;
  overflow: auto;
  background-color: #f7f3f3;
  border-radius: 10px;
}

.notification {
  padding: 15px;
  margin: 10px;
  border-radius: 8px;
  font-size: 16px;
  display: flex;
  align-items: center;
  width: 95%;
  background-color: rgba(255, 255, 255, 0.5);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
  overflow: auto;
}

.notification.today {
  background-color: rgba(102, 204, 102, 0.6);
  color: #000;
  border: 1px solid #0f1d;
}

.notification.passed {
  color: #666;
  border: 1px solid #ccc;
  background-color: rgba(220, 220, 220, 0.9);
  text-decoration: line-through;
}

.notification.near {
  background-color: rgba(255, 102, 102, 0.6);
  color: #000;
  border: 1px solid #ff0000;
}

.notification.far {
  background-color: rgba(255, 204, 102, 0.6);
  color: #000;
  border: 1px solid #FFA500;
}

.notification .icon {
  margin-right: 15px;
  font-size: 30px;
}

.notification .icon.passed {
  color: gray;
}

.notification .icon.today {
  color: green;
}

.notification .icon.near {
  color: red;
}

.notification .icon.far {
  color: orange;
}

/* Scrollbar */
.container-notification::-webkit-scrollbar {
  width: 10px;
}

/* Scrollbar Track */
.container-notification::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Scrollbar Handle */
.container-notification::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 5px;
}

/* On hover, scrollbar handle */
.container-notification::-webkit-scrollbar-thumb:hover {
  background: #555;
}
         #svg-click{
              position:relative;
              margin-top: 5px;
              cursor: pointer;
         
             }
 .form-group {
    margin-right:70px;
  }
  
  label {
    display: block;
    margin-bottom: 16px;
    font-weight: bold;
    font-size: 17px;
    left: 0;
  }
  input[type="text"],
  input[type="date"],
  input[type="time"],
  input[type="number"],
  .form-group textarea,
  select {
    width: 160%;
    margin-top:20px;
  
    padding: 15px;
    border: 1px solid #a09e9e;
    border:#019477 ;
    border-radius: 3px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);

  }
 
    .h23{
      text-align:center;
      color:rgb(1, 148, 119);
      font-size:40px;
      font-weight:bold;
      marqin-left:20px;
    }
    
/************************NOTIFICATION***********************/
.container-notification {
        position:absolute;
         top:0.25%;
        right:25%;
        display:none;
        width: 35%;
         height:400px;
        border: 2px solid #ccc;
        overflow: auto;
        background-color: #f7f3f3;
        border-radius: 10px;
    }
    hr
          {
            margin-top:80%;
            width: 230px;
            margin-left: 25px;
            border: 1.5px solid #fff;
          }
          
    </style>
</head>
<body>
<div class="container">
<?php  include('navigation.php');?>
 <!-- ========================= Main ==================== -->
 <div class="topbar">
           <div class="toggle">
                   <ion-icon name="menu-outline"></ion-icon>
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
            <div class="profile-container">
                  <div class="user">
                      <img src="<?php echo isset($_SESSION["profile_picture"]) ? 'data:image/jpeg;base64,' . $_SESSION["profile_picture"] : './media/customer01.jpg'; ?>"  alt="Photo de profil" id="profile-pic">
                 </div>
            </div>
        </div>
        <div class="main">
            <!-- ======================= Cards ================== -->
               <?php   include('cards.php'); ?>
           
              
                
               
  

                 
                 
             
   

         
    <h2 class="h23">Se deconnecter History</h2>
    <table class="table">
        <tr>
            <th>User Name</th>
            <th>Login Time</th>
        </tr>

        <?php
        
        include("Datebase.php");

        $query = "SELECT username, login_time FROM login_history";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["username"]. "</td> <td>" . $row["login_time"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No login history available</td></tr>";
        }
        
        mysqli_close($conn);
        ?>
    </table>
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
  <script>
   
  /////////////////////////////NOTIFICATION/////////////////////////////////

        // Récupérer les dates de soutenance depuis PHP
var datesSoutenance = <?php echo json_encode($datesSoutenance); ?>;

// Reverse the dates array to display nearest dates first
datesSoutenance.reverse();

// Déterminer la couleur en fonction de la date
function getColor(date) {
    var now = new Date();
    var soutenanceDate = new Date(date);
    var diffDays = Math.ceil((soutenanceDate.getTime() - now.getTime()) / (1000 * 3600 * 24));

    if (diffDays < 0) {
        return 'passed'; // Date passée
    } else if (diffDays == 0) {
        return 'today'; // Date aujourd'hui
    } else if (diffDays <= 7) {
        return 'near'; // Date très proche
    } else {
        return 'far'; // Date loin  
    }
}

// Créer les notifications
var notificationsDiv = document.getElementById('notifications');
datesSoutenance.forEach(function(soutenance) {
    var color = getColor(soutenance.date_arrivee);
    var notificationDiv = document.createElement('div');
    var dateArrivee = new Date(soutenance.date_arrivee);
    var heure = soutenance.heure;
    var specialite = soutenance.specialite;
    var iconSymbol = '';
    switch (color) {
        case 'passed':
            iconSymbol = '&#10004;'; // Checkmark icon
            break;
        case 'today':
            iconSymbol = '&#10003;'; // Checkmark icon
            break;
        case 'near':
            iconSymbol = '&#9888;'; // Warning icon
            break;
        case 'far':
            iconSymbol = '&#9888;'; // Warning icon
            break;
        default:
            iconSymbol = '&#8505;'; // Clock icon
    }
    notificationDiv.innerHTML = '<span class="icon ' + color + '">' + iconSymbol + '</span>' + 'Soutenance de : ' + specialite + ' prévue pour le ' + dateArrivee.toLocaleDateString() + '.';
    notificationDiv.classList.add('notification');
    notificationDiv.classList.add(color);
    notificationsDiv.appendChild(notificationDiv);
});
   ////////////////////////affichage de notification///////////
   const svgClick = document.getElementById('svg-click');
    const notificationContainer = document.querySelector('.container-notification');
  // Add click event listener to SVG
    svgClick.addEventListener('click', function()
   {
     // Toggle visibility of notification container
     notificationContainer.style.display = notificationContainer.style.display === 'none' ? 'block' : 'none';
   });
</script>
<script src="count.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
