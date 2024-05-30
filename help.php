<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./menu.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   

</head>
<style>* {
    font-family: "Ubuntu", sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  :root {
    --blue: #2a2185;
    --white: #fff;
    --gray: #f5f5f5;
    --black1: #222;
    --black2: #999;
  }
  
  body {
    min-height: 100vh;
    overflow-x: hidden;
  }
  
  .container {
    position: relative;
    width: 100%;
  }
  
  /* =============== Navigation ================ */
  .navigation {
    position: fixed;
    width: 300px;
    height: 100%;
    background: #019477;
    border-left: 10px solid var(#019477);
    transition: 0.5s;
    overflow: hidden;
  }
  .navigation.active {
    width: 80px;
  }
  
  .navigation ul {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
  }
  
  .navigation ul li {
    position: relative;
    width: 100%;
    list-style: none;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
  }
  
  .navigation ul li:hover,
  .navigation ul li.hovered {
    background-color: var(--white);
  }
  
  .navigation ul li:nth-child(1) {
    margin-bottom: 40px;
    pointer-events: none;
  }
  
  .navigation ul li a {
    position: relative;
    display: block;
    width: 100%;
    display: flex;
    text-decoration: none;
    color: var(--white);
  }
  .navigation ul li:hover a,
  .navigation ul li.hovered a {
    color: var(--blue);
  }
  
  .navigation ul li a .icon {
    position: relative;
    display: block;
    min-width: 60px;
    height: 60px;
    line-height: 75px;
    text-align: center;
  }
  .navigation ul li a .icon ion-icon {
    font-size: 1.75rem;
  }
  
  .navigation ul li a .title {
    position: relative;
    display: block;
    padding: 0 10px;
    height: 60px;
    line-height: 60px;
    text-align: start;
    white-space: nowrap;
  }
  
  /* --------- curve outside ---------- */
  .navigation ul li:hover a::before,
  .navigation ul li.hovered a::before {
    content: "";
    position: absolute;
    right: 0;
    top: -50px;
    width: 50px;
    height: 50px;
    background-color: transparent;
    border-radius: 50%;
    box-shadow: 35px 35px 0 10px var(--white);
    pointer-events: none;
  }
  .navigation ul li:hover a::after,
  .navigation ul li.hovered a::after {
    content: "";
    position: absolute;
    right: 0;
    bottom: -50px;
    width: 50px;
    height: 50px;
    background-color: transparent;
    border-radius: 50%;
    box-shadow: 35px -35px 0 10px var(--white);
    pointer-events: none;
  }
  
  /* ===================== Main ===================== */
  .main {
    position: absolute;
    width: calc(100% - 300px);
    left: 300px;
    min-height: 100vh;
    background: var(--white);
    transition: 0.5s;
  }
  .main.active {
    width: calc(100% - 80px);
    left: 80px;
  }
  
  .topbar {
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 10px;
  }
  
  .toggle {
    position: relative;
   
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2.5rem;
    cursor: pointer;
  left: 80px;
    color: hsl(0, 0%, 0%);
   
    
  }
 .toggle svg
  {
    margin-right: 250px;
  }
  
  .search {
    position: relative;
    width: 400px;
    margin: 0 10px;
  }
  
  .search label {
    position: relative;
    width: 100%;
  }
  
  .search label input {
    width: 100%;
    height: 40px;
    border-radius: 40px;
    padding: 5px 20px;
    padding-left: 35px;
    font-size: 18px;
    outline: none;
    border: 1px solid var(--black2);
  }
  
  .search label .ion-icon {
    position: absolute;
    top: 0;
    left: 10px;
    font-size: 1.2rem;
  }
  
  .user {
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
  }
   /* ===================== Main ===================== */
   .main {
    position: absolute;
    width: calc(100% - 300px);
    left: 300px;
    min-height: 100vh;
    background: var(--white);
    transition: 0.5s;
  }
  .main.active {
    width: calc(100% - 80px);
    left: 80px;
  }
  
  .topbar {
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 10px;
  }
  
  .toggle {
    position: relative;
   
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2.5rem;
    cursor: pointer;
    margin-left: 230px;
    color: hsl(0, 0%, 0%);
  }
  
  .search {
    position: relative;
    width: 400px;
    margin: 0 10px;
  
  }
  
  .search label {
    position: relative;
    width: 100%;
  }
  
  .search label input {
    width: 100%;
    height: 40px;
    border-radius: 40px;
    padding: 5px 20px;
    padding-left: 35px;
    font-size: 18px;
    outline: none;
    border: 1px solid var(--black2);
  }
  
  .search label svg {
    position: absolute;
    top: 0;
   left: 10px;
    font-size: 1.2rem;
  }
  .h2
  {
    margin-left: 140px;
   margin-top: 30px;
 
  }
  h2
  {
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  }
  
  .user {
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
  }
  header{
    position: absolute;
    left: 300px;
    height: 20%;
    width: 80%;
  }
  .Aide{
    position: absolute;
    left: 300px;
    top: 20%;
    height: 10%;
    width: 80%; 
    background: #3e3e5f;
    color: #fff;
    padding: 20px;
    text-align: center;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.5);
  }
  .Aide h1{
    margin: 0;
    font-size: 28px;
  }

  main {
    position: absolute;
 
    left: 300px;
    top: 30%;
    height: 70%;
    width: 80%; 
    padding: 20px;
}

.article {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
    padding: 20px;
    margin-bottom: 20px;
}

.article h2 {
    margin-bottom: 15px;
    color: #333;
}

.article p {
    margin-bottom: 15px;
    color: #666;
}

.article ol, .article ul {
    margin-left: 20px;
    color: #666;
}

.article li {
    margin-bottom: 5px;
}
footer {
    position: absolute; 
   left:300px;
    width: 80%;
    height:20%;
    top:100%;
    background: #3e3e5f;
    color: #fff;
    padding: 10px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}

.subtitle {
            margin-top: 10px;
        }

        .subtitle::before {
            content: "▸";
            margin-right: 5px;
            color: #007bff;
            
        }
        hr
          {
            margin-top:80%;
            width: 230px;
            margin-left: 25px;
            border: 1.5px solid #fff;
          }
          
</style>
<body>

    
    <div class="navigation">
    <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                          <img width="40px"  src="./bdj.png" alt="">
                        </span>
                        <span class="title">Badji Mokhtar </span>
                    </a>
                </li>

                <li>
                    <a href="./p4.php">
                        <span class="icon">
                          <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 22L2 22" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2 11L6.06296 7.74968M22 11L13.8741 4.49931C12.7784 3.62279 11.2216 3.62279 10.1259 4.49931L9.34398 5.12486" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M4 22V9.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M20 9.5V13.5M20 22V17.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393M9 22V17" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z" stroke="#ffffff" stroke-width="1.5"></path> </g></svg>
                        </span>
                        <span class="title">Tableau de bord</span>
                    </a>
                </li>

                <li>
                    <a href="./p6.php">
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
                    <a href="./myprofil.php">
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
       
     <div class="topbar">

        <div class="toggle">
          <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

        </div>

        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <svg fill="#a3a3a3" height="18px" width="18px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 488.4 488.4" xml:space="preserve" stroke="#a3a3a3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M0,203.25c0,112.1,91.2,203.2,203.2,203.2c51.6,0,98.8-19.4,134.7-51.2l129.5,129.5c2.4,2.4,5.5,3.6,8.7,3.6 s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-129.6-129.5c31.8-35.9,51.2-83,51.2-134.7c0-112.1-91.2-203.2-203.2-203.2 S0,91.15,0,203.25z M381.9,203.25c0,98.5-80.2,178.7-178.7,178.7s-178.7-80.2-178.7-178.7s80.2-178.7,178.7-178.7 S381.9,104.65,381.9,203.25z"></path> </g> </g> </g></svg>
            </label>
        </div>
        <div class="profile-container">
       
          <div class="user">
          <img src="<?php echo isset($_SESSION["profile_picture"]) ? 'data:image/jpeg;base64,' . $_SESSION["profile_picture"] : './assets/imgs/user.png'; ?>" alt="" width="45px" height="50px">
      <span id="nom" ><span id="nom"><?php echo $_SESSION["username"]; ?></span></span>
      
      </div>
     
    
    </div>
    
   
     
  </div>
    <header>
     
  </header>
  <div class="Aide">  <h1>Centre d'Aide</h1></div>
  <main>
    <section class="article">
        <h2>Comment Commencer</h2>
        <p>Bienvenue dans notre Centre d'Aide ! Voici quelques étapes pour vous aider à démarrer :</p>
        <ol>
            <li>Connectez-vous à votre compte.</li>
            <li>Explorez le tableau de bord principal pour voir vos options.</li>
            <li>Cliquez sur les sections pertinentes pour effectuer des actions.</li>
        </ol>
    </section>

    <section class="article">
        <h2>Questions Fréquemment Posées (FAQ)</h2>
        <p>Voici quelques questions fréquemment posées et leurs réponses :</p>
        <ul>
            <li><strong>Q :</strong> Comment réinitialiser mon mot de passe ?</li>
            <li><strong>R :</strong> Vous pouvez réinitialiser votre mot de passe en cliquant sur le lien "Mot de passe oublié" sur la page de connexion.</li>
           
        </ul>
    </section>
</main>
<footer>
<h1>Contactez-nous :</h1>
        <p>N'hésitez pas à nous contacter pour toute question ou demande :</p>
        <div class="subtitle">Email : postgrad@gmail.com</div>
        <div class="subtitle">Téléphone : +213 07456789</div>
        <div class="subtitle">Adresse :Sidi amar,Annaba, Algeria</div>
</footer>
<?php include('profil_menu.php'); ?>
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
  </body>