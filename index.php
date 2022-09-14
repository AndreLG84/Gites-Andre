
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gîtes Hub</title>
    <link rel="stylesheet" href="templates/css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">

</head>
<body>
<header class="main-header">
    <div class="en-tete">
      <figure>
        <a href="index.php"><img src="images/logoGITESHUB.png"></a>
      </figure>
      <nav id="main-menu">
        <ul>
          <li ><a href="#sticky">Destination</a></li>
          <li><a href="user\list-gite.php">Hébergements</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
    <h1 class="titre">Recherchez votre destination</h1>
</header>
<main class="first">
  <div class="lh-hide">
  <h2 class="hide" action="../gite4/user/newuser.php">Recherchez ici !</h2>
</div>
  <div class="sticky" id="sticky">
    <form class="form-inline" action="./categories/result.php">
      <label for="Lieux"></label>
      <input type="text" class="form" id="lieux" placeholder="Où?" maxlength="40"name="p" required>
      <label for="dates"></label>
      <input type="date"class="form" id="date" placeholder="Arrivée" name="date">
      <input type="date" id="date" class="form" placeholder="Départ" name="date">
      <label for="number"></label>
      <input type="number" id="number" class="form" name="number" placeholder="1 pers." min="1" max="16" value="1">
      <button type="submit" class="btn-sb">Cherchez</button>
    </form>
  </div>
</main>
<main class="img-form">
  <div class="ligne-horizontale">
    <h2 class="title" id="title">Vous hésitez?</h2>
  </div>
    <section id="type">
        <div class="container">
            <img src="templates\images\camping-bord-de-mer.jpg" alt="Avatar" class="image" style="width:100%">
            <div class="titre1"><h3>A la mer</h3></div>
            <div class="middle">
            <button class="btn1"><a href="./categories/categories.php?type=mer">C'est parti</a></button>
            </div>
        </div>
        <div class="container">
            <img src="templates\images\alpes-automne-hiver-mu.jpg" alt="Avatar" class="image" style="width:100%">
            <div class="titre1"><h3>A la montagne</h3></div>
            <div class="middle">
            <button class="btn1"><a href="./categories/categories.php?type=montagne">C'est parti</a></button>
            </div>
        </div>
        <div class="container">
            <img src="templates\images\vignoble_en_bourgogne.jpg" alt="Avatar" class="image" style="width:100%">
            <div class="titre1"><h3>A la campagne</h3></div>
            <div class="middle">
            <button class="btn1"><a href="./categories/categories.php?type=campagne">C'est parti</a></button>
            </div>
        </div>
    </section>
    <div class="ligne-horizontale">
      <h2 class="title">Nos gîtes disponibles</h2>
    </div>
    <section id="slider" class="slider">
      
          <div class="suivant"><i class="fa-solid fa-angle-right"></i></div>
          <div class="precedent"><i class="fa-solid fa-angle-left"></i></div>
  </section>
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
        <h6>Termes et conditions</h6><br>
        <p>Conditions générales <br> Protection de vos données<br>Mentions légales<br>Fonctionnement du site</p>
    </div>
    <div id="contact">
        <h6>Contactez-nous</h6> <br><br>
        <div><i class="fa-solid fa-phone"></i>  06.06.06.06.06</div> <br>
        <div><i class="fa-solid fa-envelope"></i> giteshub@gmail.com</div>
    </div>
    <figure>
        <a href="index.php"><img class="img-footer" src="templates\images\logoGITESHUB.png"></a>
    </figure>
</footer>
   <script src="templates\js\slide.js"></script>

</body>
</html>