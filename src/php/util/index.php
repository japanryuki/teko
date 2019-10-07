<?php

try{
    $pdo=new PDO('pgsql:host=localhost;port=5432;dbname=teko;user=postgres;password=1008');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt=$pdo->prepare("select * from questions where genre in(?,?,?,?,?,?,?) and questions_format in(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) order by random() limit ?");

    

    $stmt->execute();
    $fetched1=$stmt->fetchAll();
    

    echo json_encode($fetched1);

    exit();
}catch(PDOException $e){

}
?>