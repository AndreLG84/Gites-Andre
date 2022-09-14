<?php

session_start();

if (!isset($_SESSION['userId'])) {
    header('Location: index.php');
}

include_once '../templates/header-admin.php';
?>
<br><br><br>

<div class="container col-9">
    <h1 class="my-3 fs-1">Tous les gîtes</h1>
    <p class="fs-5">Vous avez actuellement <kbd id="nb-posts">X</kbd> gîtes en base. </p>

    <div class="row px-2">
        <a href="add-gite.php" class="btn btn-outline-success col-2">Entrer un nouveau gîte</a>
    </div>

    <ul class="list-group p-5" id="list-gite">

    </ul>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Supprimer le gîte ?</h4>
            </div>
            <div class="modal-body">
                <p>Toute suppression est définitive...</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="closeBtn">Annuler</button>
                <button class="btn btn-danger" id="deleteBtn">Supprimer</button>
            </div>
        </div>
    </div>
</div>
<script src="../templates/js/post.js"></script>
</body>
</html>