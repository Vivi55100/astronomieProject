<?php
// Inclusion des fichiers nécessaires pour récupérer les rôles et pour la connexion à la base de données
    include_once "../../model/role.php"; // Inclusion de la classe Role pour gérer les rôles
    include_once "../base.php"; // Inclusion du fichier pour la connexion à la base de données

     // Vérification du rôle de l'utilisateur connecté
    if ($_SESSION['role'] >= Role::LOGGED->value){ // Vérifie si le rôle de l'utilisateur est supérieur ou égal au role "LOGGED"
        // Récupération de l'identifiant du quiz depuis les paramètres de l'URL
        $id_quiz = $_GET['id_quiz']; // Récupération de l'identifiant du quiz à partir des paramètres de l'URL
?>

 <a class="btn btn-primary my-2" href="view/quiz/indexQuiz.php">Retour index quiz</a> <!-- Lien de redirection transformé en bouton -->

<div class="quizGame container-fluid d-flex flex-column">
    <div class="quizQuestion d-flex justify-content-center align-items-center">
        <?php
        // Requête SQL pour récupérer les questions et les réponses associées au quiz spécifié
            $quizQuestionSql = 
            "SELECT quiz.id_quiz, quiz.quiz_name, question.id_question, question.question_content , GROUP_CONCAT(response.response_content SEPARATOR '_' )
            AS answers_name, GROUP_CONCAT(response.is_correct SEPARATOR '_')
            AS answers_value
            FROM quiz
            INNER JOIN question
            ON quiz.id_quiz = question.id_quiz
            INNER JOIN response
            ON question.id_question = response.id_question 
            WHERE quiz.id_quiz = $id_quiz
            GROUP BY question.id_question";

            // Exécution de la requête SQL et récupération des résultats
            $quizQuestionStmt = $pdo->query($quizQuestionSql); // Exécution de la requête SQL
            $quizQuestions = $quizQuestionStmt->fetchAll(PDO::FETCH_ASSOC); // Récupération des résultats de la requête
            $newQuizQuestions = []; // Initialisation d'un tableau pour stocker les nouvelles questions

            // Parcours des résultats pour créer un tableau de questions avec réponses mélangées
            foreach ($quizQuestions as $qq) {
                $tempArray = []; // Initialisation d'un tableau temporaire pour stocker les données de chaque question
                $tempArray['id_quiz'] = $qq['id_quiz']; // Récupération de l'ID du quiz
                $tempArray['quiz_name'] = $qq['quiz_name']; // Récupération du nom du quiz
                $tempArray['id_question'] = $qq['id_question']; // Récupération de l'ID de la question
                $tempArray['question_content'] = $qq['question_content']; // Récupération du contenu de la question
                $tempArrayName = explode('_', $qq['answers_name']); // Séparation des noms de réponses
                $tempArrayValue = explode('_', $qq['answers_value']); // Séparation des valeurs des réponses

                // Mélange aléatoirement les réponses pour chaque question
                for ($i=0; $i <= 3 ; $i++) { // Boucle pour mélanger les réponses
                    $rnd = count($tempArrayName) > 1 ? rand(0, count($tempArrayName) - 1) : 0; // Sélection aléatoire d'une réponse
                    $tempArray["answers"][$tempArrayName[$rnd]] = $tempArrayValue[$rnd]; // Attribution de la réponse au tableau temporaire
                    array_splice($tempArrayName, $rnd, 1); // Suppression de la réponse sélectionnée du tableau des noms
                    array_splice($tempArrayValue, $rnd, 1); // Suppression de la valeur sélectionnée du tableau des valeurs
                }

                $newQuizQuestions[] = $tempArray; // Ajout de la question mélangée au tableau des nouvelles questions
                $tempArray = []; // Réinitialisation du tableau temporaire pour la prochaine itération
            }
            // Mélange aléatoire des questions dans le tableau
            shuffle($newQuizQuestions); // Mélange aléatoire du tableau de nouvelles questions
            var_dump($newQuizQuestions[0]); 

        ?>
        <h4 id="quizQuestionContent"></h4>
    </div>
    <div class="quizResponse d-flex"></div>
</div>

<script>
     document.body.style.overflowY = 'scroll';

</script>
</body>
</html>
<?php 
    }else{
        header('Location:../home/home.php');
    } 
?>