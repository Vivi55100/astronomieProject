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
                        <li class="text-center rounded">
                            <img class="p-0 m-0" src="<?= $_SESSION["avatar"] ?>" alt="Avatar Profil Utilisateur/trice">
                            <a class="btn text-light text-decoration-none p-0 m-0" href="view/user/update_avatar.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-file-image" viewBox="0 0 16 16">
                                    <path d="M8.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v8l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="text-center rounded">Nom : <?= htmlentities($user['last_name']) ?></li>
                        <li class="text-center rounded">Prenom : <?= htmlentities($user['first_name']) ?></li>
                        <li class="text-center rounded">Identifiant : <?= htmlentities($user['username']) ?></li>
                        <li class="text-center rounded">E-mail : <?= htmlentities($user['mail']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        <div class="userBtnActions mt-3">

            <a class="btn btn-primary rounded text-light text-decoration-none my-3" href="view/user/update_user.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>">Modifier le profil</a>
            <a class="btn btn-success rounded text-light text-decoration-none my-3" href="view/user/update_user_password.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>">Modifier le mot de passe</a>

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