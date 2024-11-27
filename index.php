<?php
    require 'db.php';
    $req = $db->prepare('SELECT * FROM clients');
    $req->execute();

    if (!$req) {
        $errorInfo = $db->errorInfo();
        die("Invalid request: " . $errorInfo[2]);
    }
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>
            Listes des clients
        </h2><br>
        <a class="btn btn-primary" href="/gestion_client/create.php" role="button">Nouveau Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    while($row = $req->fetch()){
                        echo "
                            <tr>
                                <td>". htmlspecialchars($row['id'])."</td>
                                <td>". htmlspecialchars($row['name']) ."</td>
                                <td>". htmlspecialchars($row['email'])."</td>
                                <td>". htmlspecialchars($row['phone'])."</td>
                                <td>". htmlspecialchars($row['address']) ."</td>
                                <td>". $row['created_at'] ."</td>
                                <td class='text-center'>
                                    <a class='btn btn-primary btn-sm' href='/gestion_client/edit.php?id=" . htmlspecialchars($row['id']) . "'>Modifier</a>
                                    <a class='btn btn-danger btn-sm' href='/gestion_client/delete.php?id=" . htmlspecialchars($row['id']) . "'>Supprimer</a>
                                </td>
                            </tr>
                        ";
                    }

                    
                
                ?>
                
            </tbody>
        </table>
    </div>
</body>   
</html>