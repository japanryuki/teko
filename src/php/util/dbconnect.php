<?php

try{
    var_dump($_POST);
    $pdo=new PDO('pgsql:host=localhost;port=5432;dbname=teko;user=postgres;password=1008');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($_POST['main'][0]!==null){
        $array;
        foreach($_POST['format'] as $key=>$value){
            $stmt=$pdo->prepare("SELECT * FROM ? WHERE genre in(?,?,?,?,?,?,?,?) ORDER BY RANDOM() LIMIT ?;");
            $stmt->bindValue(1, $value);
            $stmt->bindValue(2, $_POST['main'][0]);
            $stmt->bindValue(3, $_POST['main'][1]);
            $stmt->bindValue(4, $_POST['main'][2]);
            $stmt->bindValue(5, $_POST['main'][3]);
            $stmt->bindValue(6, $_POST['main'][4]);
            $stmt->bindValue(7, $_POST['main'][5]);
            $stmt->bindValue(8, $_POST['main'][6]);
            $stmt->bindValue(9, $_POST['main'][7]);
            $stmt->bindValue(10, $_POST['number'][0]);
            $stmt->execute();
            $result = $sth->fetchAll();
            $array=array_merge_recursive($array, $result);
        }
        echo json_encode($array);
    }
    elseif($_POST['sub'][0]!==null){
    
    }
    exit();
}catch(PDOException $e){

}
?>