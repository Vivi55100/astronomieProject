<?php
    include_once "../../model/pdo.php";
    include_once "../../model/role.php";
    include_once "../base.php";

    if ($_SESSION['role'] == Role::ADMIN->value){
        if(isset($_GET['id_user'])){
            $id = $_GET["id_user"];
            $sql = "SELECT * FROM User WHERE id_user=$id";
            $stmt = $pdo->query($sql);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }
?>
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
<div class="d-flex justify-content-center">
    <button class="btn btn-primary rounded"><a class="text-light text-decoration-none" href="update_user.php">Modifier le profil</a></button>
</div>




</body>
</html>