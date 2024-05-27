<?php
$servername = "10.22.22.145";
$username = "test"; // default XAMPP MySQL username
$password = "test"; // default XAMPP MySQL password
$dbname = "kundendatenbank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Interessent (Datum, Name, Email, Telefonnummer, Nachricht) VALUES (? , ? ,? ,? ,?)");
$stmt->bind_param("sssss", $Datum, $Name, $Email, $Telefonnummer, $Nachricht);

// Set parameters and execute
$Datum = $_POST['Datum'];
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Telefonnummer = $_POST['Telefonnummer'];
$Nachricht = $_POST['Nachricht'];
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>