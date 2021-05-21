<?php
$servername = "localhost";
$username = "doubleks_263547_myshopadmin";
$password = "Q9QPN3VXRG";
$dbname = "doubleks_263547_myshop";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>