
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pris en charge historique</title>
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
            top:20%;
            right:1%;
            width: 60%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }

        h1 {
            position:absolute;
            top:0;
            text-align: center;
            font-family: "Gill Sans Extrabold", sans-serif;
            margin-bottom: 20px;
            color:rgb(30,144,255);
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color:rgb(30,144,255);
        }
        tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #dddddd;
}


        .action-button,.action-button1 {
           
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
        .action-button{
        background-color:crimson;
        }
        .action-button1{
            background-color:blue;
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
            color: #0066b2;
            margin-top: 20px;
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
    <h1>Historique des pris en charge</h1>
<table id="professeursTable">
    <tr>
        <th>Nom</th>
        <th>Degré</th>
        <th>Wilaya</th>
        <th>Hébergement</th>
        <th>Restauration</th>
        <th>Invitation</th>
        <th>Actions</th> 
    </tr>
    <?php
    session_start();

    // Assuming you have a database connection already established
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulaire_professeurs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM professeurs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nom"] . "</td>";
            echo "<td>" . $row["degre"] . "</td>";
            echo "<td>" . $row["wilaya_name"] . "</td>";
            echo "<td>";
            if ($row["distance_to_annaba"] >= 300) {
                echo "<span class='green-check'>&#10004;</span>"; 
            } else {
                echo "<span class='non-check'>&#10006;</span>"; 
            }
            echo "</td>";
            echo "<td><span class='green-check'>&#10004;</span></td>";
            echo "<td>Ajouter un PDF ici</td>";
            echo "<td>";
            echo "<button class='action-button' onclick='supprimer(\"" . $row["id"] . "\")'>Supprimer</button>";
            echo "<a class='action-button1' href='consulter.php?id=" . $row["id"] . "'>Consulter</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>0 results</td></tr>";
    }
    
   
    $conn->close();
    ?>
</table>
<div class="diagram-container">
        <canvas id="certificatesChart" width="400" height="300"></canvas>
        <p>• Diagramme en bâtons représentant le nombre de prise en charge créées par wilaya</p>
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
            var date = table.rows[i].cells[2].innerText.trim();
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
                    label: "Nombre des fiche technique",
                    data: dates.map(function (date) {
                        return counts[date];
                    }),
                    backgroundColor: "rgb(30,144,255)",
                    borderColor: "rgba(54, 162, 235, 1)",
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
            fetch('deletHg.php', {
                method: 'POST',
                body: JSON.stringify({ id: id }),
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
</script>

</body>
</html>
