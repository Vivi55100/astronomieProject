<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    if ($_SESSION['role'] >= Role::LOGGED->value){
        $sql = "SELECT * FROM quiz";
        $stmt = $pdo->query($sql);
        $quizs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <div class="indexQuiz container flex-wrap text-center mt-5">
        <?php
            foreach ($quizs as $quiz) {
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= htmlentities($quiz['quiz_name']) ?></h5>
                <a href="view/quiz/quiz.php?id_quiz=<?= htmlentities($quiz['id_quiz']) ?>" class="btn btn-primary">Jouer</a>
            </div>
        </div>
        <?php } ?>
    </div>

    <script>
        document.body.style.overflowY = "scroll"
    </script>
</body>
</html>
<?php
    }else{
        header("Location:../home/home.php");
    }
?>