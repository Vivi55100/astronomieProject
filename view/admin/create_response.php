<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
?>

    <h1 class="text-center my-5">Formulaire de creation de reponses</h1>

    <form class="form-control w-50 mx-auto" action="controller/admin/create_response_ctrl.php" method="POST">
        <label class="form-label" for="response">Creation de reponses</label>
        <input class="form-control mb-3" type="text" name="response">

        <input class="form-control bg bg-primary text-light" type="submit" value="Créer une reponse">
    </form>

</body>
</html>
<?php
    }else{
        header("Location:../home/home.php");
    }
?>