<?php 

include("code1.php");
// Check if 'bordoreau' and 'nombre' are set in the session, initialize if not
if (!isset($_SESSION['fichethec'])) {
   $_SESSION['fichethec'] = ['nombre' => 0]; // Initialize with default value
}

$nombre = 0;

$donne = [];

if (isset($_GET['id'])) {
   $id = $_GET['id'];

   // Ensure $id is an array
   if (!is_array($id)) {
       $id = [$id];
   }

   // Assuming you have a database connection already established
   $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);


   
   $i = 0;
    while ($i < count($id)) {
        $sql = "SELECT * FROM  thec WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->bind_param("i", $id[$i]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $donne[] = $row;
                $nombre = $nombre + 1;
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }

        $i++;
    }

    // Close the database connection
   
    $connexion->close();
}

function genererFormulaires($nombre, $donne) {
    // Vérifier si le nombre est valide
    if ($nombre > 0) {
        $conteneurFormulaires = '<form action="" method="post">';
        $conteneurFormulaires .= '<div class="row">';
        // Créer un formulaire d'inscription pour chaque nombre
        for ($i = 0; $i < $nombre; $i++) {
            // Générer le contenu du formulaire avec l'index et les données de la salle
            $contenuFormulaire = fich($i, $donne); // Utilisation de $donne[$i] pour récupérer les données de la salle à l'index $i
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


function fich($index, $donne) {
    $fich = "
      <a href='./document.php'>
    <svg  class= class ='svg' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='50' height='50'>
        <path d='M0 0h24v24H0z' fill='none'/>
        <path d='M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z'/>
    </svg>
</a>
    <div id='contenu-a-telecharger' class='contenu-a-telecharger'>
       <div class='republique'>
            <h2> الجمهورية الجزائرية الديمقراطية الشعبية </h2> <br>
            <h2>  وزارة التعليم العالي و البحث العلمي   </h2> <br>
            <h2>    جامعة باجي مختار-عنابة  </h2>  <br>
            <h2>كلية علوم الهندسة </h2> <br>
        </div>
        <hr>
        <h2 class='h2'>بطــــــــــاقة تقنية عن مناقشة</h2>
        <h3 class='h3'>:رسالة<br>
            قسم: الأعلام الآلي <br>
        </h3>
        <div class='parag'>
            <h3>           
                بناء على المرسوم التنفيذي رقم 01-293 المؤرخ في 01/10/2001  
                والمتعلق  بمهام التعليم والتكوين التي يقوم بها أساتذة التعليم والتكوين العاليين 
                و مستخدمو البحث وأعوان عموميين آخرون باعتبارها عملا ثانويا.
            </h3>
        </div>
        <div>
            <h2 class='h22'>:يمنـــــــــح </h2>
            <div class='h33'>
                <h3>
                    السيد(ة) الأستاذ (ة) : " . htmlspecialchars($donne[$index]["nom"]) . "
                </h3>
                <h3>
                    الدرجة العلمية:الرتبة : " . htmlspecialchars($donne[$index]["degrer"]) . "
                </h3>
                <h3>
                    الجامعة الأصلية   :  " . htmlspecialchars($donne[$index]["UnivOrg"]) . "
                </h3>
            </div>
        </div>
        <div>
            <h2 class='h22'>
                " . htmlspecialchars($donne[$index]["NumCompt"]) . ": رقم الحساب الجاري
            </h2>
            <div class='h33'>
                <h3>
                    اسم المتر شح(ة) :" . htmlspecialchars($donne[$index]["Nomcondid"]) . "
                </h3>
                <h3>
                    عنوان الرسالة :" . htmlspecialchars($donne[$index]["AdrsLetter"]) . "
                </h3>
                <h3>
                    تاريخ المناقشة:" . htmlspecialchars($donne[$index]["DateDissc"]) . " 
                </h3>
            </div>
        </div>
        <div class='h222'>
            <h2> :  
                عدد صفحات الأطروحة: المقابل بالساعات <br> 
            </h2>
            <h2> 
                مجموع الساعات   :" . htmlspecialchars($donne[$index]["totalheure"]) . "
            </h2>
        </div>
        <h2 class='annaba'> :عنابة في</h2>
        <div class='classe'>
            <h2>
                عميد الكلية
            </h2>
            <h2>
                رئيس القسم       
            </h2>
        </div>
    </div>
   ";
    
    return $fich;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
<a href="p6.php">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="30" width="30">
        <!-- Your SVG content -->
    </svg>
</a>
<div class="wrapper">
    <!-- Contenu généré -->
    <?php echo genererFormulaires($nombre,$donne); ?>
</div>
<button id="telecharger-btn">
    <svg width="25px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
        <path d="M5.25589 16C3.8899 15.0291 3 13.4422 3 11.6493C3 9.20008 4.8 6.9375 7.5 6.5C8.34694 4.48637 10.3514 3 12.6893 3C15.684 3 18.1317 5.32251 18.3 8.25C19.8893 8.94488 21 10.6503 21 12.4969C21 14.0582 20.206 15.4339 19 16.2417M12 21V11M12 21L9 18M12 21L15 18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>  
    Télécharger
</button>
<script>
document.getElementById('telecharger-btn').addEventListener('click', function() {
    var contenusDiv = document.querySelectorAll('.contenu-a-telecharger');
    var combinedContent = document.createElement('div');

    contenusDiv.forEach(function(contenuDiv, index) {
        var clonedDiv = contenuDiv.cloneNode(true);
        clonedDiv.style.display = 'block';
        combinedContent.appendChild(clonedDiv);
        if (index < contenusDiv.length - 1) {
            var hr = document.createElement('hr');
            combinedContent.appendChild(hr);
        }
    });

    var contenuTelecharge = document.createElement('div');
    contenuTelecharge.classList.add('contenu-telecharge');
    var contenuWrapper = document.createElement('div');
    contenuWrapper.classList.add('wrapper');
    contenuWrapper.appendChild(combinedContent);
    contenuTelecharge.appendChild(contenuWrapper);
    document.body.appendChild(contenuTelecharge);

    var opt = {
        filename: 'document.pdf',
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'pt', format: 'a4', orientation: 'portrait' }
    };

    html2pdf().from(contenuTelecharge).set(opt).save().then(() => {
        document.body.removeChild(contenuTelecharge);
    });
});
</script>
  <style>
    *
{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin: 0px;
    padding: 0px;
}
.wrapper {
    width: 900px;
    margin-left: 130px;
    height: 800px;
}
.contenu-a-telecharger {
    width: 100%;
    height: 350%;
    margin-top: 70px;
    justify-content: center;
    background-color: #ffff;
    box-shadow: 0 0 8px 10px rgba(0, 0, 0, 0.2);
    
}
body {
    background-color: #cececc;
    width: 100%;
}
.republique h2  {
     text-align: center;
    align-items: center;
    justify-content: center;
    margin-left: 2.5%;
   font-size: 19px;
   margin-top:0px ;
    
    
}
.h22
{
    margin-left: 590px;
    margin-top: 25px;
}
.h2
{
    margin-top: 7%;
    margin-left: 40%;
}

.h222 h2
{
    margin-left: 380px;
    font-size: 20px;
    margin-top: 10px; 
}
hr {
    background-color: #3e3e3e;
    height: 3px;
    width: 600px;
    margin-left: 150px;
    margin-top: 6px;
}

h3 {
    margin-left: 300px;
    font-size: 19px;
}
.h3 {
    margin-left: 600px;
    font-size: 25px;
    margin-top: 30px;
}
.h33 h3
{
    margin-left: 500px;
    font-size: 18px;
    margin-top: 10px; 
   
}
.parag {
   
    width: 100%;
    justify-content: center;
    align-items: center;
    margin-top: 39px;
}
.parag h3
{
    font-size: 23px;
    margin-right: 185px;
    
  

}
.classe
{
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 20px;

}
.annaba  
{
margin-left: 190px;
margin-top: 27px;

}
 button
{
width: 160px;
height: 60px;
margin-top: 320px;
margin-left: 490px;
padding: 10px;
background-color:#019477;
border: none;
font-family: Verdana, Geneva, Tahoma, sans-serif;
color: #ffff;
border-radius: 7px;
}


  </style>


</body>
</html>
