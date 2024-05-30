<?php 

 session_start();
 include('Datebase.php');
 include('func.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./p4.css">
    <link rel="stylesheet" href="./menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
   
    <!-- =============== Navigation ================ -->
    <div class="container">
       <?php  include('navigation.php');?>

        <!--========================= Main ====================-->
        <div class="topbar">
           <div class="toggle">
                   <ion-icon name="menu-outline"></ion-icon>
          </div>
            <div class="search">
              <label>
                     <input type="text" placeholder="Search here">
                      <ion-icon name="search-outline"></ion-icon>
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

            <!-- ================ tableau de borde ================= -->
            <table id="professeursTable">
               <tr>
                       <th>Nom</th>
                       <th>Degré</th>
                       <th>Wilaya</th>
                        <th>Hébergement</th>
                        <th>Restauration</th>
                        <th>Invitation</th>
                     
                </tr>
  
                <?php  include('tablebord.php'); ?>
             </table>   
    <!-- ================= les statistiques ================ -->
            <div class="container-circul">
                 <h1>Graphique circulaire statistique</h1>
                 <canvas id="myPieChart" width="230px"  ></canvas>
               <div class="legend">
                  <div class="legend-item">
                         <div class="legend-dot" style="background-color: rgb(1, 148, 119);"></div>
                         <div class="legend-text">Annaba</div>
                   </div>

                   <div class="legend-item">
                         <div class="legend-dot" style="background-color: rgb(0, 0, 139);"></div>
                         <div class="legend-text">Hors Annaba</div>
                   </div>
               </div>
            </div>

            <div class="container-bar">
                    <h1>Graphique en bâtons statistique</h1>
                  <canvas id="myBarChart" ></canvas>
                 <div class="legend">
                    <div class="legend-item">
                         <div class="legend-dot" style="background-color: rgb(1, 148, 119);"></div>
                         <div class="legend-text">Annaba</div>
                    </div>
                 <div class="legend-item">
                         <div class="legend-dot" style="background-color: rgb(0, 0, 139);"></div>
                         <div class="legend-text">Hors Annaba</div>
                 </div>
              </div>
            </div>
        </div>  
    </div>   
  <!-- ================= profil_menu ================ -->
  <?php include('profil_menu.php'); ?>
    <script src="assets/js/main.js"></script>
    <script src="profile_menu_script.js"></script>
    <script src="count.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="statcirl.js"></script>
</body>
</html>