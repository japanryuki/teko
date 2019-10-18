<!DOCTYPE html>
<html lang="ja">
<head>

<?php require('./require/requireHead.php');?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/result.css">
</head>
<body>
<?php require('./require/header.php');?>

<?php
foreach($_POST as $value){
    echo '<div class="result-wrap">';
    for($i=0;$i<count($value);$i++){
        switch($i){
            case 0:
            if($value[$i]==="1"){
                echo '<div class="result">Result:〇</div>';
                continue;
            }
            if($value[$i]==="0"){
                echo '<div class="result">Result:×</div>';
                continue;
            }
            break;

            case 1:
            echo '<div class="result">Genre:'.$value[$i].'</div>';
            break;
            case 2:
            echo '<div class="result">SubGenre:'.$value[$i].'</div>';
            break;
            case 3:
            echo '<div class="result">Format:'.$value[$i].'</div>';
            break;
            case 4:
            echo '<div class="result">Level:'.$value[$i].'</div>';
            break;
            case 5:
            echo '<div class="result">Statement:'.$value[$i].'</div>';
            break;
            case 6:
            echo '<div class="result">Answer:'.$value[$i].'</div>';
            break;
        }
    }
    echo '</div>';
}
?>
<div class="a-container">
    <div class="a-wrap">
    <a href="javascript:history.back();">Again</a>
    </div>
    <div class="a-wrap">
        <a href="../../index.php">Back To Top</a>
    </div>
</div>
<?php require('./require/requireScript.php');?>
</body>
</html>