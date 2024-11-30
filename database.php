<?php
$dsn = 'mysql:host=localhost;dbname=profs;charset=utf8';
$username = 'root';
$password = '';

try {
    // Correcting the PDO instantiation
    $pdo = new PDO($dsn, $username, $password);
    
    // Setting the error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connexion réussie !"; // Optionnel: message de confirmation
    
} catch (PDOException $e) {
    // Handling the error and displaying the error message
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
