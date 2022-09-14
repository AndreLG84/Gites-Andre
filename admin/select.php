<?php
    require_once '../connect/connect.php';


        $gite = $db->query('SELECT `id_logement`, `ville`, `type_logement`, `disponibilite` FROM info_logement ORDER BY id_logement DESC');


        echo json_encode($gite->fetchAll(PDO::FETCH_ASSOC));