<?php
//page de connexion//
session_start();

require_once '../connect/connect.php';
require_once '../templates/header2.php';

if(isset($_POST['login'])){
    
    $login = $_POST['login']; 
    $mdp = $_POST['mdp'];

    $req = $db->prepare('SELECT `id_user` , `login` , `mdp` FROM  `users` WHERE `login` = :loginF');
    $req->bindParam('loginF' , $login , PDO::PARAM_STR);
    $req->execute();
    var_dump($req);
    $log = $req->fetch(PDO::FETCH_ASSOC);
    if($req->rowCount() > 0 && $log['mdp'] == $mdp){ 
        $_SESSION['userId'] = $log['id_user'];
        header('Location: dashboard.php');
    
    }else{ 
        $message = 'Erreur login/password';
    }
   
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitesHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <section class="col-xxl-4 offset-xxl-4 p-5">
        <h1 class="text-center mt-5 mb-3 fs-1">Veuillez vous connecter</h1>
   <form action="#" method="POST">
       <?php if(isset($message)){ ?>
            <p class="invalid"><?=$message ?> </p>
       <?php } ?>

    <div id="connexion" class="border border-success rounded-3 p-5">
        <label for="login" class="label-form fs-3">Login</label>
        <input type="text" name="login" id="login" class="form-control" required>

        <br><br>

        <label for="mdp" class="fs-3">Password</label>
        <input type="password" name="mdp" id="mdp" class="form-control" required>

        <br><br>

        <button type="submit" name ="submit" class="btn btn-success col-6">Enter</button>
    </section>

    </form>
</div>
</body>
</html>