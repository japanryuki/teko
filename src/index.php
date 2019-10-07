<!DOCTYPE html>
<html lang="ja">
<head>

<?php require('./php/require/requireHead.php');?>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/index.css">
</head>
<body>
<?php require('./php/require/header.php');?>
    
    <main>
        <div>
            <form action="./php/start.php" method="POST">
                <input type="radio" id="main-radio" checked="checked" value="main" name="radio">
                <label class="form-desc-label" for="main-radio" id="GenreLabel">Genre</label>
                <div class="gf-wrap" id="main-gf-wrap">
                    <div class="sg-wrap">
                        <input type="checkbox" id="g1" value="Science" name="genre[]">
                        <label class="form-check-label" for="g1">Science</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="g2" value="Humanities" name="genre[]">
                        <label class="form-check-label" for="g2">Humanities</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="g3" value="Society" name="genre[]">
                        <label class="form-check-label" for="g3">Society</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="g4" value="LifeStyle" name="genre[]">
                        <label class="form-check-label" for="g4">LifeStyle</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="g5" value="Entertainment" name="genre[]">
                        <label class="form-check-label" for="g5">Entertainment</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="g6" value="Sports" name="genre[]">
                        <label class="form-check-label" for="g6">Sports</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="g7" value="Comic_Animation_Game" name="genre[]">
                        <label class="form-check-label" for="g7">Comic Animation Game</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="g8" value="Non_Genre" name="genre[]">
                        <label class="form-check-label" for="g8">Non Genre</label>
                    </div>
                </div>

                <input type="radio" id="sub-radio" value="sub" name="radio" class="disabled">
                <label class="form-desc-label" for="sub-radio" id="SubLabel">Sub Genre</label>
                <div class="gf-wrap" id="sub-gf-wrap">
                    <div class="sg-wrap">
                        <input type="checkbox" id="sg1" value="Physics_Chemistry" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg1">Physics・Chemistry</label>
                  
                        <input type="checkbox" id="sg2" value="Biology" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg2">Biology</label>
                  
                        <input type="checkbox" id="sg3" value="Science_Others" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg3">Science・Others</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="sg4" value="History" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg4">History</label>
                 
                        <input type="checkbox" id="sg5" value="Language_Literature" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg5">Language・Literature</label>
               
                        <input type="checkbox" id="sg6" value="Humanities_Others" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg6">Humanities・Others</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="sg7" value="Politics_Economy" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg7">Politics・Economy</label>
                
                        <input type="checkbox" id="sg8" value="Geography" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg8">Geography</label>
               
                        <input type="checkbox" id="sg9" value="Society_Others" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg9">Society・Others</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="sg10" value="Gourmet_Life" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg10">Gourmet・Life</label>
                 
                        <input type="checkbox" id="sg11" value="Hobby" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg11">Hobby</label>
                 
                        <input type="checkbox" id="sg12" value="LifeStyle_Others" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg12">LifeStyle・Others</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="sg13" value="TV_Cinema" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg13">TV・Cinema</label>
                 
                        <input type="checkbox" id="sg14" value="Music" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg14">Music</label>
                 
                        <input type="checkbox" id="sg15" value="Entertainment_Others" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg15">Entertainment・Others</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="sg16" value="Baseball" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg16">Baseball</label>
                 
                        <input type="checkbox" id="sg17" value="Football" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg17">Football</label>
                  
                        <input type="checkbox" id="sg18" value="Sports_Others" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg18">Sports・Others</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="sg19" value="Comic_Novel" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg19">Comic・Novel</label>
                  
                        <input type="checkbox" id="sg20" value="Animation" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg20">Animation</label>
                
                        <input type="checkbox" id="sg21" value="Game_Toys" name="subGenre[]" disabled>
                        <label class="form-check-label" for="sg21">Game・Toys</label>
                    </div>
                </div>
                <h3>Format</h3>
                <div class="gf-wrap">
                    <div class="sg-wrap">
                        <input type="checkbox" id="f1" name="format[]" value="marubatu">
                        <label class="form-check-label" for="f1">〇×</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f2" name="format[]" value="Four_Choices">
                        <label class="form-check-label" for="f2">Four Choices</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f3" name="format[]" value="Association">
                        <label class="form-check-label" for="f3">Association</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f4" name="format[]" value="Sorting">
                        <label class="form-check-label" for="f4">Sorting</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f5" name="format[]" value="Letter_Panel">
                        <label class="form-check-label" for="f5">Letter Panel</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f6" name="format[]" value="Slot">
                        <label class="form-check-label" for="f6">Slot</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f7" name="format[]" value="Typing">
                        <label class="form-check-label" for="f7">Typing</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f8" name="format[]" value="Effect">
                        <label class="form-check-label" for="f8">Effect</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f9" name="format[]" value="Cube">
                        <label class="form-check-label" for="f9">Cube</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f10" name="format[]" value="Order_Guessing">
                        <label class="form-check-label" for="f10">Order Guessing</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f11" name="format[]" value="Many_Answers">
                        <label class="form-check-label" for="f11">Many Answers</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f12" name="format[]" value="Wire_Knot">
                        <label class="form-check-label" for="f12">Wire Knot</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f13" name="format[]" value="Groupping">
                        <label class="form-check-label" for="f13">Groupping</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f14" name="format[]" value="First_Served">
                        <label class="form-check-label" for="f14">First Served</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f15" name="format[]" value="One_Way">
                        <label class="form-check-label" for="f15">One Way</label>
                    </div>
                    <div class="sg-wrap">
                        <input type="checkbox" id="f16" name="format[]" value="Ramdom">
                        <label class="form-check-label" for="f16">Ramdom</label>
                    </div>
                </div>
                <div>
                    <h3>Number of questions</h3>
                    <p>※Please specify the number of questions in the range of 1 to 28.</p>
                    <input type="number" name="number_of_questions" min="1" max="28">
                </div>
                <div style="width:18%;margin:0 auto;">
                    <input type="submit" name="started" value="Started" class="started">          
                </div>
            </form>
        </div>
    </main>

<?php require('./php/require/footer.php');?>
    
<?php require('./php/require/requireScript.php');?>
<script src="./js/index.js"></script>
</body>
</html>