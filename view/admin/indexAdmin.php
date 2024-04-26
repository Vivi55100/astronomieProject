<?php
    include_once "../base.php";
    
    if(isset($_SESSION["role"]) && ($_SESSION["role"]) == Role::ADMIN->value){
?>

<div class="admin d-flex flex-column">

    <h1 class="text-center my-3">Gestion par l'Admin</h1>

    <div class="quiz my-3">
        <h2>Gestion Quiz</h2>
        <a href="view/admin/indexQuiz.php">Index Quiz</a>
    </div>

    <div class="question my-3">
        <h2>Gestion Questions</h2>
        <a href="view/admin/indexQuestion.php">Index Questions</a>
    </div>

    <div class="response my-3">
        <h2>Gestion Responses</h2>
        <a href="view/admin/indexResponse.php">Index Responses</a>
    </div>

    <div class="user my-3">
        <h2>Gestion Users</h2>
        <a href="view/admin/indexUser.php">Index Utilisateurs</a>
    </div>

    <div class="astre my-3">
        <h2>Gestion Astres</h2>
        <a href="view/admin/indexAstre.php">Index Astres</a>
    </div>

    <div class="proposition my-3">
        <h2>Gestion Propositions</h2>
        <a href="view/admin/indexProposition.php">Index Propositions</a>
    </div>

    <div class="comment my-3">
        <h2>Gestion Commentaires</h2>
        <a href="view/admin/indexCommentary.php">Index Commentaires (axe d'ameliorations)</a>
    </div>

</div>

<?php
    }else{
       header("Location:../home/home.php"); // renvoie un utlisateur qui chercherai à acceder à cette page en tapant le chemin d'acces dans l'url
    }
?>
</body>
</html>
<!-- http://localhost/astronomieProject/view/admin/indexAdmin.php -->
<!-- http://localhost/astronomieProject/view/admin/indexUser.php -->