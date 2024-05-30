<?php
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


// Retrieve ID of the record to be deleted from the POST request
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;

// Construct SQL DELETE query
$sql = "DELETE FROM bord WHERE id = $id";

// Execute query
if ($conn->query($sql) === TRUE) {
    // Deletion successful
    echo json_encode(array("message" => "Record deleted successfully"));
} else {
    // Deletion failed
    echo json_encode(array("error" => "Error deleting record: " . $conn->error));
}

// Close connection
$conn->close();
?>
