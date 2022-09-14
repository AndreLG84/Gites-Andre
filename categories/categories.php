<?php
    include_once '../connect/connect.php';
    require_once '../class/gite.php';
    include_once '../templates\header.php';
    
    if(isset($_GET['type'])){
        $type_logement = $_GET['type'];
        $req = $db->prepare("SELECT `id_logement`, `ville`, `type_logement`, nom_logement, img FROM `info_logement`  WHERE `type_logement` = :categorie");
        $datas = [];
        $req->bindParam(':categorie', $type_logement, PDO::PARAM_STR);
        $req->execute();
    }
    while($data =  $req->fetch(PDO::FETCH_ASSOC)){
        $datas[] = new Gite($data);
    } 
?>
<body>
    <main>
        <div class="ligne-horizontale">
            <h2 class="title">Besoin de vous évadez !</h2>
        </div>
    <section id="hebergement2">
    <?php foreach($datas as $gite){ ?>
    <article class="gite">
        <div class="img-gite">
        <img src="../templates/images/<?=$gite->getImg()?>" alt="">
        </div>
        <div class="content-gite"><?= $gite->getVille()?></div>
        <button class="btn-info"><a href="../page3.php?id=<?= $gite->getId_logement() ?>">Plus d'infos</a></button>
    </article>
    <?php } ?>    
   <?php
        require_once '../templates\footer.php'; 
    ?>