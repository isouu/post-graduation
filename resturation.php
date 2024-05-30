<?php
// Start a session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>

        *
        {
            margin: 0px;
            padding: 0px;
        }
        form
        {
           
          height: 220vh;
        }
        .header1
        {
            margin-left: 450px;
            margin-top: 13px;
        }
        hr
{
    background-color: #3e3e3e;
    height: 3px;
    width: 860px;
    margin-left: 200px; 
    margin-top: 60px;
}
.form
{
    display: flex;
    justify-content: space-around;
    margin-top: 25px;
    font-size: 20px;
}
.h2
{
    margin-left: 600px;
    margin-top: 60px;
}
.h3
{
    margin-left: 950px;
    margin-top: 60px;
    font-size: 25px;
}
table {
            width: 70%;
            border-collapse: collapse;
          margin-left: 200px;
          margin-top: 60px;
        }
        th, td {
            padding: 13px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        th {
            background-color: #ddd;
            color: rgb(0, 0, 0);
        }
        .h22
        {
            margin-left: 650px;
            margin-top: 25px;
        }
        .RR
        {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }

    </style>
    <form action="">
        <?php
// Check if the session variables exist
if(isset($_SESSION['accommodation_needed']) && isset($_SESSION['matricule']) 
&& isset($_SESSION['nom'])
&& isset($_SESSION['datefich'])&& isset( $_SESSION['degre'])) {
    // Display the variables
    ?>
<div class="header">

      <div class="header1">
    <h2>الجمهوريـة الجزائريـة الديمقراطيـة الشعبيـة <br>
        وزارة التعليـم العالـي و البحـث العلمـي <br>
        جامعـة باجـي مختـار-عنابـة <br> </h2>
    </div>
    <hr>
</div>
         <div class="form">
         <h3>قسم:الاعلام الالي</h3>
         <h3>كلية التكنولوجيا</h3>
         </div>
         <h2 class="h2">طلب الكفالة </h2>
         <div>
          <h3 class="h3">اطعام (وجبة غداء) </h3>
          <table>
            <thead>
                <tr>
                    <th>التاريخ</th>
                    <th>مكان الوظيفة</th>
                    <th>الدرجة</th>
                    <th>الاسم</th>
                    <th>الرقم</th>
                    
                    
                    
                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $_SESSION['nom']; ?></td>
                    <td>1</td>
                    
                    
                   
                  
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>2</td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>3</td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>4</td>
                    
                </tr>
            </tbody>
        </table>

         </div>
         <div>
            <h3 class="h3">الايواء</h3>
            <table>
              <thead>
                  <tr>
                      <th>التاريخ</th>
                      <th>مكان الوظيفة</th>
                      <th>الدرجة</th>
                      <th>الاسم</th>
                      <th>الرقم</th>
                      
                      
                      
                     
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>1</td>
                      
                      
                     
                    
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>2</td>
                      
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>3</td>
                      
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>4</td>
                      
                  </tr>
              </tbody>
          </table>
  
           </div>
           <h2 class="h22">إطار الكفالة: مناقشة أطروحة الدكتوراه للسيد(ة):</h2>
           <div class="RR">
            <h3>رئيس القسم</h3>
            <h3>نائب العميد المكلف بالدراسات
            </h3>
            <h3>عميد الكلية</h3>
           </div>

    </form>
</body>
</html>