<?php
    require 'db.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete = $db->prepare('DELETE FROM clients WHERE id = ?');
        $delete->execute(array($id));
        header('location:/gestion_client/index.php');
    }

?>