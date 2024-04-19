<?php
    include_once "../base.php";
    include_once "../../model/pdo.php";
    include_once "../../model/role.php";
?>

<h1 class="text-center mt-3">Créer un utilisateur</h1>

<form id="form" class="form mx-auto" action="controller/user/create_user_ctrl.php" method="POST">

    <label for="last_name">Nom</label>
    <input class="form-control mb-3" type="text" name="last_name" id="last_name">

    <label for="first_name">Prenom</label>
    <input class="form-control mb-3" type="text" name="first_name" id="first_name">

    <label for="username">Identifiant (à utiliser pour se connecter)</label>
    <input class="form-control mb-3" type="text" name="username" id="username">

    <label for="password">Mot de passe</label>
    <input class="form-control mb-3" type="password" name="password" id="password">

    <label for="mail">Mail</label>
    <input class="form-control mb-3" type="text" name="mail" id="mail">

    <input class="form-control bg-primary border-0 my-2" type="submit" value="Ajouter">

</form>

</body>
</html>