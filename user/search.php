<?php
//page ou il y a tous les gites//
    include_once '../connect/connect.php';
    require_once '../class/gite.php';


    if(isset($_GET['p'] )){
        $recherche = $_GET['p'];
        
    } 
    $req = $db->query("SELECT `id_logement`, `ville`,img FROM `info_logement`  WHERE `ville` LIKE '$recherche%'  ");
    
    
    $datas = [];
    while($data =  $req->fetch(PDO::FETCH_ASSOC)){
        $datas[] = new Gite($data);

    }
    
    require_once '../templates\header.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>

        <div class="ligne-horizontale">
            <h2 class="title">Nos gîtes</h2>
        </div>
    <section id="hebergement2">
<?php foreach($datas as $post){ ?>
    
        <article class="gite">
            <div class="img-gite">
            <img src="<?=$post->getImg()?>" alt="">
            </div>
            <div class="content-gite"><?= $post->getVille()?></div>
            <button class="btn-info"><a href="../page3.php?id=<?= $post->getId_logement()?>">Plus d'infos</a></button>
        </article>
<?php } ?>    
</section>
   <?php

         require_once '../templates\footer.php'; 
    ?>
    
</body>
</html>