<?php 
    include_once "../base.php";
?>
<h1 class="text-center mt-5 mb-5">Changement de mot de passe</h1>

<div id="message_psw" class="text-center"></div>

    <form id="form" action="../../controller/user/update_user_password_ctrl.php" class="mx-auto col-6" method="POST">

        <label for="oldpsw">Mot de passe actuel</label>
        <input class="form-control my-3" type="password" name="oldpsw" placeholder="Veuillez renseigner votre Mot de passe actuel">

        <label for="newpsw">Nouveau Mot de passe</label>
        <input class="form-control my-3" type="password" name="newpsw" placeholder="Veuillez renseigner votre nouveau Mot de passe">
        
        <input type="hidden" name="id_user" value="<?= htmlentities($_GET['id_user']) ?>">

        <input type="submit" class="form-control btn btn-secondary mt-3" value="Changer le mot de passe">

    </form>
</body>
</html>