<?php 
$id = $_POST['id_logement'];

require_once '../connect/connect.php';
    
$delete = $db->prepare("DELETE FROM `info_logement` WHERE id_logement = :id");
$delete->bindParam('id', $id, PDO::PARAM_INT); //requete
$delete->execute();

echo 'Le gite a été supprimé';