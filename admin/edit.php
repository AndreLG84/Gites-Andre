<?php
    
    require_once '../connect/connect.php';
    require_once '../templates/header-admin.php';

     
    if(isset($_POST['submit'])) {
        
        $ville = $_POST['ville'];
        $adresse = $_POST['adresse'];
        $disponibilite = $_POST['disponibilite'];
        $nb_couchage =$_POST['nb_couchage'];
        $nb_pieces = $_POST['nb_pieces'];
        $prix = $_POST['prix'];
        $type_logement = $_POST['type_logement'];
        $nom_logement = $_POST['nom_logement'];
        
        
     
        
        
        

      
        
        $req = $db->prepare("INSERT INTO `info_logement`(`ville`, `adresse`, `disponibilite`,`nb_couchage`, `nb_pieces`, `prix`, `type_logement`, `nom_logement`) VALUES (:ville, :adresse, :disponibilite, :nb_couchage, :nb_pieces, :prix, :type_logement, :nom_logement  )");
        $req->bindParam(":ville", $ville, PDO::PARAM_STR);
        $req->bindParam(":adresse", $adresse, PDO::PARAM_STR);
        $req->bindParam(":disponibilite",$disponibilite, PDO::PARAM_STR);
        $req->bindParam(":nb_couchage", $nb_couchage, PDO::PARAM_STR);
        $req->bindParam(":nb_pieces", $nb_pieces, PDO::PARAM_STR);
        $req->bindParam(":prix", $prix, PDO::PARAM_STR);
        $req->bindParam(":type_logement", $type_logement, PDO::PARAM_STR);
        $req->bindParam(":nom_logement", $nom_logement, PDO::PARAM_STR);
        $req->execute();
    }    
    
?>    
     
     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<div>
<h1 class="text-center">Modifier le gite</h1>


<form action="#" method="POST" class="text-center">
    
        <label for="ville">Ville : </label>
        <input type="text" name="ville" id="value" required>
        <br><br>
        <label for="adresse">adresse : </label>
        <input type="text" name="adresse" id="value" required>
        <br><br>
        <label for="disponibilite">disponibilite : </label>
        <input type="text" name="disponibilite" id="value" required>
        <br><br>
        <label for="nb_couchage">Nombre de couchage : </label>
        <input type="text" name="nb_couchage" id="value" required>
        <br><br>
        <label for="nb_pieces">Nombre de pieces : </label>
        <input type="text" name="nb_pieces" id="value" required>
        <br><br>
        <label for="prix">Prix : </label>
        <input type="text" name="prix" id="value" required>
        <br><br>
        <label for="type_logement">Type de logement : </label>
        <input type="text" name="type_logement" id="value" required>
        <br><br>
        <label for="nom_logement">Nom de logement : </label>
        <input type="text" name="nom_logement" id="value" required>
        <br><br>
        
      
        <input type="submit" name="submit">
       
 </form></div>
</body>
</html>