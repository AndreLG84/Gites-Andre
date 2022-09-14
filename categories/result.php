
<?php
//page ou il y a tous les gites//
include_once '../connect/connect.php';
    require_once '../class/gite.php';
    
    if(isset($_GET['p'] )){
        $recherche = $_GET['p'];
    } 
    $req = $db->query("SELECT `ville` , img, id_logement FROM `info_logement`  WHERE `ville` LIKE '$recherche%'  ");
    
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
    <title>Gîtes Hub</title>
    <link rel="stylesheet" href="../templates/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">

</head>
<body>
  <div class="scroll-container">
<header class="main-header">
    <div class="en-tete">
      <figure>
      <a href="../index.php"><img src="../templates\images\logoGITESHUB.png"></a>
      </figure>
      <nav id="main-menu">
        <ul>
          <li ><a href="../index.php">Destination</a></li>
          <li><a href="../user\list-gite.php">Hébergements</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
    <h1 class="titre">Recherchez votre destination</h1>
</header>
   <main>
        <div class="ligne-horizontale">
            <h2 class="title">Besoin de vous évadez !</h2>
        </div>
    <section id="hebergement2">
    <?php foreach($datas as $gite){ ?>
        <article class="gite">
            <div class="img-gite">
            <img src='../templates/images/<?= $gite->getImg() ?>' width="100%" alt="">
            </div>
            <div class="content-gite"><?= $gite->getVille()?></div>
            <button class="btn-info"><a href="../page3.php?id=<?= $gite->getId_logement() ?>">Plus d'infos</a></button>
        </article>
    <?php } ?>    

    <div class="ligne-horizontale">
    <h2 class="title_h2">L'engagement qualité et sécurité du label GîtesHub</h2>
  </div>
  <div class="wrapper_qual">
    <div class="wrapper_info">
    <i class="fa-solid fa-circle-check"></i>
    <h5>Tous nos logements sont verifiés et controlés par nos experts</h5> <br>
    <p>Hébergements revisités tous les 5 ans</p>
    </div>
    <div class="wrapper_info">
    <i class="fa-solid fa-window-restore"></i>
    <h5>Annonces,photos et descriptifs réalisés ou validés par nos équipes</h5> <br>
    <p>Tout est clair et sans surprises ! <br> Avec des avis fiables. </p>
    </div>
    <div class="wrapper_info">
    <i class="fa-solid fa-house-chimney"></i>
    <h5>Assurance annulation </h5> <br> 
    <p>Vous êtes couverts avec <br> ou sans justificatifs.</p>
    </div>
    <div class="wrapper_info">
    <i class="fa-solid fa-headset"></i> 
    <h5>Notre Service Réservation est basé à Ambérieu-en-Bugey</h5> <br>
    <p>100% local - 100% connaissance <br> des hébergements</p>
    </div>
  </div>
  </main>
<footer>
    <div class="contact">
        <p>Termes et conditions</p><br>
        <p>Conditions générales <br> Protection de vos données<br>Mentions légales<br>Fonctionnement du site</p>
    </div>
    <div id="contact">
        <p>CONTACTEZ-NOUS</p> <br><br>
        <div><i class="fa-solid fa-phone"></i>  06.06.06.06.06</div> <br>
        <div><i class="fa-solid fa-envelope"></i> giteshub@gmail.com</div>
    </div>
    <figure>
        <a href="../index.php"><img class="img-footer" src="../templates/images\logoGITESHUB.png"></a>
    </figure>
</footer>
</body>
</html>