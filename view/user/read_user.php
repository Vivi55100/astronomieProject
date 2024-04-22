<?php
    include_once "../../model/pdo.php";
    include_once "../../model/role.php";
    include_once "../base.php";

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
            <button class="btn btn-primary rounded"><a class="text-light text-decoration-none" href="view/user/update_user.php?id_user=<?= $_SESSION['id_user'] ?>">Modifier le profil</a></button>
            <button class="btn btn-secondary rounded"><a class="text-light text-decoration-none" href="view/user/update_user_password.php?id_user=<?= $_SESSION['id_user'] ?>">Modifier le mot de passe</a></button>
            <button class="btn btn-danger rounded"><a class="text-light text-decoration-none" href="controller/user/delete_user.php?id_user=<?= $_SESSION['id_user'] ?>">Supprimer le compte</a></button>
        </div>
    </div>
    

</body>
</html>