<?php
try{
    $pdo=new PDO('pgsql:host=localhost;port=5432;dbname=teko;user=postgres;password=1008');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo var_dump($_POST);

    $stmt=$pdo->prepare("insert into questions(genre,sub_genre,questions_format,level) values(?,?,?,?) RETURNING questions_id");
    $stmt->bindValue(1,$_POST['genre'][0]);
    $stmt->bindValue(2,$_POST['sub_genre'][0]);
    $stmt->bindValue(3,$_POST['format'][0]);
    $stmt->bindValue(4,$_POST['level'][0]);

    $id=$stmt->execute();

    echo $id;

    exit();
}catch(PDOException $e){

}
?>