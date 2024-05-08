<?php
    include_once "../../../model/pdo.php";

    if(!empty($_POST['id_question'])){
        $id_question = $_POST['id_question'];
        $sql = "SELECT id_response FROM response WHERE id_question=$id_question AND is_correct=1";
        $stmt = $pdo->query($sql);
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
    
        echo json_encode($response);
    }