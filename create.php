<!DOCTYPE html>
<html lang="ja">
<head>

<?php require('./src/php/require/requireHead.php');?>
<link rel="stylesheet" href="./src/css/style.css">
<link rel="stylesheet" href="./src/css/create.css">
</head>
<body>
<?php require('./src/php/require/header.php');?>

<div class="form-wrap">
    <!-- <form action="./src/php/util/create.php" method="post"> -->
    <div class="modal-button">※入力フィールドの使い方を見るにはここをクリックしてください。</div>
    <div class="form-group">
        <label for="genre">Genre</label>
        <select class="form-control" id="genre" name="genre">
            <option value="Science">Science</option>
            <option value="Humanities">Humanities</option>
            <option value="Society">Society</option>
            <option value="LifeStyle">LifeStyle</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Sports">Sports</option>
            <option value="Comic_Animation_Game">Comic Animation Game</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sub_genre">SubGenre</label>
        <select class="form-control" id="sub_genre" name="sub_genre">
            <option value="Physics_Chemistry">Physics・Chemistry</option>
            <option value="Biology">Biology</option>
            <option value="Science_Others">Science・Others</option>
            <option value="History">History</option>
            <option value="Language_Literature">Language・Literature</option>
            <option value="Humanities_Others">Humanities・Others</option>
            <option value="Politics_Economy">Politics・Economy</option>
            <option value="Geography">Geography</option>
            <option value="Society_Others">Society・Others</option>
            <option value="Gourmet_Life">Gourmet・Life</option>
            <option value="Hobby">Hobby</option>
            <option value="LifeStyle_Others">LifeStyle・Others</option>
            <option value="TV_Cinema">TV・Cinema</option>
            <option value="Music">Music</option>
            <option value="Entertainment_Others">Entertainment・Others</option>
            <option value="Baseball">Baseball</option>
            <option value="Football">Football</option>
            <option value="Sports_Others">Sports・Others</option>
            <option value="Comic_Novel">Comic・Novel</option>
            <option value="Animation">Animation</option>
            <option value="Game_Toys">Game・Toys</option>
        </select>
    </div>
    <div class="form-group">
        <label for="format">Format</label>
        <select class="form-control" id="format" name="format">
            <option value="marubatu">〇×</option>
            <option value="Four_Choices">Four Choices</option>
            <option value="Association">Association</option>
            <option value="Sorting">Sorting</option>
            <option value="Letter_Panel">Letter Panel</option>
            <option value="Slot">Slot</option>
            <option value="Typing">Typing</option>
            <option value="Effect">Effect</option>
            <option value="Cube">Cube</option>
            <option value="Order_Guessing">Order Guessing</option>
            <option value="Many_Answers">Many Answers</option>
            <option value="Wire_Knot">Wire_Knot</option>
            <option value="Groupping">Groupping</option>
            <option value="First_Served">First_Served</option>
            <option value="One_Way">One Way</option>
            <option value="Ramdom">Ramdom</option>
        </select>
    </div>
    <div class="form-group statement">
        <label for="statement">Statement</label>
        <textarea class="form-control" id="statement" name="statement"></textarea>
    </div>
    <div class="form-group as-statement">
        <label for="statement1">Statement1</label>
        <input type="text" class="form-control" id="statement1" placeholder="" name="statement">
        
    </div>
    <div class="form-group as-statement">
        <label for="statement2">Statement2</label>
        <input type="text" class="form-control" id="statement2" placeholder="" name="statement">
        
    </div>
    <div class="form-group as-statement">
        <label for="statement3">Statement3</label>
        <input type="text" class="form-control" id="statement3" placeholder="" name="statement">
        
    </div>
    <div class="form-group as-statement">
        <label for="statement4">Statement4</label>
        <input type="text" class="form-control" id="statement4" placeholder="" name="statement">
        
    </div>
    <div class="form-group">
        <label for="level">Level</label>
        <select class="form-control" id="level" name="level">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group choices">
        <label for="choices">Choices1</label>
        <input type="text" class="form-control" id="choices" placeholder="" name="choices">
    </div>
    <div class="form-group answer">
        <label for="answer">Answer1</label>
        <input type="text" class="form-control" id="answer" placeholder="" name="answer">
    </div>
    <div class="plus-button" disabled>
        Choices and Answer+
    </div>
    <div class="plus-button" disabled>
        Choices and Answer-
    </div>
    <div class="error">
        ※空欄あり
    </div>
    <div style="width: 50%;margin: 0 auto;">
        <input type="submit" class="create" value="Create">
    </div>
    <!-- </form> -->
</div>

<div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            ・formatドロップダウンメニューの値を変更すると、入力フィールドが変化します。<br>
            １．プラスマイナスボタンの変化<br>
            タイピング、キューブ、エフェクト、並べ替え、〇×：choicesとanswerを増減させるボタンがなくなります。<br>
            それ以外：ボタンが出現します。<br>
            ２．statementの変化<br>
            連想：statementフィールドが４つ追加されます。ヒントを入力できます。<br><br>
            ・choices、answerの入力例<br>
            １．四択、連想、多答<br>
            choicesに選択肢、その選択肢に対応するanswerに正解なら「t」不正解なら「f」を入れます。<br>
            ２．順番<br>
            choicesに選択肢、その選択肢に対応するanswerに１～８までの順位を入れます。<br>
            ３．グループ、線<br>
            choicesに選択肢、その選択肢に対応するanswerに答えを入れます。<br>
        </div><!--modal__inner-->
</div><!--modal-->

<?php require('./src/php/require/footer.php');?>
    
<?php require('./src/php/require/requireScript.php');?>
<script src="./src/js/create.js"></script>
</body>
</html>