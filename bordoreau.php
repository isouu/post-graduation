<?php
session_start();
 
// Check if 'bordoreau' and 'nombre' are set in the session, initialize if not
if (!isset($_SESSION['bordoreau'])) {
    $_SESSION['bordoreau'] = ['nombre' => 0]; // Initialize with default value
}

$nombre = $_SESSION['bordoreau']['nombre'];

$donne = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ensure $id is an array
    if (!is_array($id)) {
        $id = [$id];
    }

    // Assuming you have a database connection already established
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bordoureau";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $i = 0;

    while ($i < count($id)) {
        $sql = "SELECT * FROM bord WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id[$i]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $donne[] = $row;
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>"; // Modified colspan to 6
        }

        $i++;
    }

    $conn->close();
}

function genererFormulaires($nombre, $donne) {
    // Vérifier si le nombre est valide
    if ($nombre > 0) {
        $conteneurFormulaires = '<form action="" method="post">';
        $conteneurFormulaires .= '<div class="row">';
        // Créer un formulaire d'inscription pour chaque nombre
        for ($i = 0; $i < count($donne); $i++) {
            // Générer le contenu du formulaire avec la valeur de $i
            $contenuFormulaire = bordereau($i, $donne[$i]);
            // Ajouter le contenu du formulaire au conteneur
            $conteneurFormulaires .= $contenuFormulaire;
        }

        // Fermer la dernière rangée
        $conteneurFormulaires .= '</div>';
        $conteneurFormulaires .= '</form>';
        
        return $conteneurFormulaires;
    } else {
        // Si le nombre n'est pas valide, afficher un message d'erreur
        return "Veuillez entrer un nombre valide supérieur à zéro.";
    }
}

function bordereau($index, $donne) {
    $bordereau = "
    <a href='./document.php'>
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='50' height='50'>
            <path d='M0 0h24v24H0z' fill='none'/>
            <path d='M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z'/>
        </svg>
    </a>
    <div id='contenu-a-telecharger' class='contenu-a-telecharger'>
    <div class='hedear'>
        <div class='header1'>
            <p>UNIVERSITÉ BADJI MOKHTAR-<br>ANNABA<br>FACULTÉ DES SCIENCES DE<br>L’INGÉNIORAT<br>DÉPARTEMENT D’INFORMATIQUE</p>
        </div>
        <div class='header2'>
            <p>جامعة باجي مختار –<br>عنابـــــــــــــــة<br>كلية علــــــــــــوم الهندســـــــــة<br>قسم الإعــــــــــــــلام الآلــــــــــــــي<br></p>
        </div>
    </div>
    <hr>
    <div>
        <h3>................................ : عنابة في </h3>
        <h2>إلــــــــى السيد/ نائب عميد الكلية لما بعد التدرج</h2>
        <h1>جدول الارسال</h1>
        <table>
            <thead>
                <tr>
                    <th>الملاحظة</th>
                    <th>العدد</th>
                    <th>المرسل إليه</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> " . htmlspecialchars($donne["remarque"]) . " 
                    </td>
                    <td>" . htmlspecialchars($donne["numero"]) . "</td>
                    <td class='row'><h4>تجدون رفقة هدا الجدول الوثائق التالية :" . htmlspecialchars($donne['type_bordereau']) . "</h4></td>
                </tr>
                <tr class='tr'>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <h3 class='h3'>" . htmlspecialchars($donne['date_arrivee']) . " :<span>تاريخ الوصول</span></h3>
        <hr class='hr'>
        <div class='foter'>
            <div>
                <p>Université Badji Mokhtar-Annaba<br>B.P. 12, Annaba, 23000, Algeria<br>Phone : (213)(0) 30 82 13 43<br>Fax: (213)(0) 30 82 13 43</p>
            </div>
            <div>
                <p style='text-align: right'>جامعة باجي مختار<br>- عنابــــــة - ص.ب. 12، عنابة، 23000، الجزائر<br>الهاتف: (213)(0) 30 82 13 43<br>الفاكس: (213)(0)</p>
            </div>
        </div>
        <p class='p'>www.info.univ-annaba.dz</p>
    </div>
    </div>
   ";

    return $bordereau;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bord.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <a href="p6.php">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="IconChangeColor" height="30" width="30">
            <!-- Votre SVG ici -->
        </svg>
    </a>

    <div class="wrapper">
        <!-- Contenu généré -->
        <?php echo genererFormulaires($nombre, $donne); ?>
    </div>
    <button id="telecharger-btn"><svg width="25px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.25589 16C3.8899 15.0291 3 13.4422 3 11.6493C3 9.20008 4.8 6.9375 7.5 6.5C8.34694 4.48637 10.3514 3 12.6893 3C15.684 3 18.1317 5.32251 18.3 8.25C19.8893 8.94488 21 10.6503 21 12.4969C21 14.0582 20.206 15.4339 19 16.2417M12 21V11M12 21L9 18M12 21L15 18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> Télécharger</button>

    <script>
        document.getElementById('telecharger-btn').addEventListener('click', function() {
            var contenusDiv = document.querySelectorAll('.contenu-a-telecharger');
            var combinedContent = document.createElement('div');

            contenusDiv.forEach(function(contenuDiv, index) {
                combinedContent.appendChild(contenuDiv.cloneNode(true));
                if (index < contenusDiv.length - 1) {
                    var hr = document.createElement('hr'); // Add separator between contents
                    combinedContent.appendChild(hr);
                }
            });

            var opt = {
                filename: 'document.pdf', // Nom du fichier PDF
                html2canvas: { scale: 5 }, // Échelle pour améliorer le rendu
                jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
            };

            var pdf = html2pdf();
            pdf.from(combinedContent).set(opt).save();
        });
    </script>

    <style>
      * {
        margin: 0;
        padding: 0;
      }

      body {
        background-color: #cececc;
      }

      .contenu-a-telecharger {
        width: 100%;
        height: 1100px;
        justify-content: center;
        background-color: #fff;
        box-shadow: 0 0 8px 10px rgba(0, 0, 0, 0.2);
      }

      .hedear {
        display: flex;
        margin-top: 15px;
        margin-left: 20px;
        justify-content: space-around;
      }

      .hedear p {
        margin-top: 15px;
      }

      hr {
        background-color: #3e3e3e;
        height: 3px;
        width: 600px;
        margin-left: 130px;
        margin-top: 20px;
      }

      .hr {
        background-color: #3e3e3e;
        height: 3px;
        width: 600px;
        margin-left: 120px;
        margin-top: 60px;
      }

      h3 {
        margin-left: 160px;
        margin-top: 70px;
        font-size: 20px;
      }

      h2 {
        margin-left: 180px;
        margin-top: 40px;
        font-size: 25px;
      }

      h1 {
        align-items: center;
        margin-left: 370px;
        font-size: 35px;
        margin-top: 25px;
      }

      table {
        width: 60%;
        border-collapse: collapse;
        margin-top: 30px;
        margin-left: 120px;
      }

      th,
      td {
        border: 1px solid hsl(0, 0%, 68%);
        padding: 8px;
        text-align: center;
      }

      th {
        background-color: hsl(0, 0%, 100%);
      }

      .row {
        height: 240px;
      }

      h4 {
        margin-bottom: 180px;
        margin-left: 300px;
        width: 200px;
      }

      .tr {
        height: 40px;
      }

      .h3 {
        font-size: 20px;
        margin-left: 280px;
        margin-top: 70px;
      }

      .foter {
        display: flex;
        justify-content: space-around;
        margin-top: 12px;
      }

      .p {
        margin-left: 300px;
        margin-top: 13px;
      }

      button {
        width: 160px;
        height: 60px;
        margin-top: 35%;
        margin-left: 500px;
        padding: 10px;
        background-color: #019477;
        border: none;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: #fff;
        border-radius: 7px;
      }
      .svg {
            position: absolute;
            cursor: pointer;
            left: 0;
            top: 0;
        }
    </style>
</body>
</html>
