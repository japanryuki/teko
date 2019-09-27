<!DOCTYPE html>
<html lang="ja">
<head>

<?php require('./require/requireHead.php');?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/start.css">
</head>
<body>
<?php require('./require/header.php');?>
    
<?php if(isset($_POST)):?>

<div class="q-wrap">
    <div id="q-info-wrap">
        <div id="genre">Humanities</div>
        <div id="sub">History</div>
        <div id="format">Typing</div>
        <div id="level">☆☆☆☆☆</div>
    </div>

    <div id="questions-wrap">
        <div id="questions">
        </div>
    </div>

    <div id="answer-panel">

    </div>

    <div id="enter">
        <button type="button" id="start_button">Ready Go</button>
    </div>
</div>

<div>
<?php

if(isset($_POST['main'])){
    foreach ($_POST as $key=>$value){
        if($key==="main"){
            continue;
        }
        if($value==="format"){
            echo "<input type=\"hidden\" class=\"format\" value=\"$key\">";
            continue;
        }
        if($key==="number_of_questions"){
            echo "<input type=\"hidden\" class=\"number\" value=\"$value\">";
            break;
        }
        echo "<input type=\"hidden\" class=\"main\" value=\"$key\">";
    }
}
elseif(isset($_POST['sub'])){
    foreach ($_POST as $key=>$value){
        if($key==="sub"){
            continue;
        }
        if($value==="format"){
            echo "<input type=\"hidden\" class=\"format\" value=\"$key\">";
            continue;
        }
        if($key==="number_of_questions"){
            echo "<input type=\"hidden\" class=\"number\" value=\"$value\">";
            break;
        }
        echo "<input type=\"hidden\" class=\"sub\" value=\"$key\">";
    }
}

?>
</div>

<?php else:?>
<div class="access_error"><p>The access is invalid!!!<br>Do not access this page directly!!!</p></div>
<?php endif?>


<?php require('./require/requireScript.php');?>
<script src="../js/start.js"></script>
</body>
</html>