<?php
    include_once "../../model/role.php";
    include_once "../base.php";
    include_once "../../model/pdo.php";
    
    if ($_SESSION['role'] == Role::ADMIN->value){
        if(isset($_GET['id_user'])){
            $id = $_GET["id_user"];
            $sql = "SELECT * FROM User WHERE id_user=$id";
            $stmt = $pdo->query($sql);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }    
?>

<h1 class="text-center mt-3">Modifier un utilisateur</h1>

<form id="form" class="mx-auto" action="../../controller/user/update_user_ctrl.php" method="POST">

<!-- utiliser le htmlentities lors de la recuperation des données -->

<label for="last_name">Nom</label>
<input class="form-control mb-3" type="text" name="last_name" value="<?= htmlentities($user['last_name'])?>">

<label for="first_name">Prenom</label>
<input class="form-control mb-3" type="text" name="first_name" value="<?= htmlentities($user['first_name'])?>">

<label for="username">Identifiant (vous sert a vous connecter)</label>
<input class="form-control mb-3" type="text" name="username" value="<?= htmlentities($user['username'])?>">

<label for="mail">E-mail</label>
<input class="form-control mb-3" type="text" name="mail" value="<?= htmlentities($user['mail'])?>">

<!-- Pour éviter que l'administrateur se mette un rôle inferieur -->

<?php if($user['role'] != Role::ADMIN->value){ ?>
<label for="role">Rôle</label>
<select class="form-control mb-3" name="role">
    <?php
        $roles = ["Visiteur", "Inscrit", "Administrateur"];
        foreach($roles as $index => $role){            
            if($index == $user['role']){
                echo "<option value='$index' selected>$role</option>";
            }else{
                echo "<option value='$index'>$role</option>";
            }            
        }
    ?>
</select>
<?php
    }else{
        echo '<input type="hidden" name="role" value=' . $user["role"] . '>';
    }
?>

<input type="hidden" name="id_user" value="<?= htmlentities($user['id_user']) ?>">
<!-- <input type="hidden" name="page" value="< ?= htmlentities($_GET['page']) ?>"> -->

<input class="form-control mt-3" type="submit" value="Modifier">

</form>


</body>
</html>
<?php 
    }else{
        header("Location:../home/home.php");
    }
?>