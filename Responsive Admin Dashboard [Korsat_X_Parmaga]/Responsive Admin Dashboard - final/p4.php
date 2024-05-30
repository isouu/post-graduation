<?php 
session_start();

	include("Datebase.php");
	include("func.php");

	$user_data = check_login($conn);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
   
</head>

<body>
    <style>
        /* =========== Google Fonts ============ */
@import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

/* =============== Globals ============== */
* {
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
  position: absolute;
  width: 100%;
}

/* =============== Navigation ================ */
.navigation {
  position: fixed;
  position: absolute;
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

  position: relative;
  width: calc(100% - 300px);
  left: 300px;
  min-height: 100vh;
  background: var(--white);
  transition: 0.5s;
  margin-top: 60px;
}
.main.active {
  width: calc(100% - 80px);
  left: 80px;
}


.topbar {
   
 
  height: 200px;
  display: flex;
  justify-content: space-between;
 
  padding: 0 10px;
  position: absolute;
width: calc(100% - 300px);
  right: 0px;
 
}

.toggle {
 position: relative;
  width: 60px;
  height: 60px;
 
  font-size: 2.5rem;
  cursor: pointer;
}

.search {
  position: absolute;
  left: 60px;
  top: 5px;
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

.search label ion-icon {
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
  position: relative;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* ======================= Cards ====================== */
.cardBox {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 30px;
}

.cardBox .card {
  position: relative;
  background: var(--white);
  padding: 30px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
}

.cardBox .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 2.5rem;
  color: var(#019477);
}

.cardBox .card .cardName {
  color: var(--black2);
  font-size: 1.1rem;
  margin-top: 5px;
}

.cardBox .card .iconBx {
  font-size: 3.5rem;
  color: var(--black2);
}

.cardBox .card:hover {
  background: #019477;
}
.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx {
  color: var(--white);
}

/* ================== Order Details List ============== */
.details {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: 2fr 1fr;
  grid-gap: 30px;
  /* margin-top: 10px; */
}

.details .recentOrders {
  position: relative;
  display: grid;
  min-height: 500px;
  background: var(--white);
  padding: 20px;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}

.details .cardHeader {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}
.cardHeader h2 {
  font-weight: 600;
  color: #019477;
}
.cardHeader img
{
    width: 150px;
    margin-top: 80px;
    margin-right: 50px;
}
.cardHeader .btn {
  position: relative;
  padding: 5px 10px;
  background: var(--blue);
  text-decoration: none;
  color: var(--white);
  border-radius: 6px;
}

.details table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}
.details table thead td {
  font-weight: 600;
}
.details .recentOrders table tr {
  color: var(--black1);
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.details .recentOrders table tr:last-child {
  border-bottom: none;
}
.details .recentOrders table tbody tr:hover {
  background: #019477;
  color: var(--white);
}
.details .recentOrders table tr td {
  padding: 10px;
}
.details .recentOrders table tr td:last-child {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(2) {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(3) {
  text-align: center;
}
.status.delivered {
  padding: 2px 4px;
  background: #8de02c;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.pending {
  padding: 2px 4px;
  background: #e9b10a;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.return {
  padding: 2px 4px;
  background: #f00;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.inProgress {
  padding: 2px 4px;
  background: #1795ce;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}

.recentCustomers {
  position: relative;
  display: grid;
  min-height: 500px;
  padding: 20px;
  background: var(--white);
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}
.recentCustomers .imgBx {
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50px;
  overflow: hidden;
}
.recentCustomers .imgBx img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.recentCustomers table tr td {
  padding: 12px 10px;
}
.recentCustomers table tr td h4 {
  font-size: 16px;
  font-weight: 500;
  line-height: 1.2rem;
}
.recentCustomers table tr td h4 span {
  font-size: 14px;
  color: var(--black2);
}
.recentCustomers table tr:hover {
  background: hsl(168, 99%, 29%);
  color: var(--white);
}
.recentCustomers table tr:hover td h4 span {
  color: var(--white);
}

/* ====================== Responsive Design ========================== */
@media (max-width: 991px) {
  .navigation {
    left: -300px;
  }
  .navigation.active {
    width: 300px;
    left: 0;
  }
  .main {
    width: 100%;
    left: 0;
  }
  .main.active {
    left: 300px;
  }
  .cardBox {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .details {
    grid-template-columns: 1fr;
  }
  .recentOrders {
    overflow-x: auto;
  }
  .status.inProgress {
    white-space: nowrap;
  }
}

@media (max-width: 480px) {
  .cardBox {
    grid-template-columns: repeat(1, 1fr);
  }
  .cardHeader h2 {
    font-size: 20px;
  }
  .user {
    min-width: 40px;
  }
  .navigation {
    width: 100%;
    left: -100%;
    z-index: 1000;
  }
  .navigation.active {
    width: 100%;
    left: 0;
  }
  .toggle {
    z-index: 10001;
  }
  .main.active .toggle {
    color: #fff;
    position: fixed;
    right: 0;
    left: initial;
  }
}

/*pp*/
.profile-container {
    position: absolutes;
    display: inline-block;
}

.profile {
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50%;
   margin-left: 1200px;
 position: absolute;
 background-image: url(./assets/imgs/user.png);
 background-color: #f00;
   
}

.profile img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
   
}

.menu {
   
    position: absolute;
    display: block;
    
    top: 45px;
    right: 30px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 20px;
     height: 290px;
   font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-left: 130px;
    cursor: pointer;
}


.menu span, .menu .edit-profile, .menu 
 {
    display:  block;
    
}

.menu span
{
    margin-top: 25px;
    display: flex;
}
.menu svg
{
    margin-top: 25px;
}
.menu .edit-profile .icon {
    width: 20px;
    height: 50px;
    fill: #333;
    
}

.menu .action .icon {
   
    fill: #333;
    margin-right: 3px;
}
.action
{
    display: flex;
}
    </style>
    <!-- =============== Navigation ================ -->
    <div class="container">
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
                    <a href="./p4.html">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>
                <li>
                    <a href="./p5.html">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="IconChangeColor" height="20" width="20"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z" id="mainIconPathAttribute" fill="#ffffff"></path></svg>
                        </span>
                        <span class="title">Planing</span>
                    </a>
                </li>
                <li>
                    <a href="./help.html">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
       
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
          <div class="profile-container">
         
            <div class="user">
            <img src="./assets/imgs/user.png" alt="Photo de profil" id="profile-pic">
        
        </div>
      </div>
    
       
    </div>
    
       
       
       
        <div class="main">
          

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">86</div>
                        <div class="cardName">Soutenace</div>
                    </div>

                    <div class="iconBx">
                        <svg style="color: rgb(1, 148, 119);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16"> <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" fill="#019477"></path> <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" fill="#019477"></path> </svg>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">doctorent</div>
                    </div>

                    <div class="iconBx">
                        <svg fill="#019477" height="40px" width="40px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 408.191 408.191" xml:space="preserve" stroke="#019477"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M363.663,294.916c0-18.823-13.48-34.545-31.289-38.05v-25.655c0-2.333-1.086-4.534-2.938-5.953 c-1.853-1.42-4.26-1.895-6.514-1.289l-8.355,2.25c-22.41-37.422-57.92-48.108-75.395-51.131v-19.483 c5.289-4.545,10.184-10.16,14.557-16.779c1.775-2.688,3.422-5.512,4.965-8.434c0.021,0.008,0.039,0.017,0.061,0.023 c1.959,0.635,3.953,0.936,5.932,0.936c9.098,0,18.565-6.189,21.023-16.258c5.732-23.485-13.5-28.398-13.83-28.458 c0.689-5.758,1.059-11.639,1.059-17.602C272.938,7.156,233.647,0,204.093,0c-29.551,0-68.838,7.156-68.838,69.035 c0,5.963,0.37,11.844,1.059,17.602c-0.329,0.06-19.763,5.184-13.831,28.461c2.559,10.043,11.927,16.255,21.025,16.255 c1.977,0,3.972-0.302,5.931-0.936c0.021-0.007,0.04-0.016,0.061-0.023c1.543,2.922,3.189,5.746,4.965,8.434 c4.373,6.619,9.267,12.234,14.555,16.779v19.483c-17.476,3.023-52.983,13.713-75.394,51.131l-8.354-2.25 c-2.254-0.604-4.661-0.13-6.513,1.289c-1.853,1.419-2.938,3.62-2.938,5.953v25.654c-17.812,3.504-31.291,19.227-31.291,38.051 c0,18.822,13.479,34.549,31.291,38.053v32.199c0,3.326,2.191,6.256,5.383,7.195l120.7,35.523c0.695,0.204,1.408,0.305,2.117,0.305 c0.025,0,0.052,0,0.077,0c0.718,0.002,1.472-0.093,2.192-0.305l120.701-35.508c3.191-0.94,5.383-3.868,5.383-7.195v-32.215 C350.184,329.465,363.663,313.738,363.663,294.916z M269.264,101.639c2.336,1.52,3.334,5.254,2.176,8.834 c-1.103,3.402-3.871,5.766-6.535,5.869C266.626,111.619,268.085,106.707,269.264,101.639z M136.752,110.474 c-1.158-3.579-0.16-7.313,2.177-8.834c1.18,5.067,2.638,9.979,4.358,14.702C140.625,116.236,137.855,113.875,136.752,110.474z M204.093,15c31.995,0,53.399,9.029,53.825,52.721c-26.49,5.475-50.976,0.613-72.852-14.498 c-12.249-8.462-20.517-18.125-24.52-23.389C169.911,18.174,185.141,15,204.093,15z M166.98,130.559 c-10.785-16.326-16.725-38.175-16.725-61.523c0-9.746,1.02-17.805,2.942-24.455c5.171,5.98,12.778,13.604,22.817,20.618 c13.961,9.756,34.738,19.657,61.55,19.657c6.219,0,12.766-0.541,19.625-1.732c-1.896,17.955-7.396,34.447-15.977,47.436 c-10.152,15.367-23.336,23.83-37.12,23.83C190.312,154.389,177.131,145.926,166.98,130.559z M177.259,189.085 c3.837-0.381,6.76-3.608,6.76-7.464v-16.475c6.406,2.791,13.149,4.242,20.074,4.242c6.927,0,13.671-1.451,20.079-4.243v16.476 c0,3.855,2.924,7.083,6.76,7.464c3.428,0.34,9.418,1.203,16.707,3.348c-3.697,11.395-22.129,20.362-43.542,20.362 c-21.414,0-39.847-8.968-43.544-20.362C167.842,190.288,173.831,189.425,177.259,189.085z M59.529,294.916 c0-10.499,6.836-19.432,16.291-22.58v45.156C66.365,314.345,59.529,305.414,59.529,294.916z M196.52,390.666l-105.7-31.108 v-118.56l105.7,28.468V390.666z M204.096,255.973L108.778,230.3c10.99-16.63,25.02-26.6,37.757-32.561 c6.21,17.444,29.267,30.056,57.563,30.056s51.345-12.613,57.552-30.06c12.738,5.96,26.773,15.931,37.764,32.565L204.096,255.973z M317.374,359.572l-105.701,31.095V269.466l105.701-28.468V359.572z M332.374,317.492v-45.156 c9.453,3.149,16.289,12.081,16.289,22.58C348.663,305.413,341.827,314.344,332.374,317.492z"></path> </g> </g> </g></svg>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Encadreur</div>
                    </div>

                    <div class="iconBx">
                        <svg fill="#019477" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 30.754 30.754" xml:space="preserve" stroke="#019477" stroke-width="0.00030754"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <rect x="11.917" y="16.007" width="2.552" height="0.3"></rect> <rect x="11.917" y="15.252" width="3.148" height="0.298"></rect> <rect x="11.917" y="16.88" width="1.574" height="0.298"></rect> <rect x="11.917" y="12.965" width="1.886" height="1.027"></rect> <circle cx="14.854" cy="17.447" r="0.833"></circle> <polygon points="14.854,18.7 15.528,19.555 15.851,18.708 16.749,18.591 16.072,17.736 "></polygon> <polygon points="12.71,18.122 13.557,18.443 13.673,19.341 14.527,18.665 13.564,17.448 "></polygon> <path d="M12.851,18.447h-1.543v-1.813l0.729-1.879h2.434v-0.298h-2.552v0.146l-0.61-0.54v-2.404h3.184l-0.005,1.293h1.373v4.606 l0.253-0.181l0.117,0.146V12.58h-0.004l0.008-0.005l-1.371-1.277v-0.01h-3.927v2.447L6.254,9.593L1.849,9.395l-0.34,10.261 l0.326-0.006l0.317,5.838L1.779,29.67H1.675v1.084h3.208h0.08h3.208V29.67h-0.56l0.02-4.771l-0.754-5.326l0.191,0.006 l-0.189-5.924l4.058,2.854v2.311h2.375l-0.026-0.198L12.851,18.447z M14.86,11.802l0.836,0.778h-0.841L14.86,11.802z M4.926,29.67 H4.883H4.331l0.327-4.458l-0.075-4.128l0.49,4.236L4.926,29.67z"></path> <path d="M19.391,1.251v0.713h0.463v1.641h-0.252v1.389h1.18v-1.39h-0.379v-1.64h0.757v2.315l0.228,0.072 c-0.145,0.381-0.234,0.79-0.234,1.223c0,1.916,1.558,3.471,3.471,3.471c1.912,0,3.468-1.555,3.468-3.471 c0-0.431-0.089-0.839-0.231-1.221l0.252-0.074V1.964h1.558V1.251H19.391z"></path> <polygon points="22.083,9.558 16.75,14.765 17.233,16.521 22.374,12.686 22.083,20.128 23.022,20.128 22.743,25.316 22.977,29.617 22.084,29.617 22.084,30.754 26.209,30.754 26.209,29.617 26.016,29.617 25.582,25.316 26.106,20.128 26.852,20.128 26.852,9.558 23.44,9.558 "></polygon> <path d="M4.556,8.176C4.73,8.207,4.91,8.223,5.092,8.23C5.13,8.232,5.167,8.242,5.206,8.242c0.005,0,0.01-0.002,0.015-0.002 c0.007,0,0.013,0.002,0.02,0.002c0.008,0,0.016-0.002,0.023-0.002c0.007,0,0.016,0.002,0.023,0.002 c2.239,0,4.057-1.816,4.057-4.058c0-0.259-0.036-0.507-0.087-0.751C8.929,1.486,7.246,0,5.206,0C2.93,0,1.084,1.845,1.084,4.12 C1.084,6.174,2.59,7.862,4.556,8.176z"></path> </g> </g> </g></svg>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">42</div>
                        <div class="cardName">Etranger</div>
                    </div>

                    <div class="iconBx">
                      <svg fill="#019477" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 43.491 43.491" xml:space="preserve" stroke="#019477" stroke-width="0.00043491"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M41.625,9.778c-0.378-0.23-3.22-1.961-3.22-1.961s2.054-5.874,1.875-6.688C40.104,0.316,39.232,0,39.232,0l-3.461,6.388 l-3.557-1.546l-0.021-2.333l-1.087-0.966c0,0-0.317,2.663-0.77,3.308c-0.449,0.644-2.229,1.851-2.229,1.851l0.938,0.95 l2.426-1.307l2.991,2.071l-3.716,6.216c0,0,0.749,0.923,1.486,0.521c0.736-0.402,4.342-5.037,4.342-5.037s3.501,1.958,3.873,2.043 c0.372,0.087,1.291,0.574,1.757-0.54C42.67,10.506,42.003,10.008,41.625,9.778z"></path> <path d="M36.078,16.177c-0.525-0.631-1.115-1.204-1.732-1.745l-0.899,0.93c0.565,0.492,1.108,1.013,1.592,1.587 c-0.875,0.573-1.894,1.078-3.024,1.496c-0.832-2.472-2.047-4.528-3.511-5.924c0.554,0.181,1.089,0.401,1.609,0.646l0.688-1.107 c-2.05-0.985-4.346-1.539-6.768-1.539c-0.01,0-0.016,0-0.021,0s-0.011,0-0.016,0c-0.018,0-0.035,0.002-0.055,0.002 c-4.798,0.028-9.092,2.224-11.951,5.654c-0.264,0.317-0.514,0.645-0.752,0.982c-1.813,2.557-2.882,5.674-2.882,9.04 c0,3.365,1.069,6.482,2.882,9.04c0.238,0.337,0.488,0.666,0.752,0.981c2.86,3.431,7.153,5.625,11.951,5.653 c0.02,0,0.037,0.002,0.055,0.002c0.005,0,0.01,0,0.016,0s0.014,0,0.021,0c4.836,0,9.167-2.202,12.045-5.655 c0.264-0.316,0.514-0.646,0.752-0.982c1.812-2.557,2.881-5.676,2.881-9.04c0-3.365-1.068-6.483-2.881-9.04 C36.592,16.822,36.344,16.493,36.078,16.177z M19.451,12.56c-1.441,1.39-2.638,3.422-3.463,5.861 c-1.106-0.413-2.102-0.91-2.959-1.473C14.712,14.951,16.924,13.412,19.451,12.56z M12.274,17.932 c0.974,0.651,2.101,1.22,3.347,1.689c-0.537,1.964-0.846,4.145-0.856,6.446H9.646C9.675,23.04,10.647,20.24,12.274,17.932z M9.693,27.354h5.096c0.083,1.926,0.375,3.752,0.832,5.424c-1.246,0.469-2.373,1.039-3.347,1.689 C10.832,32.421,9.904,29.988,9.693,27.354z M13.033,35.447c0.857-0.561,1.85-1.057,2.953-1.469 c0.826,2.438,2.023,4.47,3.465,5.859C16.924,38.986,14.716,37.445,13.033,35.447z M23.391,40.543 c-2.639-0.361-4.917-3.068-6.209-6.967c1.862-0.559,3.971-0.896,6.209-0.952V40.543z M23.391,31.339 c-2.36,0.058-4.587,0.423-6.568,1.03c-0.406-1.542-0.666-3.232-0.745-5.016h7.313V31.339z M23.391,26.066h-7.339 c0.011-2.16,0.292-4.201,0.776-6.036c1.979,0.606,4.204,0.972,6.563,1.028V26.066L23.391,26.066z M23.391,19.773 c-2.237-0.055-4.346-0.392-6.207-0.95c1.293-3.896,3.568-6.607,6.207-6.969V19.773z M24.678,11.864 c2.61,0.403,4.858,3.108,6.137,6.979c-1.844,0.546-3.926,0.877-6.137,0.931V11.864z M24.678,21.059 c2.332-0.056,4.53-0.413,6.494-1.007c0.479,1.829,0.76,3.863,0.77,6.015h-7.264V21.059z M24.678,27.354h7.238 c-0.078,1.774-0.337,3.457-0.738,4.994c-1.965-0.595-4.168-0.953-6.5-1.009V27.354z M24.678,40.534v-7.909 c2.211,0.055,4.295,0.385,6.141,0.932C29.539,37.428,27.288,40.13,24.678,40.534z M28.502,39.876 c1.463-1.396,2.682-3.45,3.514-5.922c1.129,0.417,2.146,0.921,3.021,1.493C33.327,37.475,31.077,39.033,28.502,39.876z M35.794,34.467c-0.991-0.664-2.144-1.242-3.416-1.716c0.452-1.664,0.742-3.481,0.824-5.397h5.173 C38.164,29.988,37.236,32.421,35.794,34.467z M33.229,26.066c-0.012-2.291-0.317-4.462-0.852-6.42 c1.273-0.474,2.424-1.052,3.415-1.714c1.626,2.308,2.601,5.108,2.628,8.134H33.229z"></path> <path d="M3.69,25.822c0-11.465,9.327-20.794,20.794-20.794c1.187,0,2.344,0.117,3.475,0.31l1.316-0.811l0.434-1.44 c-1.486-0.3-3.65-0.622-5.225-0.622c-12.88,0-23.357,10.479-23.357,23.357c0,1.355,0.069,2.625,0.222,3.83 c0.641,5.061,7.079,13.838,12.19,13.839C8.005,39.533,3.69,33.273,3.69,25.822z"></path> </g> </g> </g></svg>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                       
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Wilaya</td>
                                <td>Kilometre</td>
                                <td>Abri et Alimante</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Boukabel Maram</td>
                                <td>Setif</td>
                                <td>300km</td>
                                <td><svg width="20px" height="20px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#019477" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="#019477"></path> </g></svg></td>
                            </tr>

                            <tr>
                                <td>Mahnane Yassmine</td>
                                <td>Tlemcen</td>
                                <td>700km</td>
                                <td><svg width="20px" height="20px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#019477" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="#019477"></path> </g></svg></td>
                            </tr>

                            <tr>
                                <td>Lamoudi Issra</td>
                                <td>Skikda</td>
                                <td>100km</td>
                                <td><svg width="17px" height="17px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#f92f2f" stroke="#f92f2f"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#f92f2f" d="M8 0c-4.4 0-8 3.6-8 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM12.2 10.8l-1.4 1.4-2.8-2.8-2.8 2.8-1.4-1.4 2.8-2.8-2.8-2.8 1.4-1.4 2.8 2.8 2.8-2.8 1.4 1.4-2.8 2.8 2.8 2.8z"></path> </g></svg></td>
                            </tr>

                            <tr>
                                <td>Bendjelb Aymen</td>
                                <td>El-Tarf</td>
                                <td>70km</td>
                                <td><svg width="17px" height="17px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#f92f2f" stroke="#f92f2f"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#f92f2f" d="M8 0c-4.4 0-8 3.6-8 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM12.2 10.8l-1.4 1.4-2.8-2.8-2.8 2.8-1.4-1.4 2.8-2.8-2.8-2.8 1.4-1.4 2.8 2.8 2.8-2.8 1.4 1.4-2.8 2.8 2.8 2.8z"></path> </g></svg></td>
                            </tr>

                            <tr>
                                <td>Loutfi Gourf</td>
                                <td>Guelma</td>
                                <td>60km</td>
                                <td><svg width="20px" height="20px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#019477" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="#019477"></path> </g></svg></td>
                            </tr>

                            <tr>
                                <td>Ayoub Salah</td>
                                <td>soug Ahrass</td>
                                <td>80km</td>
                                <td><svg width="17px" height="17px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#f92f2f" stroke="#f92f2f"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#f92f2f" d="M8 0c-4.4 0-8 3.6-8 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM12.2 10.8l-1.4 1.4-2.8-2.8-2.8 2.8-1.4-1.4 2.8-2.8-2.8-2.8 1.4-1.4 2.8 2.8 2.8-2.8 1.4 1.4-2.8 2.8 2.8 2.8z"></path> </g></svg></td>
                            </tr>

                            <tr>
                                <td>Labed Nazim</td>
                                <td>jijel</td>
                                <td>250km</td>
                                <td><svg width="17px" height="17px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#f92f2f" stroke="#f92f2f"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#f92f2f" d="M8 0c-4.4 0-8 3.6-8 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM12.2 10.8l-1.4 1.4-2.8-2.8-2.8 2.8-1.4-1.4 2.8-2.8-2.8-2.8 1.4-1.4 2.8 2.8 2.8-2.8 1.4 1.4-2.8 2.8 2.8 2.8z"></path> </g></svg></td>
                            </tr>

                            <tr>
                                <td>Mehmel Oussama</td>
                                <td>Sidi-Bel-Abbès</td>
                                <td>900km</td>
                                <td><svg width="20px" height="20px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#019477" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="#019477"></path> </g></svg></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    <img class="img" src="./assets/imgs/diagramme.jpg" alt="">
                    </div>

                   
                </div>
            </div>
        </div>
      
    </div>
    <div class="menu" id="profile-menu">
      <div class="action">
      <img src="./assets/imgs/user.png" alt="" width="45px " height="50px" >
      <span id="nom">Mahnane Yassmine</span>
   </div> 
   <hr>
   <div class="action">
    <svg  width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#0000ed" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z" fill="#019477"></path></g></svg>
   
    <span id="edit">Edit Profil</span> 
     </div>
     <div class="action" id="add-user">
      <svg style="color: rgb(1, 148, 119);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16"> <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="#019477"></path> <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" fill="#019477"></path> </svg>
      <span>Ajouter un utilisateur</span>
  </div>
  <div class="action" id="delete-user">
    <svg style="color: rgb(1, 148, 119);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" fill="#019477"></path> <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="#019477"></path> </svg>
    <span>Supprimer un utilisateur</span>
</div>
<div class="action" id="manage-permissions">
  <svg style="color: rgb(1, 148, 119);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16"> <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" fill="#019477"></path> </svg>
  <span>Gérer les autorisations</span>
</div>

    
  </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"> </script>
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

</html>