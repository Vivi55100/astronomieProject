<?php
    include_once "../base.php";
    include_once "../../model/pdo.php";
    include_once "../../model/role.php";

    include_once "../alert.php";
?>

<div class="createUserPage">
    <h1 class="text-center my-5">Inscription</h1>

    <form id="form" action="controller/user/create_user_ctrl.php" method="POST">

        <label class="form-label" for="last_name">Nom</label>
        <input class="form-control mb-3" type="text" name="last_name" id="last_name">

        <label class="form-label" for="first_name">Prenom</label>
        <input class="form-control mb-3" type="text" name="first_name" id="first_name">

        <label class="form-label" for="username">Identifiant (à utiliser pour se connecter)</label>
        <input class="form-control mb-3" type="text" name="username" id="username">

        <label class="form-label" for="password">Mot de passe</label>
        <input class="form-control mb-3" type="password" name="password" id="password">

        <label class="form-label" for="mail">Mail</label>
        <input class="form-control mb-3" type="text" name="mail" id="mail">

        <input class="form-control bg-primary my-2 text-light" type="submit" value="S'inscrire">

    </form>
</div>

</body>
</html>