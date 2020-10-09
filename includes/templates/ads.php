<?php
    foreach(get_the_category() as $cd){
        if($cd->cat_name == 'NBA'){
            $adster_bg_color = 'orange';
        }
        else if($cd->cat_name == 'NFL'){
            $adster_bg_color = 'black';
        }
        else if($cd->cat_name == 'MLB'){
            $adster_bg_color = 'blue';
        }
    }
?>
<span id="adsterCountdown" style="display:none;"><?php echo $countdown?></span>
<div id="row"> 
    <div class="img-col">
        <img src="<?php echo plugins_url('../../assets/img/football.png', __FILE__);?>" alt="Football player fist up">
    </div>
    <div class="mid-col" style="<?php echo(isset($adster_bg_color) ? 'background-color:'.$adster_bg_color.' !important;' : 'here goes the title') ?>">
        <div class="top-mid-row">
            <div class="timer-row">
                <div class="timer-box">
                    <span class="timer-letters">DAYS</span>
                    <span class="timer-numbers" id="timerDays">00</span>
                </div>
                <div class="timer-box">
                    <span class="timer-letters">HOURS</span>
                    <span class="timer-numbers" id="timerHours">00</span>
                </div>
                <div class="timer-box">
                    <span class="timer-letters">MIN</span>
                    <span class="timer-numbers" id="timerMin">00</span>
                </div>
                <div class="timer-box">
                    <span class="timer-letters">SEC</span>
                    <span class="timer-numbers" id="timerSec">00</span>
                </div>
            </div>
            <div class="scarcity-text">
                <span>Remaining Time</span>
                <br>
                <span>To Place Bet</span>
            </div>   
        </div>
        <div class="bottom-mid-row">
            <span class="pick-text">
            <?php
                if(isset($title)) echo $title;
                else if(isset($content) && trim($content) != '') echo $content;
                else if(isset($post_title)) echo $post_title;
                else echo 'Placeholder title'
            ?>
            </span>
            <br>
            <span class="bets-text">Hurry up! 25 people have placed this bet</span>
        </div>
    </div>
    <div class="btn-col">
        <button id="btn">BET & WIN!</button>
        <div class="trusted-text">
            <span>Trusted</span>
            <span>Sportsbetting.ag</span>
        </div>
    </div>
<div>