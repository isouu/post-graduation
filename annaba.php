<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = ""; // Assuming empty password
    $dbname = "formulaire_professeurs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement for insertion
    $stmt = $conn->prepare("INSERT INTO professeurs (nom, degre, lieu_travail, wilaya_name, date, distance_to_annaba, invitation, Matricule) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssdsss", $nom, $degre, $lieu_travail, $wilaya, $date, $distance_to_annaba, $invitation, $Matricule);

    // Variable to decide redirection
    $redirectToHome = true;

    // Loop through each form
    for ($i = 1; $i <= 6; $i++) {
        // Retrieve form data
        $nom = isset($_POST["nom$i"]) ? $_POST["nom$i"] : '';
        $degre = isset($_POST["degre$i"]) ? $_POST["degre$i"] : '';
        $lieu_travail = isset($_POST["lieu_travail$i"]) ? $_POST["lieu_travail$i"] : '';
        $wilaya = isset($_POST["wilaya_name$i"]) ? $_POST["wilaya_name$i"] : '';
        $date = isset($_POST["date$i"]) ? $_POST["date$i"] : '';
        $Matricule = isset($_POST["Matricule$i"]) ? $_POST["Matricule$i"] : '';
        $invitation = isset($_POST["invitation$i"]) ? $_POST["invitation$i"] : '';

        // Format the date to YYYY-MM-DD
        if (!empty($date)) {
            $date = date('Y-m-d', strtotime($date));
        }

        // Check if all fields are filled
        if (!empty($nom) && !empty($degre) && !empty($lieu_travail) && !empty($wilaya) && !empty($date) && !empty($Matricule) && !empty($invitation)) {
            // Get distance to Annaba for selected wilaya
            $distance_query = "SELECT distance_to_annaba FROM wilayas WHERE wilaya_name = ?";
            $stmt_distance = $conn->prepare($distance_query);
            $stmt_distance->bind_param("s", $wilaya);
            $stmt_distance->execute();
            $result = $stmt_distance->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $distance_to_annaba = $row["distance_to_annaba"];
            } else {
                // Default distance if not found
                $distance_to_annaba = 0;
            }
            $stmt_distance->close();

            // Insert data into the database
            if ($stmt->execute()) {
                echo "Form $i data inserted successfully.<br>";
            } else {
                echo "Error inserting data for Form $i: " . $stmt->error . "<br>";
            }

            // Set session variables for each form
            $_SESSION["nom_$i"] = $nom;
            $_SESSION["degre_$i"] = $degre;
            $_SESSION["lieu_travail_$i"] = $lieu_travail;
            $_SESSION["wilaya_$i"] = $wilaya;
            $_SESSION["date_$i"] = $date;
            $_SESSION["invitation_$i"] = $invitation;
            $_SESSION["Matricule_$i"] = $Matricule;
            $_SESSION["distance_to_annaba_$i"] = $distance_to_annaba; // Store the distance in session
        } else {
            echo "Form $i not completely filled.<br>";
        }
    }

    $stmt->close();
    $conn->close();

    header("Location: " . ($redirectToHome ? "home.php" : "food.php"));
    exit();
}
?>
