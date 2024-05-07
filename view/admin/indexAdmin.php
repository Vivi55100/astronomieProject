<?php
    include_once "../base.php";
    
    if(isset($_SESSION["role"]) && ($_SESSION["role"]) == Role::ADMIN->value){
?>

<div class="indexAdmin d-flex flex-column">

    <h1 class="text-center my-3">Gestion par l'Admin</h1>

    <div class="quiz my-3">
        <h2>Gestion Quiz</h2>
        <div class="d-flex flex-column">
            <a class="text-decoration-none" href="view/admin/indexQuiz.php">Index Quiz</a>
            <a class="text-decoration-none" href="view/admin/create_quiz.php">Creation de Quiz</a>
        </div>
    </div>

    <div class="question my-3">
        <h2>Gestion Questions/Reponses</h2>
        <div class="d-flex flex-column">
            <a class="text-decoration-none" href="view/admin/indexQuestion.php">Index Questions</a>
            <a class="text-decoration-none" href="view/admin/indexResponse.php">Index Responses</a>
            <a class="text-decoration-none" href="view/admin/create_question_response.php">Creation de Questions/Reponses</a>
        </div>
    </div>

    <div class="user my-3">
        <h2>Gestion Users</h2>
        <a class="text-decoration-none" href="view/admin/indexUser.php">Index Utilisateurs</a>
    </div>

    <div class="astre my-3">
        <h2>Gestion Astres (axe d'ameliorations)</h2>
        <a class="text-decoration-none" href="view/admin/indexAstre.php">Index Astres (axe d'ameliorations)</a>
    </div>

    <div class="proposition my-3">
        <h2>Gestion Propositions (axe d'ameliorations)</h2>
        <a class="text-decoration-none" href="view/admin/indexProposition.php">Index Propositions (axe d'ameliorations)</a>
    </div>

    <div class="comment my-3">
        <h2>Gestion Commentaires (axe d'ameliorations)</h2>
        <a class="text-decoration-none" href="view/admin/indexCommentary.php">Index Commentaires (axe d'ameliorations)</a>
    </div>

</div>

<?php
    }else{
       header("Location:../home/home.php"); // renvoie un utlisateur qui chercherai à acceder à cette page en tapant le chemin d'acces dans l'url
    }
?>

<script>
    document.body.style.overflowY = 'scroll';
</script>
</body>
</html>