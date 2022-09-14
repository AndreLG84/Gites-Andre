<?php
//page ou il y a tous les gites//
    include_once '../connect.php';
    require_once '../class/booked.php';

   
  
     
   
        
    $req = $db->query("SELECT  `nb_personne`, `dispo`, `type_logement` FROM `booked`; ");
     $datas = [];
    
        while($data =  $req->fetch(PDO::FETCH_ASSOC)){
            $datas[] = new Book($data);
            
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
    
<?php foreach($datas as $book){ ?>
    <div class="Gites">
        
        <h1><?= $book->getDatedeb()?></h1>
        <h1><?= $book->getDatefin()?></h1>
        <h1><?= $book->getNb_personne() ?></h1>
        
        <img src="../images/villasud.jpg" width="400px" alt="villa1">
      
        <br><br>
    </div>
<?php } ?>  
<?php foreach($datas as $book){ ?>
    <div class="Gites">
        
        <h1><?= $book->getDatedeb()?></h1>
        <h1><?= $book->getDatefin()?></h1>
        <h1><?= $book->getNb_personne()?></h1>
        
        <img src="../images/villa2.jpg" width="400px" alt="villa2">
      
        <br><br>
    </div>
<?php } ?>  
   
</body>
</html>


    
        
       

   
    

   
  
