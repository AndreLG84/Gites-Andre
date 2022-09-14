<?php
    
    require_once '../connect/connect.php';
    require_once '../class/gite.php';

    $id_logement = $_GET['id'];

    $req = $db->prepare ('SELECT `id_logement`, `nom_logement`, departement, adresse, `description`, nb_couchage, nb_pieces, prix, ville, img FROM `info_logement` WHERE `id_logement` = :id');
    $req->bindParam('id', $id_logement, PDO::PARAM_INT);
    $req->execute();
    $datas = [];
    while($data = $req->fetch(PDO::FETCH_ASSOC)){
        $datas[] = new Gite($data);
    }
    

    if(isset($_POST['submit'])) {
        
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email =$_POST['email'];
        $nb_personnes = $_POST['nb_personnes'];
        $num_tel =$_POST['num_tel'];
        
        
        

        $to = $email;
        $subject = "Confirmation de  votre réservation - du : ".date("d/m/Y  à : H:i:s");
        $message = 'Votre réservation a été validée';
        $message2 = 'Merci d\'avoir réservé chez nous ';
        $message3 = 'A bientot dans nos gites' ;
        
        $req = $db->prepare("INSERT INTO `reservation`(`lastname`, `firstname`, `email`, `nb_personnes`, `num_tel`) VALUES (:lastname, :firstname, :email, :nb_personnes,:num_tel)");
        $req->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $req->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->bindParam(":nb_personnes", $nb_personnes, PDO::PARAM_STR);
        $req->bindParam(":num_tel", $num_tel, PDO::PARAM_STR);
        

        $req->execute();

    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../templates\css\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
</head>
<body>
    <header class="main-header2">
        <div class="en-tete">
            <figure>
            <a href="../index.php"><img src="../templates/images/logoGITESHUB.png"></a>
            </figure>
            <nav id="main-menu">
                <ul>
                    <li><a href="../index.php">Destination</a></li>
                    <li><a href="./list-gite.php">Hébergements</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
<?php

foreach($datas as $gite){
    
?>
    <main class="infogite">
        <section class="infos">
            <div class="nom-gite"><?= $gite->getNom_logement()?></div>
            <div class="lieu-gite" >
                <h4><?= $gite->getVille()?></h4>
                <h4><?= $gite->getDepartement()?></h4>
                <h4><?= $gite->getPrix() . ' € ' ?></h4>
            </div>
            <figure class="img-gite2">
            <img src="../templates/images/<?=$gite->getImg()?>" alt="">
            </figure>
            <div class="description">
                <?= $gite->getDescription() ?>
            </div>
        </section>
<?php
    }
?>
        <aside class="formulaire2">
            <form action="valid-reserv.php" method="POST" class="reservation">
                <label for="dates"></label>
                <input type="date"class="form2" id="date" placeholder="Arrivée" name="date">
                <label for="dates"></label>
                <input type="date"class="form2" id="date" placeholder="Arrivée" name="date">
                <label for="name"></label>
                <input type="text" class="form2 form2-name" id="name" placeholder="votre nom" name="lastname">
                <label for="Prénom"></label>
                <input type="text" class="form2 form2-name" id="lastname" placeholder="votre prénom" name="firstname">
                <label for="name"></label>
                <input type="number" class="form2 form2-number" id="number" placeholder="Nombre de personnes" name="nb_personnes" placeholder="1 pers." min="1" max="16" value="1">
                <input type="email" class="form2" id="email" placeholder="votre email" name="email">
                <input type="tel" class="form2" id="tel" placeholder="votre telephone" name="num_tel" maxlength="10">
                <button type="submit" class="btn-submit" name="submit">Submit</button>
            </form>
        <aside>
            
    </main>
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
    <footer>
    <div class="contact">
        <h6>Termes et conditions</h6><br>
        <p>Conditions générales <br> Protection de vos données<br>Mentions légales<br>Fonctionnement du site</p>
    </div>
    <div id="contact">
        <h6>Contactez-nous</h6> <br><br>
        <div><i class="fa-solid fa-phone"></i>  06.06.06.06.06</div> <br>
        <div><i class="fa-solid fa-envelope"></i> giteshub@gmail.com</div>
    </div>
        <figure>
            <a href="../index.php"><img class="img-footer"src="../templates/images/logoGITESHUB.png"></a>
        </figure>
    </footer>
    <script src="main.js"></script>
</body>
</html>