<?php
    include_once "../../model/pdo.php";
    include_once "../../model/role.php";
    include_once "../base.php";

    $token = $_SESSION['token'];

    //var_dump("token : ", $token);

    if ($_SESSION['role'] >= Role::LOGGED->value){
        
        if(isset($_GET['id_user'])){
            $id = $_GET["id_user"];
            $sql = "SELECT * FROM user WHERE id_user=$id";
            $stmt = $pdo->query($sql);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }
?>
    <div class="readUser d-flex flex-column justify-content-center w-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-group">                    
                        <li class="list-group-item text-center my-2">Nom : <?= htmlentities($user['last_name']) ?></li>
                        <li class="list-group-item text-center my-2">Prenom : <?= htmlentities($user['first_name']) ?></li>
                        <li class="list-group-item text-center my-2">Identifiant : <?= htmlentities($user['username']) ?></li>
                        <li class="list-group-item text-center my-2">E-mail : <?= htmlentities($user['mail']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        <div class="d-flex justify-content-evenly">

            <button class="btn btn-primary rounded"><a class="text-light text-decoration-none" href="view/user/update_user.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>">Modifier le profil</a></button>
            <button class="btn btn-secondary rounded"><a class="text-light text-decoration-none" href="view/user/update_user_password.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>">Modifier le mot de passe</a></button>
            <button class="btn btn-info rounded"><a class="text-light text-decoration-none" href="view/user/update_avatar.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>">Modifier Avatar</a></button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">Supprimer le compte</button>

            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation de suppression de compte</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a class="btn btn-danger" href="controller/user/delete_user.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>&token=<?= $token ?>">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    
</body>
</html>