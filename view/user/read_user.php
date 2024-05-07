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
    <div class="readUserPage container-fluid d-flex flex-column w-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-group align-items-center">                    
                        <li class="list-group-item text-center rounded">Nom : <?= htmlentities($user['last_name']) ?></li>
                        <li class="list-group-item text-center rounded">Prenom : <?= htmlentities($user['first_name']) ?></li>
                        <li class="list-group-item text-center rounded">Identifiant : <?= htmlentities($user['username']) ?></li>
                        <li class="list-group-item text-center rounded">E-mail : <?= htmlentities($user['mail']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        <div class="userBtnActions">

            <a class="btn btn-primary rounded text-light text-decoration-none" href="view/user/update_user.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>">Modifier le profil</a>
            <a class="btn btn-success rounded text-light text-decoration-none" href="view/user/update_user_password.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>">Modifier le mot de passe</a>
            <a class="btn btn-warning rounded text-light text-decoration-none" href="view/user/update_avatar.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>">Modifier Avatar</a>

            <div class="btnDelete">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">Supprimer le compte</button>
            </div>

            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation de la suppression de votre compte</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p>Êtes-vous sûr(e) de vouloir supprimer votre compte ? Cette action est réversible.</p>
                            <p>Contactez <span><a class="text-decoration-none" href="#">l'administrateur</a></span>  pour récupérer votre compte.</p>                            
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