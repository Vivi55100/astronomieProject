<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
?>

    <h1 class="text-center my-5">Formulaire de creation de Questions/Reponses</h1>

    <form class="form-control w-50 mx-auto" action="controller/admin/question/create_question_response_ctrl.php" method="POST">
        <label class="form-label" for="question">Questions</label>
        <input class="form-control mb-3" type="text" name="question">

        <label class="form-label" for="goodResponse">Bonnes reponses</label>
        <input class="form-control mb-3" type="text" name="goodResponse">

        <label class="form-label" for="badResponse">Mauvaise reponse </label>
        <input class="form-control mb-3" type="text" name="badResponse">

        <label class="form-label" for="badResponse2">Mauvaise reponse 2</label>
        <input class="form-control mb-3" type="text" name="badResponse2">

        <label class="form-label" for="badResponse3">Mauvaise reponse 3</label>
        <input class="form-control mb-3" type="text" name="badResponse3">

        <input class="form-control bg bg-primary text-light" type="submit" value="Créer une Question/Reponse">
    </form>

</body>
</html>
<?php
    }else{
        header("Location:../home/home.php");
    }
?>