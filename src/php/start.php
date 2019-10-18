<!DOCTYPE html>
<html lang="ja">
<head>

<?php require('./require/requireHead.php');?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/start.css">
</head>
<body>
    
<?php if(isset($_POST)):?>

<div class="q-wrap">
    <div id="q-info-wrap">
        <div id="genre"></div>
        <div id="sub"></div>
        <div id="format"></div>
        <div id="level"></div>
    </div>

    <div id="questions-wrap">
        <div id="questions">
        </div>
    </div>

    <div id="answer-panel">
        
    </div>

    <div id="button_wrap">
        <button type="button" id="start_button">Ready Go</button>
    </div>
</div>

<div id="hidden">
<?php

if(isset($_POST['radio'])){
    
    if($_POST['radio']==='main'){
        foreach ($_POST['genre'] as $value){
            echo "<input type=\"hidden\" class=\"genre\" value=\"$value\">";
        }
        foreach ($_POST['format'] as $value){
            echo "<input type=\"hidden\" class=\"format\" value=\"$value\">";
        }
    }
    else if($_POST['radio']==='sub'){
        foreach ($_POST['subGenre'] as $value){
            echo "<input type=\"hidden\" class=\"subGenre\" value=\"$value\">";
        }
        foreach ($_POST['format'] as $value){
            echo "<input type=\"hidden\" class=\"format\" value=\"$value\">";
        }
    }
}

if(isset($_POST['number_of_questions'])){
    $n=$_POST['number_of_questions'];
    echo "<input type=\"hidden\" class=\"number\" value=\"$n\">";
}



?>
</div>

<div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="result.php" method="post">
                <input type="submit" id="modal-submit" value="Loading Results...">
            </form>
        </div><!--modal__inner-->
</div><!--modal-->

<?php else:?>
<div class="access_error"><p>The access is invalid!!!<br>Do not access this page directly!!!</p></div>
<?php endif?>


<?php require('./require/requireScript.php');?>
<script src="../js/t.min.js"></script>
<script src="../js/start.js"></script>
</body>
</html>