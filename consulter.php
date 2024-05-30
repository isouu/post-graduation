<?php
session_start();

// Vérifiez si l'ID est passé en paramètre
if (!isset($_GET['id'])) {
    die("ID de professeur non fourni");
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulaire_professeurs";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$id = intval($_GET['id']);

// Requête pour récupérer les données du professeur
$sql = "SELECT * FROM professeurs WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $professeur = $result->fetch_assoc();
} else {
    die("Professeur non trouvé");
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
    <style>
        .container {
            position: relative;
            width: 70%;
            height: auto;
            margin: 50px auto;
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: center;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 25px;
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
        h1 {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin-right: 4%;
        }
        .header-content p {
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
        h2 {
            text-align: right;
            margin-right: 10%;
        }
        h3 {
            text-align: right;
            margin-right: 10%; 
        }
        .fac {
            display: flex;
            justify-content: space-around;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-left: 10%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .sin {
            display: flex;
            justify-content: space-between;
            margin-top: 25%;
            margin-bottom: 30%;
        }
        .sin1, .sin2, .sin3 {
            width: 30%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="header-content">
            <p>الجمهورية الجزائرية الديمقراطية الشعبية</p>
            <p>وزارة التعليم العالي والبحث العلمي</p>
            <p>جامعة باجي مختار - عنابة-</p>
        </div>
    </div>
    <div class="fac">
        <h2>كـــلـيـــة التكنولوجيا</h2>
        <h2>قسم الاعلام الالي</h2>
    </div>
    <h1>طلــــــب كفالة</h1>
    <h2> :إطعام (وجبة غداء)</h2>

    <table>
        <thead>
            <tr>
                <th>التاريخ</th>
                <th>مكان الوظيفة</th>
                <th>الدرجة</th>
                <th>الإسم واللقب</th>
                <th>الرقم</th>
            </tr>
        </thead>
        <tbody>
            <tr> 
                <td><?php echo date('d/m/Y', strtotime($professeur['date'])); ?></td>
                <td><?php echo (isset($professeur['lieu_travail']) ? $professeur['lieu_travail'] : '') . '-' . (isset($professeur['wilaya']) ? $professeur['wilaya'] : ''); ?></td>
                <td><?php echo isset($professeur['degre']) ? $professeur['degre'] : ''; ?></td>
                <td><?php echo isset($professeur['nom']) ? $professeur['nom'] : ''; ?></td>
                <td>1</td>
            </tr>
        </tbody>
    </table>

    <?php if (isset($professeur['distance_to_annaba']) && $professeur['distance_to_annaba'] >= 300) { ?>
    <h2>:إيواء</h2>
    <table>
        <thead>
            <tr>
                <th>التاريخ</th>
                <th>مكان الوظيفة</th>
                <th>الدرجة</th>
                <th>الإسم واللقب</th>
                <th>الرقم</th>
            </tr>
        </thead>
        <tbody>
            <tr> 
                <td><?php echo date('d/m/Y', strtotime($professeur['date'])); ?></td>
                <td><?php echo (isset($professeur['lieu_travail']) ? $professeur['lieu_travail'] : '') . '-' . (isset($professeur['wilaya']) ? $professeur['wilaya'] : ''); ?></td>
                <td><?php echo isset($professeur['degre']) ? $professeur['degre'] : ''; ?></td>
                <td><?php echo isset($professeur['nom']) ? $professeur['nom'] : ''; ?></td>
                <td>1</td>
            </tr>
        </tbody>
    </table>
    <?php } ?>

    <h3>:إطار الكفالة: مناقشة أطروحة الدكتوراه للسيد(ة)</h3> 
    <div class="sin">
        <div class="sin1">
            <h2>عميد الكلية</h2>
        </div>
        <div class="sin2">
            <h2>نائب العميد المكلف بالدراسات</h2>
            <h2>لما بعد التدرج</h2>
        </div>
        <div class="sin3">
            <h2>رئيس القسم</h2>
        </div>  
    </div> 
</div> 
</body>
</html>
