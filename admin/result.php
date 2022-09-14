<?php
//page ou il y a tous les gites//
    include_once 'connect/connect.php';
    require_once '../class/gite.php';

    if(isset($_GET['p'] )){
        $recherche = $_GET['p'];
        
    } 
    $req = $db->query("SELECT `ville` FROM `info_logement`  WHERE `ville` LIKE '$recherche%'  ");
    
    
    $datas = [];
    while($data =  $req->fetch(PDO::FETCH_ASSOC)){
        $datas[] = new Gite($data);

    }
    
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

    <h2> <?= 'Vous recherchez un gite à :'?></h2>
    <h2> <?= $recherche?></h2>
    <br><br><br>
    <h2> <?= 'Voici la liste des gites suceptibles de vous interesser à :'  ?></h2>
<?php foreach($datas as $post){ ?>
        <h2> <?= $post->getVille() ?></h2> 
        <h2> <?= $post->getAdresse() ?></h2>
        <img src="../templates\images\villa2.jpg" width="50%" alt="">
<?php } ?>        
        

        
    
</body>
</html>    