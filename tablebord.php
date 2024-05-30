<?php
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
        // Check the distance and display the appropriate symbol
        if ($row["distance_to_annaba"] >= 300) {
            echo "<span class='green-check'>&#10004;</span>"; 
        } else {
            echo "<span class='non-check'>&#10006;</span>"; 
        }
        echo "</td>";
        echo "<td> <span class='green-check'>&#10004;</span> </td>";
        echo "<td>";
   
        if (!empty($_GET['file'])) {
            $file_base64 = $_GET['file'];
            $file_name = 'invitation.pdf';
        
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $file_name . '"');
            header('Content-Length: ' . strlen(base64_decode($file_base64)));
            echo base64_decode($file_base64);
            exit;
        } else {
            echo " ";
        }
        
        if (!empty($row["invitation"])) {
            $file_base64 = urlencode($row["invitation"]);
            echo "<a href='" . $file_base64 . "'> Voir le PDF</a>";
        } else {
            echo "Pas d'invitation";
        } 
      
       
    

        

        echo "</td>"; 
        
    
        
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>0 results</td></tr>";
}

$conn->close(); ?>