<?php
    
    require_once '../connect/connect.php';

     
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
</head>
<body>
    <div>
    <?php if(isset($message)){?>
            <p class="invalid"><?='Bonjour , Mr/Mme :',$firstname ,'<br>',$subject,'<br>', '<br>',$message,'<br>', $message2,'<br>', $message3 ?></p>
            
<?php }?>
    <button><a href="../index.php"> Retour à l'accueil</a></button>
<body>

      
    </div>
</body>
</html>