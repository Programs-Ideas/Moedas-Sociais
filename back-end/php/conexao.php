<?php 

$host = 'localhost';
$dbname = 'alunos_moedas_sociais';
$username = 'root';
$pass = '';

$conn = new mysqli($host, $username, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>