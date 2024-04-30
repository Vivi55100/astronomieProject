<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    if ($_SESSION['role'] >= Role::LOGGED->value){
        $sql = "SELECT * FROM quiz";
        $stmt = $pdo->query($sql);
        $quizs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <h1 class="text-center my-3">Quiz</h1>

    <div class="indexQuiz container d-flex justify-content-center flex-wrap text-center m-auto">
        <?php
            foreach ($quizs as $quiz) {
        ?>
        <div class="card p-2 m-2">
            <div class="card-body">
                <h5 class="card-title"><?= htmlentities($quiz['quiz_name']) ?></h5>
                <a href="view/quiz/quiz.php?id_quiz=<?= htmlentities($quiz['id_quiz']) ?>" class="btn btn-primary">Jouer</a>
            </div>
        </div>
        <?php } ?>
    </div>

</body>
</html>
<?php
    }else{
        header("Location:../home/home.php");
    }
?>