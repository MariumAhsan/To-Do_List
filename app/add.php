<?php

if(isset($_POST['tittle'])){
    require '../connection.php';

    $tittle = $_POST['tittle'];

    if(empty($tittle)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO todos(tittle) VALUE(?)");
        $res = $stmt->execute([$tittle]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}