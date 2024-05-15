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
    <div class="readUserPage container-fluid">

        <div class="userInfoActions">

            <ul class="list-group align-items-center">
                <li class="text-center rounded">
                    <a class="btn text-decoration-none" href="view/user/update_avatar.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>" data-bs-toggle="tooltip" title="Modifier l'avatar">
                        <svg fill="yellow" xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="bi bi-file-image" viewBox="0 0 16 16">
                            <path d="M8.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v8l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12z"/>
                        </svg>
                    </a>                    
                    <img class="imgAvatar" src="<?= $_SESSION["avatar"] ?>" alt="Avatar Profil Utilisateur/trice">
                </li>
                <li>
                    <div class="userInfos">
                        <ul>
                            <li class="text-center">Nom : <?= htmlentities($user['last_name']) ?></li>
                            <li class="text-center">Prenom : <?= htmlentities($user['first_name']) ?></li>
                            <li class="text-center">Identifiant : <?= htmlentities($user['username']) ?></li>
                            <li class="text-center">E-mail : <?= htmlentities($user['mail']) ?></li>
                        </ul>
                    </div>
                </li>
            </ul>
            

            <div class="userActions d-flex justify-content-around">

                <div class="actions">
                    <a class="btn btn-primary rounded text-light text-decoration-none" href="view/user/update_user.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>" data-bs-toggle="tooltip" title="Modifier le profil">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </a>
                    <a class="btn btn-success rounded text-light text-decoration-none my-3" href="view/user/update_user_password.php?id_user=<?= htmlentities($_SESSION['id_user']) ?>" data-bs-toggle="tooltip" title="Modifier le mot de passe">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                            <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2M3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1z"/>
                        </svg>
                    </a>
                </div>

                <div class="userBtnDelete">

                    <div class="btnDelete ">
                        <button class="btn btn-danger rounded my-3" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                            </svg>
                        </button>
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
                                    <p>Contactez <span><a class="text-decoration-none" href="view/CGU/cguPage.php">l'administrateur</a></span>  pour récupérer votre compte.</p>                            
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
            
        </div>
        
    </div>
    
</body>
</html>
<?php
    }else{
        header("Location:../home/home.php");
    }
?>