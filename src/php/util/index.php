<?php
try{
    $pdo=new PDO('pgsql:host=localhost;port=5432;dbname=teko;user=postgres;password=1008');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($_REQUEST['genre'])){
        $stmt=$pdo->prepare("select * from questions where genre in(?,?,?,?,?,?,?) and questions_format in(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) order by random() limit ?");

        $i=1;
        foreach($_REQUEST['genre'] as $value){
            $stmt->bindValue($i,$value);
            $i++;
        }
        foreach($_REQUEST['format'] as $value){
            $stmt->bindValue($i,$value);
            $i++;
        }
        $stmt->bindValue($i,intval($_REQUEST['number'][0]));
    }

    if(isset($_REQUEST['sub_genre'])){
        $stmt=$pdo->prepare("select * from questions where sub_genre in(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) and questions_format in(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) order by random() limit ?");

        $i=1;
        foreach($_REQUEST['sub_genre'] as $value){
            $stmt->bindValue($i,$value);
            $i++;
        }
        foreach($_REQUEST['format'] as $value){
            $stmt->bindValue($i,$value);
            $i++;
        }
        $stmt->bindValue($i,intval($_REQUEST['number'][0]));
    }


    $stmt->execute();

    $fetchedQ=$stmt->fetchAll();

    $fetchedC;
    $fetchedA;
    $fetchedS;
    if(isset($fetchedQ[0])){
        $i=0;
        foreach($fetchedQ as $arr){
            $stmt=$pdo->prepare("select * from choices where questions_id=?");
            $stmt->bindValue(1,intval($arr['questions_id']));
            $stmt->execute();
            $fetchedC=$stmt->fetchAll();

            switch($arr['questions_format']){
                case 'Typing':
                $stmt=$pdo->prepare("select answer from answer where questions_id=?");
                $stmt->bindValue(1,intval($arr['questions_id']));
                $stmt->execute();
                $fetchedA=$stmt->fetch();
                break;

                default:
                $stmt=$pdo->prepare("select answer from answer where choices_id=?");
                foreach($fetchedC as $value){
                    $stmt->bindValue(1,intval($value['choices_id']));
                    $stmt->execute();
                    $fetchedA=$stmt->fetch();
                }
            }

            $stmt=$pdo->prepare("select statement from statement where questions_id=?");
            $stmt->bindValue(1,intval($arr['questions_id']));
            $stmt->execute();
            $fetchedS=$stmt->fetch();
            $fetch_complete[$i]=array_merge_recursive($fetchedQ[$i],$fetchedC,$fetchedA,$fetchedS);
            $i++;
        }
    }
    
    

    echo json_encode($fetch_complete);

    exit();
}catch(PDOException $e){

}
?>