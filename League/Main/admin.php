<?php

    /*The purpose of this page is to enter the scores for each team for each week. When they are submitted to the database a trigger within the data base will update each players selection to either a win or 
    a loss. When these scores are submitted a calculation will take place comparing the home team's score to the away team's score and then setting an additional variable to either 'W' or 'L', which will then
    be passed to the TEAM_SCHEDULE table within the database. After the database updates the trigger will fire to update all picks for that week in the STATS table to either a 'W' or a 'L.'*/

    define("TITLE", "Admin | League of Campbells & Slankers");
    include('includes/header.php');

    //This variable holds the current day in integer form (i.e. Monday = 1)
    $currDay    =   date('N');

    //next_Sunday is a function that will return the sunday date of either the current or next coming sunday
    $queryDate  =   next_Sunday($currDay);

    //This variable holds the results of a query that finds the week number based on the sunday date

    /*$week_db_num = $database->get_week($queryDate);
    $weekNum_num = mysqli_fetch_assoc($week_db_num);
    $wkCountQ = $database->game_count($weekNum_num['WeekNumber']);
    $wkCount = mysqli_fetch_assoc($wkCountQ);*/

?>

<!--     ---------------- Admin section: Add schedule ----------------         -->

<?php

    $rtnMessage = "";

    if(isset($_POST['sch_submit'])) {
        
        $wk = $_POST['week'];
        $gm = $_POST['game'];
        $hm = $_POST['home'];
        $aw = $_POST['away'];
        $hs = $_POST['home_score'];
        $as = $_POST['away_score'];
        $ho = $_POST['home_outcome'];
        $ao = $_POST['away_outcome'];
        $yr = $_POST['year'];
        $sd = $_POST['sch_date'];
        
        $sql = "INSERT INTO SCHEDULES(sch_wk, sch_game, sch_team_home, sch_team_away, sch_home_score, sch_away_score, sch_home_outcome, sch_away_outcome, sch_year, sch_time) ";
        $sql .= "VALUES({$wk}, {$gm}, '{$hm}', '{$aw}', {$hs}, {$as}, '{$ho}', '{$ao}', {$yr}, '{$sd}');";
        
        if(mysqli_query($database->Connection, $sql)) {
            
            $rtnMessage = "Successfully added the schedule";
            
        } else {
            
            $rtnMessage = "Schedule not updated";
            
        }
        
    }

?>

<section>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 schAdd" id="schedule_add">
        <h1>Enter Schedules</h1>
        <h2><?php echo $rtnMessage; ?></h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>#schedule_add" method="post">
            <label for="week">Week #:</label>
            <input type="number" name="week" id="week"><br>
            <label for="game">Game #:</label>
            <input type="number" name="game" id="game"><br>
            <label for="home">Home Team</label>
            <input type="text" name="home" id="home">
            <label for="home_score">Score:</label>
            <input type="number" name="home_score" id="home_score" value="0">
            <label for="home_outcome">Outcome:</label>
            <input type="text" name="home_outcome" id="home_outcome" value="U"><br>
            <label for="away">Away Team</label>
            <input type="text" name="away" id="away">
            <label for="away_score">Score:</label>
            <input type="number" name="away_score" id="away_score" value="0">
            <label for="away_outcome">Outcome:</label>
            <input type="text" name="away_outcome" id="away_outcome" value="U"><br>
            <label for="year">Year:</label>
            <input type="number" name="year" id="year" value="<?php echo date('Y'); ?>"><br>
            <label for="sch_date">Game Date:</label>
            <input type="text" name="sch_date" id="sch_date"><br>
            <button typer="submit" name="sch_submit" id="sch_submit">Enter</button>
        </form>
    </div>
</div>
</section>

<!--     ------------------- Admin section: Add scores -------------------         -->

<section>

<?php

    if (isset($_POST['scoreSubmit'])) {
        
        for ($i = 0; $i < count($currentSchedule->sch_id); $i++) {
            
            $homeArr[] = $_POST["final_home_score_{$USER_STATS_NOW->GameNumber[$i]}"];
            $awayArr[] = $_POST["final_away_score_{$USER_STATS_NOW->GameNumber[$i]}"];
            
        }
        
        $currentSchedule->get_outcomes($homeArr, $awayArr);
        
        if (isset($currentSchedule->sch_home_score) && isset($currentSchedule->sch_away_score)) {
            
            $rtnMessage = "Scores Updated";
            
        } else {
            
            $rtnMessage = "Scores not Updated";
            
        }
        
    }
    
?>

<div id="adminHead">

    <h1>Admin Score Submission Form</h1>
    <h2><?php echo "Week {$USER_STATS_NOW->WeekNumber} Games {$rtnMessage}"; ?></h2>
    
</div>
                     
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="adminForm">

    <div class="textBox">
       
       <?php for ($i = 0; $i < count($currentSchedule->sch_id); $i++) {?>
       
        <h3><?php echo "Game {$USER_STATS_NOW->GameNumber[$i]}"; ?></h3>
        
        <label for="home">Home Team</label>
        <input class="final_team" type="text" name="<?php echo "final_home_{$USER_STATS_NOW->GameNumber[$i]}"; ?>" id="<?php echo "final_home_{$USER_STATS_NOW->GameNumber[$i]}"; ?>" value="<?php echo $currentSchedule->sch_team_home[$i]; ?>" disabled>
        <label for="home_score">Score:</label>
        <input class="final_score" type="number" name="<?php echo "final_home_score_{$USER_STATS_NOW->GameNumber[$i]}"; ?>" id="<?php echo "final_home_score_{$USER_STATS_NOW->GameNumber[$i]}"; ?>" value="<?php if (isset($currentSchedule->sch_home_score)) { echo $currentSchedule->sch_home_score[$i]; } else { echo 0; } ?>">
        <label for="away">Away Team</label>
        <input class="final_team" type="text" name="<?php echo "final_away_{$USER_STATS_NOW->GameNumber[$i]}";?>" id="<?php echo "final_away_{$USER_STATS_NOW->GameNumber[$i]}";?>" value="<?php echo $currentSchedule->sch_team_away[$i]; ?>" disabled>
        <label for="away_score">Score:</label>
        <input class="final_score" type="number" name="<?php echo "final_away_score_{$USER_STATS_NOW->GameNumber[$i]}";?>" id="<?php echo "final_away_score_{$USER_STATS_NOW->GameNumber[$i]}";?>" value="<?php if (isset($currentSchedule->sch_away_score)) { echo $currentSchedule->sch_away_score[$i]; } else { echo 0; } ?>">
           
        <?php } ?>
            
    </div>
    
<button type="submit" class="adminBtn" name="scoreSubmit">Submit Scores</button>
   
</form>
    
</section>

<?php

    include('includes/footer.php');

?>