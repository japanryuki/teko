<?php

try{
    var_dump($_POST);
    $pdo=new PDO('pgsql:host=localhost;port=5432;dbname=teko;user=postgres;password=1008');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt=$pdo->prepare('select * from questions');
    $stmt->execute();
    $fetched=$stmt->fetchAll();
    var_dump($fetched);

    $stmt=$pdo->prepare('select * from choices');
    $stmt->execute();
    $fetched=$stmt->fetchAll();
    var_dump($fetched);

    $stmt=$pdo->prepare('select * from answer');
    $stmt->execute();
    $fetched=$stmt->fetchAll();
    var_dump($fetched);

    $stmt=$pdo->prepare('select * from statement');
    $stmt->execute();
    $fetched=$stmt->fetchAll();
    var_dump($fetched);

    exit();
}catch(PDOException $e){

}
?>