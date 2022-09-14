<?php
    require_once './connect.php';
    $req = $db->query("SELECT `id_logement`, `ville`,  `adresse`, `disponibilite`, `nb_couchage`, `nb_pieces`, `prix`, `type_logement` FROM `info_logement` WHERE `disponibilite` = 'disponible'");
    echo json_encode($req->fetchAll(PDO::FETCH_ASSOC));
