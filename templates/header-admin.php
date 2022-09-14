<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../templates/css/style-admin.css" rel="stylesheet">
    <title>Gîtes Hub | Administration</title>
</head>
<body>
<?php 
    $page = basename($_SERVER['REQUEST_URI']);
?>
<div class="d-flex">
    <div class="cont main-menu bg-success bg-gradient col-2">
   <a href="dashboard.php"> <img src="../templates\images\logoGITESHUB.png" class="figure-img img-fluid" alt="Logo Gîtes Hub"></a>
        

        <nav id="menu">
            <ul class="nav-pills px-3">
                <li class="nav-item my-2">
                    <a class="nav-link fs-2" aria-current="page" href="../admin\dashboard.php">Nos gîtes</a>
                </li>
            </ul>
        </nav>
    </div>