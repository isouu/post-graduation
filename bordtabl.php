<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bordereau d'envoi historique</title>
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
            width: 500px;
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
        .action-button1
        {
            background-color:#20B2AA	;
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
        .button 
        {
            display :flex;
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
    <h1>Historique des Bordereaux d'envoi historique</h1>
    <hr>

    <table id="bordTable">
        <tr>
            <th>Type de bordereaux</th>
            <th>Documents</th>
            <th>Numéro</th>
            <th>Remarque</th>
            <th>Date d'arrive</th>
            <th>Action</th>
        </tr>
        <?php
      

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

        $sql = "SELECT * FROM bord";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["type_bordereau"] . "</td>";
                echo"<td>".   $row["documents"]. "</td>";
                echo "<td>" . $row["numero"] . "</td>";
                echo "<td>" . $row["remarque"] . "</td>";
                echo "<td>" . $row["date_arrivee"] . "</td>";
                echo "<td class='button'>";
                echo "<button class='action-button' onclick='supprimer(\"" . $row["id"] . "\")'>Supprimer</button>";

                echo "<button class='action-button1' onclick='consulter(\"" . $row["id"] . "\")'>Consulter</button>";

                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>"; // Modified colspan to 6
        }

        $conn->close();
        ?>
    </table>
    <div class="diagram-container">
        <canvas id="certificatesChart" width="400" height="300"></canvas>
        <p>• Diagramme en bâtons représentant le nombre des Bordereau d'envoi créées par jour</p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get data from the table
        var dates = [];
        var counts = {};
        var table = document.getElementById("bordTable"); // Modified table ID
        for (var i = 1; i < table.rows.length; i++) {
            var date = table.rows[i].cells[4].innerText.trim(); // Modified cell index
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
                    label: "Nombre des borderaux d'envoi",
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
            fetch('deletbord.php', {
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
    
    function consulter(id) {
        window.location.href = 'bordoreau.php?id=' + id;
    }

</script>
</body>
</html>
