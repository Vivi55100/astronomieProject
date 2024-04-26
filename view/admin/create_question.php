<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
?>

    <h1 class="text-center my-5">Formulaire de creation de questions</h1>

    <form class="form-control w-50 mx-auto" action="controller/admin/question/create_question_ctrl.php" method="POST">
        <label class="form-label" for="question">Creation de questions</label>
        <input class="form-control mb-3" type="text" name="question">

        <input class="form-control bg bg-primary text-light" type="submit" value="Créer une question">
    </form>

</body>
</html>
<?php
    }else{
        header("Location:../home/home.php");
    }
?>