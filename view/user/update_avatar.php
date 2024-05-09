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

<h1 class="text-center my-3">Modifier son avatar</h1>

<?php
    if($_SESSION['name']){
        echo "<div class='text-center'><img class='p-0 m-0' src='$_SESSION[avatar]' alt='Avatar Profil Utilisateur/trice' width='20%'></div>";
    }
?>

<div class="text-center">
    <img id="preview" width="25%">
</div>


<form id="form" class="d-flex flex-column align-item-center justify-content-center w-50 mx-auto" action="controller/user/update_avatar_ctrl.php" enctype="multipart/form-data" method="POST">

    <label class="form-label" for="avatar">Changer votre Avatar <span><i>(Taille de fichier : max 1Mo)</i></span> :</label>
    <input class="form-control" type="file" name="avatar" id="inputAvatar">

    <input type="hidden" name="id_user" value="<?= htmlentities($user['id_user']) ?>">

    <input class="form-control my-3 btn btn-primary" type="submit" value="Modifier">

</form>

<script>
    document.body.style.overflowY = 'scroll';
    const inputAvatar = document.getElementById("inputAvatar")
    const preview = document.getElementById("preview")
    const fr = new FileReader();

    inputAvatar.addEventListener("change", function() {

        let file = inputAvatar.files[0]
        // console.log(inputAvatar.files[0]);

        fr.onloadend = function() {
            preview.src = fr.result;
        }

        if (file) {
            fr.readAsDataURL(file)
        }else {
            preview.src = "";
        }
    })
    // console.log("inputAvatar : ", inputAvatar);
</script>
</body>
</html>
<?php 
    }else{
        header("Location:../home/home.php");
    }
?>