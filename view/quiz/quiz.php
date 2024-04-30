<?php
    include_once "../../model/role.php";
    include_once "../base.php";
    if ($_SESSION['role'] >= Role::LOGGED->value){
        $id_quiz = $_GET['id_quiz'];
?>

<a class="btn btn-primary my-2" href="view/quiz/indexQuiz.php">Retour index quiz</a>

<div class="quizGame container-fluid d-flex flex-column">
    <div class="quizQuestion d-flex justify-content-center align-items-center">
        <?php
            $quizQuestionSql = 

        // requete de gros batard

            "SELECT quiz.id_quiz, quiz.quiz_name, question.id_question, question.question_content, GROUP_CONCAT(response.response_content SEPARATOR '_')
            AS responses, GROUP_CONCAT(response.is_correct SEPARATOR '_')
            AS isCorrect
            FROM quiz
            INNER JOIN question
            ON quiz.id_quiz = question.id_quiz
            INNER JOIN response
            ON question.id_question = response.id_question 
            WHERE quiz.id_quiz = $id_quiz
            GROUP BY question.id_question";


            $quizQuestionStmt = $pdo->query($quizQuestionSql);

            $quizQuestions = $quizQuestionStmt->fetchAll(PDO::FETCH_ASSOC);
            $newQuizQuestions = [];

            // Apres la requete ci-dessus, je souhaite recuperer afficher aleatoirement une question a la fois
            // $randQuestion = rand(0, count($quizQuestions) - 1);
            // On va traiter les données qui arrivent en string à cause de la concatenation
            foreach ($quizQuestions as $qq) {
                $tempArray = [];
                $tempArray['id_quiz'] = $qq['id_quiz'];
                $tempArray['quiz_name'] = $qq['quiz_name'];
                // rajouter id_question ainsi que les explode de responses et isCorrect ne pas oublier d'importer la requete sql dans phpmyadmin
                $qqR = [ "responses" => explode('_', $qq['responses']), "isCorrect" =>  explode('_', $qq['isCorrect'])];
                array_replace($quizQuestions,  $qqR);
            }
        ?>
        <h4 id="quizQuestionContent">
            <?= var_dump($quizQuestions[0]) ?>;
        </h4>
    </div>
    <div class="quizResponse d-flex">
        <!-- < ?php
            $quizResponseSql = "SELECT * FROM response WHERE id_question";
            $quizResponseStmt = $pdo->query($quizResponseSql);
            $quizResponses = $quizResponseStmt->fetchAll(PDO::FETCH_ASSOC);
        ?> -->
    </div>
</div>



<script>
    const quizQuestionContent = document.getElementById('quizQuestionContent')
</script>
</body>
</html>
<?php } ?>
<!-- $sql = "SELECT * FROM quiz INNER JOIN question ON quiz.id_quiz = question.id_quiz WHERE quiz.id_quiz = 1"; -->