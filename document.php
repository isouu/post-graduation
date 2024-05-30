<?php 

 session_start();
 include('Datebase.php');
 include('func.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="./choix.css">
    <link rel="stylesheet" href="./menu.css">
    <link rel="stylesheet" href="./section.css">
    <link rel="stylesheet" href="./section.css">


    <title>Document</title>
</head>
<body>
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
               
               
               <div class="section12">
                  <!-------------------------------------PRIS EN CHARGE-------------------------------------------->
              <div class="section1">
                <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(0,0,139)" d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"/></svg>
                <h2>Hébergement et restauration</h2>
                <p>Un contrat conclu entre l'expéditeur et le transporteur.</p>
                <a href="./HG.php">  <div class="btnn4" type="submit" >Soumettre</div> </a> <br>
                <a href="./pristabl.php"> <div class="btnn5"  type="submit">Consulter</div></a>

              
                
                
              </div>
                <!-------------------------------------SALLE-------------------------------------------->
                  <div class="section2">
                       <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(0,0,139)" d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/></svg>
                     <h2>Réservation des salles</h2>
                     <p>les personnes peuvent rechercher et réserver une salle de réunion à l'avance</p>
                     <a href="reserve1.php"><div class="btnn4" >Soumettre</div></a><br>
                     <a href="./salletabl.php"> <div class="btnn5"  type="submit">Consulter</div></a>
                 </div>
                 <!-------------------------------------BORDEUREAU D'ENVOI-------------------------------------------->
                   <div class="section3">
                       <svg style="color: rgb(0,0,139);" xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="rgb(0,0,139)" class="bi bi-file-earmark-text" viewBox="0 0 16 16"> <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" fill="rgb(0,0,139)"></path> <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" fill="rgb(0,0,139)"></path> </svg>
                       <h2>Bordeureau d'envoi</h2>
                       <p>Un contrat conclu entre l'expéditeur et le transporteur.</p><br>
                       <a href="./yass.php"><div class="btnn4"  type="submit">Soumettre</div> </a> <br>
                       <a href="./bordtabl.php"> <div class="btnn5"  type="submit">Consulter</div></a>
                   </div>
              </div>  
                   
              <div class="section34">
              <!-------------------------------------FICH  THECHNIQUE-------------------------------------------->
                  <div class="section4">
                           <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(0,0,139)" d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V424c0 11 9 20 20 20s20-9 20-20V410.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l0 0-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V216z"/></svg>
                           <h2>Fiche Thechnique</h2>
                           <p>Support papier qui contenu des informations techniques </p><br><br>
                           <a href="./thec.php"> <div class="btnn4"  type="submit">Soumettre</div></a><br>
                            <a href="./fichtabl.php"> <div class="btnn5"  type="submit">Consulter</div></a>
                   </div> 
                <!----------------------------------------------- Invitation------------------------------------->
               <div class="section5">
                        <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(0,0,139)" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        <h2>Invitations</h2>
                        <p>Une invitation est le fait de proposer à quelqu'un de se réunir en un même lieu pour participer à quelque chose,</p>
                        <a href="invitation.php"><div class="btnn4" >Soumettre</div></a><br>
                        <a href="./invtabl.php"> <div class="btnn5"  type="submit">Consulter</div></a>
               </div>
               <!-----------------------------------------------Attestation d'inscription ------------------------------------->
               <div class="section6">
                       <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(0,0,139)" d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>
                       <h2>Attestation d'inscription</h2>
                        <p>Une attestation d'inscription est un document officiel émis par le Bureau du registraire.</p>
                       <a href="certificat1.php"><div class="btnn4" >Soumettre</div></a><br>
                        <a href="./certtabl.php"> <div class="btnn5"  type="submit">Consulter</div></a>
               </div>
    </div>
    <?php include('profil_menu.php'); ?>
    <script src="assets/js/main.js"></script>
    <script src="profile_menu_script.js"></script>
    <script src="count.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="statcirl.js"></script>
  
</body>
</html>