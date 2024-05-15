<?php
    include_once "../../../model/pdo.php";

    if(!empty($_POST['response'])){
        $id_response = $_POST['response'];
        $sql = "SELECT is_correct FROM response WHERE id_response=$id_response";
        $stmt = $pdo->query($sql);
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        $res = (bool)$response['is_correct']; // Convert 1/0 to true/false
    
        echo json_encode($res);
    }