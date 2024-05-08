<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    if ($_SESSION['role'] >= Role::LOGGED->value){
?>
    <a class="btn btn-primary my-2" href="view/quiz/indexQuiz.php">Retour index quiz</a> <!-- Redirection link transformed into a button -->

    <div class="quizGame container-fluid d-flex flex-column">

        <div class="quizQuestion d-flex justify-content-center align-items-center mt-3" id="quizQuestion"></div>

        <div class="quizResponse d-flex justify-content-center align-items-center" id="quizResponse"></div>

        <div class="submitResponseMessage d-flex justify-content-center align-items-center" id="submitResponseMessage"></div>

    </div>

<script>
    document.body.style.overflowY = 'scroll';
    // const btnValidation = document.getElementById('btnValidation')
    const quizQuestion = document.getElementById('quizQuestion')
    const quizResponse = document.getElementById('quizResponse')
    const submitResponseMessage = document.getElementById('submitResponseMessage')
    const queryString = window.location.search
    const urlParams = new URLSearchParams(queryString)

    let questions = []
    let response = []
    let score = 0
    let idQuiz = urlParams.get("id_quiz")
    
    document.addEventListener("DOMContentLoaded", function (){
        const formData = new FormData()
        formData.append("id_quiz", idQuiz)

        const data = {
            method : "POST",
            body : formData
        }

        fetch("../../controller/admin/quiz/quiz_ctrl.php", data)
        .then(response => response.json())
        .then(quiz => {
            console.log(quiz)
            questions = [...quiz] // Avec le spread operator on copie le tableau de la base de donnée dans un autre tableau ( clonage )
            // console.log(" question[0] : ", questions[0].question_content)

            questionMaker(questions)
        })
    })

    function questionMaker(questions) {
        if(questions.lenght > 0){
            let showQuestions = `<h2 class='text-center'>${questions[0].question_content}</h2>`
            quizQuestion.innerHTML = showQuestions

            let showResponses = "<form id='formValidation'>"
            for (const res in questions[0].answers) {
                // console.log(`response : ${res} => value : ${questions[0].answers[res]}`)
                showResponses += `<input type='radio' name='response' class='response col-6 my-2 text-center' value='${questions[0].answers[res]}'><label class ='my-2' for='response'>${res}</label>` // Pour éviter de tricher nous mettons ça a l'interieur d'une variable dans l'élément input
            }
            showResponses += `<div class="text-center mt-3"><input type="submit" class="btn btn-danger w-25" id="btnValidation" value="Valider"></div>`
            showResponses += "</form>"

            quizResponse.innerHTML = showResponses

            const form = document.getElementById('formValidation') // On recupere le formulaire ici car avant le formulaire n'existait pas dans le DOM ( promise le crée à l'instant )
            //console.log("form => ", form)

            form.addEventListener("submit", function(e){
                e.preventDefault()

                const formData = new FormData(e.target)
                const data = {
                    method : "POST",
                    body : formData
                }
                fetch("../../controller/admin/quiz/check_responses_ctrl.php", data)
                .then(response => response.json())
                .then(checkData => {
                    if(checkData){
                        score++ // Ici on augmente le score de 1
                    }else{
                        /*
                            Mettre un message de mauvaises reponses, a afficher en Js
                        */
                    }
                })
            })
        }else{
            /*
                Ici on fera du code pour gerer la fin du quiz
            */
        }
    }

</script>
</body>
</html>
<?php 
    }else{
        header('Location:../home/home.php');
    } 
?>