<?php
    include_once "../../model/role.php";
    include_once "../base.php";
    include_once "../../model/pdo.php";
    
    if ($_SESSION['role'] >= Role::LOGGED->value){
        if(isset($_GET['id_user'])){
            $id = $_GET["id_user"];
            $sql = "SELECT * FROM user WHERE id_user=$id";
            $stmt = $pdo->query($sql);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }    
?>

<h1 class="text-center mb-5">Modifier un utilisateur</h1>

<form id="form" class="mx-auto" action="controller/user/update_user_ctrl.php" enctype="multipart/form-data" method="POST">

    <!-- Utiliser le htmlentities lors de la recuperation des données -->

    <label for="last_name">Nom</label>
    <input class="form-control mb-3" type="text" name="last_name" value="<?= htmlentities($user['last_name']) ?>">

    <label for="first_name">Prenom</label>
    <input class="form-control mb-3" type="text" name="first_name" value="<?= htmlentities($user['first_name']) ?>">

    <label for="username">Identifiant (vous sert a vous connecter)</label>
    <input class="form-control mb-3" type="text" name="username" value="<?= htmlentities($user['username']) ?>">

    <label for="mail">E-mail</label>
    <input class="form-control mb-3" type="text" name="mail" value="<?= htmlentities($user['mail']) ?>">

    <label for="avatar">Avatar</label>
    <input class="form-control mb-3" type="file" name="avatar">

    <input type="hidden" name="id_user" value="<?= htmlentities($user['id_user']) ?>">

    <input class="form-control mt-3" type="submit" value="Modifier">

</form>


</body>
</html>
<?php 
    }else{
        header("Location:../home/home.php");
    }
?>