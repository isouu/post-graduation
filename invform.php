<?php
session_start();

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convocation</title>
    <link rel="stylesheet" href="./inv.css">
</head>    
<body>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f1f1f1;
    direction: rtl;
}
hr{
    border: 2px solid #000;
    width: 90%;
    margin-right: 5%;
}

.wrapper {
position: relative;
    width: 75%;
    margin: 50px auto;
    background-color: #fff;
    padding: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    font-weight: bold;
}

.header-content {
    
    font-size: 16px;
}

.header-logo img {
    width: 100px;
    height: 80px;
    margin-left: 10px;
}

.content h1 {
    font-size: 70px;
    font-weight: bold;
    margin-bottom: 20px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    margin-right: 45%;
}
.header-content p{
   font-size: 20px;
    text-align: center;
}
.content p {
    font-size: 25px;
    line-height: 1.5;
    margin-bottom: 30px;
    margin-right: 5%;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
    border: 1px solid #ccc; 
}
.h2
{
     margin-right: 40%;
     color: red;
}
.fac {
    display: flex;
    justify-content: space-around;
}

.fac h2:first-child {
    text-align: right;
}

.fac h2:last-child {
    text-align: left;
}

th, td {
        padding: 10px;
        text-align: right;
        border-bottom: 1px solid #000;
        border-left: 1px solid #000;
        border-top: 1px solid #000;
    }
th {
    background-color: #ccc;
    
}

.signature {
    text-align:right;
    font-weight: bold;
    margin-bottom:20%;

}

th, td {
    text-align: right;
    padding: 8px;
}

tr.border-bottom td {
    border-bottom: 1px solid #000;
    color:red;
}
    </style>
    <div class="wrapper">
       
        <div class="header">
            <div class="header-logo">
                <img src="./download__1_-removebg-preview (1).png" alt="Logo 1">
              
            </div>
            <div class="header-content">
                <p>الجمهورية الجزائرية الديمقراطية الشعبية</p><br>
                <p>وزارة التعليم العالي والبحث العلمي</p><br>
                <p>جامعة باجي مختار - عنابة-</p><br>
                
            </div>
            <div class="header-logo">
                <img src="./download__1_-removebg-preview (1).png" alt="Logo 1">
              
            </div>
        </div>
        <hr>
         <div class="fac">
        <h2>كـــلـيـــة التكنولوجيا</h2>
        <h2>قسم الاعلام الالي</h2>
         </div>
        <div class="content">
            <h1>دعوة</h1>
            <?php
              

if(isset($_SESSION['nom_monsieur'],$_SESSION['description'],$_SESSION['nom_candidat'],$_SESSION['date_discussion'],
$_SESSION['specialite'],$_SESSION['lieu_discussion'],$_SESSION['time_discussion'],$_SESSION['titre_msg'])){
            ?>
            <p>يسر رئيس قسم الإعلام الآلي لجامعة باجي مختار -عنابة-<span style="color: red;">  <?php echo   $_SESSION['nom_monsieur']; ?> </span> دعوة السيد(ة)  <br> لحضور مناقشة رسالة الدكتوراه ل.م.د بصفته <span style="color: red;"> 
            <?php echo $_SESSION['description'];?></span> في لجنة المناقشة الخاصة  <br>بالطالب(ة).</p>
            <table>
    <tr class="border-bottom">
        <th>اسم و لقب المترشح(ة)</th>
        <td><?php echo $_SESSION['nom_candidat']; ?></td>
    </tr>
    <tr class="border-bottom">
        <th>تاريخ ومكان المناقشة</th>
        <td><?php echo ($_SESSION['lieu_discussion'] . ' ' . $_SESSION['date_discussion'] . ' ' . $_SESSION['time_discussion']); ?></td>
    </tr>
    <tr class="border-bottom">
        <th>تخصص</th>
        <td><?php echo $_SESSION['specialite']; ?></td>
    </tr>
    <tr class="border-bottom">
        <th>عنوان الرسالة</th>
        <td><?php echo $_SESSION['titre_msg']; ?></td>
    </tr>
      </table>
      <?php
} 

?>
 
     <h2 class="h2">لجنــــــــة المنـــــــــاقشة</h2>
      <table>
            <thead>
                <tr>
                    <th>الإسم واللقب</th>
                    <th>الدرجة</th>
                    <th>الصفة</th>
                    <th>مؤسسة اﻻنتماء</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION as $key => $value) {
                    if (strpos($key, 'name') !== false) {
                        $index = substr($key, strlen('name'));
                        $namekey="name$index";
                        $degreeKey = "degree$index";
                        $adjectiveKey="adjective$index";
                        $foundationKey = "foundation$index";
                ?>
                    <tr>
                    <td><?php echo $value; ?></td>
                    <td><?php echo $_SESSION[$degreeKey];?></td>
                    <td><?php echo $_SESSION[$adjectiveKey]; ?></td>
                    <td><?php echo $_SESSION[$foundationKey]; ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <?php
        session_unset(); 
        ?>
        </table>
        
            <div class="signature">
            <h3>رئيس القسم</h3>
            </div>
        </div>
    </div>
</body>
</html>
