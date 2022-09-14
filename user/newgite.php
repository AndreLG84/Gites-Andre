<?php
    
    require_once '../connect.php';

     
    if(isset($_POST['submit'])) {
        
        $ville = $_POST['ville'];
        $type_logement = $_POST['type_logement'];
        $prix =$_POST['prix'];
        $nb_personne =$_POST['nb_personne'];
        $nb_pieces =$_POST['nb_pieces'];
     
        
        
        

        $subject = "Confirmation de  votre réservation - du : ".date("d/m/Y  à : H:i:s");
        $message = 'Votre réservation a été validée';
        $message2 = 'A bien été bien enregistré chez nous ';
        $message3 = 'A bientot dans nos gites' ;
        
        $req = $db->prepare("INSERT INTO `newgite`(`ville`, `type_logement`, `prix`,nb_personne, nb_pieces) VALUES (:ville, :type_logement, :prix , :nb_personne, :nb_pieces)");
        $req->bindParam(":ville", $ville, PDO::PARAM_STR);
        $req->bindParam(":type_logement", $type_logement, PDO::PARAM_STR);
        $req->bindParam(":prix", $prix, PDO::PARAM_STR);
        $req->bindParam(":nb_personne", $nb_personne, PDO::PARAM_STR);
        $req->bindParam(":nb_pieces", $nb_pieces, PDO::PARAM_STR);
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

<h1>Formulaire de réservation</h1>


<div>
    <?php if(isset($message)){?>
            <p class="invalid"><?='Bonjour , Mr/Mme , votre gite  à: ',$ville ,'<br>', 'pour prix de : ', $prix,' ', 'euros','<br>', '<br>', 'A la :',$type_logement,'<br>', $message2,'<br>', $message3 ?></p>
            
<?php }?>
<body>
    
        
       

   
    

   
  
