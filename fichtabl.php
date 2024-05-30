<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiches technique historique</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        table {
            position:absolute;
            top:30%;
            right:1%;
            width: 60%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            font-family: "Gill Sans Extrabold", sans-serif;
        }
         hr
         {
            position:absolute;
            top:85px;
            width: 270px;
            border:2px solid #019474;
          
            
         }
        h1 {
            position:absolute;
            top:0;
            text-align: center;
            font-family: "Gill Sans Extrabold", sans-serif;
            margin-bottom: 20px;
            color:#019477;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            font-weight:bold;
            font-weight:bold;
        }

        th {
            background-color:#019477;
            color:#fff;
            padding:20px 20px ; 

               
        }
        tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #dddddd;
}


        .action-button {
            background-color:crimson;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .action-button:hover {
            background-color: red;
        }

        .action-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.2);
        }

        .diagram-container {
            position: relative;
            width: 60%;
        }

        #certificatesChart {
            width: 100%;
            background-color: #f0f0f0;
        }

        p {
            text-align: center;
            font-family: "Gill Sans Extrabold", sans-serif;
            color: #3e3e5f;
            margin-top: 20px;
            font-weight:bold;
            font-weight:bold;
        }

        svg {
            position: absolute;
            cursor: pointer;
            left: 0;
            top: 0;
        }
        .diagram-container{
            position:absolute;
            bottom:15%;
            left:2%;
            width:30%;
        }
        .green-check {
            color: green;
            font-size:23px;
            
        }

        /* Style for non-check mark */
        .non-check {
            color: red;
            font-size:23px;
        }
       

    </style>
</head>
<body>
<div class="container">
     <a href='./document.php'>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
        </svg>
    </a>
    <h1>Historique des fiches technique</h1>
    <hr>

    <table id="professeursTable">
        <tr>
            <th>Nom d'enseignant</th>
            <th>Degré</th>
            <th>Université d'Origine</th>
            <th>N° Compte Courant</th>
            <th>Adresse de la Lettre</th>
            <th>Date de Discussion</th>
            <th>Total d'Heures</th>
            <th>Nom de candidat</th>
            <th>Action</th> 
        </tr>
        <?php
        // Démarrer la session
        session_start();

        // Connexion à la base de données
        $serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $base_de_donnees = "fichethec";

        $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

        // Vérifier la connexion
        if (!$connexion) {
            die("La connexion à la base de données a échoué : " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM thec";
        $result = $connexion->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["nom"]) ."</td>";
                echo "<td>" . htmlspecialchars($row["degrer"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["UnivOrg"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["NumCompt"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["AdrsLetter"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["DateDissc"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["totalheure"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Nomcondid"]) . "</td>";
                echo "<td>";
                echo "<button class='action-button' onclick='supprimer(\"" . htmlspecialchars($row["id"]) . "\")'>Supprimer</button>";
                echo "<button class='action-button1' onclick='consulter(\"" . $row["id"] . "\")'>Consulter</button>";

                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>0 résultats</td></tr>";
        }
        $connexion->close();
        ?>
    </table>
    <div class="diagram-container">
        <canvas id="certificatesChart" width="400" height="300"></canvas>
        <p>• Diagramme en bâtons représentant le nombre des fiches technique créées par jour</p>
       
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get data from the table
        var dates = [];
        var counts = {};
        var table = document.getElementById("professeursTable");
        for (var i = 1; i < table.rows.length; i++) {
            var date = table.rows[i].cells[6].innerText.trim();
            if (!dates.includes(date)) {
                dates.push(date);
                counts[date] = 1;
            } else {
                counts[date]++;
            }
        }
        // Create chart
        var ctx = document.getElementById("certificatesChart").getContext("2d");
        var certificatesChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: dates,
                datasets: [{
                    label: "Nombre des fiches techniques",
                    data: dates.map(function (date) {
                        return counts[date];
                    }),
                    backgroundColor: "#3e3e5f",
                    borderColor: "#3e3e5f",
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
    function supprimer(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette entrée ?")) {
        fetch('df.php', {
            method: 'POST',
            body: JSON.stringify({ id: id }), // Envoyer l'ID dans le corps de la requête
            headers: {
                'Content-Type': 'application/json'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
                location.reload();
            } else {
                console.error('Erreur :', data.error);
                alert(data.error);
            }
        })
        .catch(error => console.error('Erreur :', error));
    }
}
function consulter(id) {
        window.location.href = 'fichethec.php?id=' + id;
    }

</script>
</body>
</html>
