<?php

    require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address']; 

        $errorMessage = "";

        do{
            if (empty($name) || empty($email) || empty($phone) || empty($address)) {
                $errorMessage = "Tous les champs ne sont pas remplis " ;
                break;
            }
            $create = $db->prepare('INSERT INTO clients(name, email, phone, address) VALUES(?, ?, ?, ?)');
            $create->execute(array($name, $email, $phone, $address));
            if (!$create) {
                $errorMessage = 'requeste invalide';
                break;
            }
            $succesMessage = "Ajoutez avec sucess";

            header('location:/gestion_client/index.php');
            exit;

        }while(false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
        
    </script>
    <title>gestion des clients</title>
</head>
<body>
    <div class="container my-5">
        <h2>Nouveau client</h2>
        <?php
            if (!empty($errorMessage)) {
                echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            }
         
        ?>
        <form action="" method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-from-label">Nom & Prénom</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="" class="form-control" >
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-from-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" id="" class="form-control" >
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-from-label">Téléphone</label>
                <div class="col-sm-6">
                    <input type="tel" name="phone" id="" class="form-control" >
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-from-label">Adresse</label>
                <div class="col-sm-6">
                    <input type="text" name="address" id="" class="form-control" >
                </div>
            </div>

            <?php
                if (!empty($succesMessage)) {
                    
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" name="add">AJOUTER</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/gestion_client/index.php" role="button">ANNULER</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>