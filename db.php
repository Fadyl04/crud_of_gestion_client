<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=gestion_client", 'root', '');
        // Activer le mode d'erreur de PDO
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Afficher un message d'erreur si la connexion échoue
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }

?>