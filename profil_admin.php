<?php 

 session_start();
 include('Datebase.php');
 include('func.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Adminstrateur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./profiladmin.css">
    <link rel="stylesheet" href="./p4.css">   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
 
<body>
   
    <!-- =============== Navigation ================ -->
    <div class="container">
    <div class="navigation">
        <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                          <img src="" alt="">
                        </span>
                        <span class="title">Badji Mokhtar </span>
                    </a>
                </li>

                <li>
                    <a href="p4.php">
                        <span class="icon">
                          <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 22L2 22" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2 11L6.06296 7.74968M22 11L13.8741 4.49931C12.7784 3.62279 11.2216 3.62279 10.1259 4.49931L9.34398 5.12486" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M4 22V9.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M20 9.5V13.5M20 22V17.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393M9 22V17" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z" stroke="#ffffff" stroke-width="1.5"></path> </g></svg>
                        </span>
                        <span class="title">Tableau de bord</span>
                    </a>
                </li>

                <li>
                    <a href="./document.php">
                        <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M384 480h48c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224H144c-11.4 0-21.9 6-27.6 15.9L48 357.1V96c0-8.8 7.2-16 16-16H181.5c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8H416c8.8 0 16 7.2 16 16v32h48V160c0-35.3-28.7-64-64-64H298.5c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H87.7 384z"/></svg>
                        </span>
                        <span class="title">Documents</span>
                    </a>
                </li>
                <li>
                    <a href="./plannig.php">
                        <span class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="IconChangeColor" height="20" width="20"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z" id="mainIconPathAttribute" fill="#ffffff"></path></svg>

                        </span>
                        <span class="title">planification</span>

                    </a>
                </li>
                <li>
                    <a href="./profil_admin.php">
                        <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ffff" class="bi bi-person-circle" viewBox="0 0 16 16" id="IconChangeColor"> <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" id="mainIconPathAttribute"></path> <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" id="mainIconPathAttribute"></path> </svg>
                        </span>
                        <span class="title">Profile</span>
                    </a>
                </li>

                <li>
           <a href="./login_history.php">
        <span class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M504 255.5c.3 136.6-111.2 248.4-247.8 248.5-59 0-113.2-20.5-155.8-54.9-11.1-8.9-11.9-25.5-1.8-35.6l11.3-11.3c8.6-8.6 22.4-9.6 31.9-2C173.1 425.1 212.8 440 256 440c101.7 0 184-82.3 184-184 0-101.7-82.3-184-184-184-48.8 0-93.1 19-126.1 49.9l50.8 50.8c10.1 10.1 2.9 27.3-11.3 27.3H24c-8.8 0-16-7.2-16-16V38.6c0-14.3 17.2-21.4 27.3-11.3l49.4 49.4C129.2 34.1 189.6 8 256 8c136.8 0 247.7 110.8 248 247.5zm-180.9 78.8l9.8-12.6c8.1-10.5 6.3-25.5-4.2-33.7L288 256.3V152c0-13.3-10.7-24-24-24h-16c-13.3 0-24 10.7-24 24v135.7l65.4 50.9c10.5 8.1 25.5 6.3 33.7-4.2z"/></svg>

        </span>
        <span class="title">Historique</span>
    </a>
</li>

<li>
                    <a href="./help.php">
                        <span class="icon">
                          <svg fill="#ffffff" height="25px" width="25px" version="1.1" id="XMLID_303_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="help"> <path d="M13,18h-2v-2.9c0-1.6,1-3,2.4-3.4C15.6,11,17,9.1,17,7c0-2.7-2.4-5.1-5-5.1c-1.4,0-2.7,0.5-3.6,1.5 C7.5,4.3,6.9,5.6,6.9,6.9h-2C4.9,5,5.6,3.3,7,2s2.9-2,5-2c3.7,0,7,3.3,7,7.1c0,3.1-2,5.8-5,6.7c-0.6,0.2-1,0.8-1,1.5V18z"></path> <path d="M12,20c1.1,0,2,0.9,2,2s-0.9,2-2,2s-2-0.9-2-2S10.9,20,12,20z"></path> </g> </g></svg>
                        </span>
                        <span class="title">Aide</span>
                    </a>
                </li>
                <li>
                    <hr>
                  <a href="./logout.php">
                      <span class="icon">
                        <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" fill="white"></path> <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" fill="white"></path> </svg>
                      </span>
                      <span class="title">se déconnecter</span>
                    
                  </a>
              </li>
            </ul>
        </div>
        
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
               <div class="myprofile">
                      <div class="profile-form1" id="profileForm">
                        <button class="exit-button" onclick="hideForm()"><i class="fas fa-times"></i></button>
                       <div class="edit-icon" onclick="showEditForm()" id="editIcon"><i class="fas fa-edit"></i></div>
                   <h1>My Profile</h1>
                    <div class="profile-image-container">
                 <div class="profile-image">
                          <img src="<?php echo isset($_SESSION["profile_picture"]) ? 'data:image/jpeg;base64,' . $_SESSION["profile_picture"] : './assets/imgs/user.png'; ?>" alt="" width="45px" height="50px">
                  </div>
               </div>
                    <h2><?php echo isset( $_SESSION["username"]); ?></h2>
                   <h3><?php echo isset( $_SESSION["email"]); ?></h3>
                <div class="round">
                  <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                  </div>
                     <p>Pour plus de détails, n'hésitez pas à nous contacter au :</p>
                      <p class="round-number">+213 234 567 890</p>
              </div>
              
              
              <script>
    function hideForm() {
        var form= document.getElementById("profileForm");
        form.style.display = "none";
    }
    
    function showEditForm() {
        var form11 = document.getElementById("profileForm1");
        var form22 = document.getElementById("profileForm2");
        form22.classList.remove('hide');
        form11.classListe.add('hide');

    }
    
    function hideEditForm() {
        var form1 = document.getElementById("profileForm");
        form1.classList.remove('hide');
    }
</script>

</body>
</html>