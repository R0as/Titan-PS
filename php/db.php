<!-- arquivo que faz a conexão com o banco de dados -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "titanTeste";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>