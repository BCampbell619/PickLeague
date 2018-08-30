<?php
    define('TITLE', 'Schedule | League');
    include('includes/header.php');

    // $WEEK is set as a Schedule class object
    // $WEEK is then initialized to the current week of the season
    $WEEK = new Schedule();
    $WEEK->select_schedule(intval($_GET['week']), date('Y'));

?>

<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 schTable">
   
       <h2>Schedule&#58; Week <?php echo $WEEK->sch_wk[0]; ?></h2>
    
        <table>
                    <thead>
                        <th class="WeekNum">Week #</th>
                        <th class="GameNum">Game #</th>
                        <th>Away</th>
                        <th class="ScoreAway">Score</th>
                        <th>&#64;</th>
                        <th class="ScoreHome">Score</th>
                        <th>Home</th>
                        <th class="GameYear">Year</th>
                        <th>Date</th>
                        <th>Time</th>
                    </thead>
                    <tbody>
        <?php
    
            for($i = 0; $i < count($WEEK->sch_id); $i++) { ?>
            
                    <?php if ($currentSchedule->time_check($i) !== "FALSE") {?>
        
                        <tr id="<?php echo $WEEK->sch_game[$i]; ?>">
                            <td class="WeekNum"><?php echo $WEEK->sch_wk[$i]; ?></td>
                            <td class="GameNum"><?php echo $WEEK->sch_game[$i]; ?></td>
                            <td id="away-<?php echo $WEEK->sch_game[$i]; ?>"><?php echo $WEEK->sch_team_away[$i]; ?></td>
                            <td class="ScoreAway"><?php echo $WEEK->sch_away_score[$i]; ?></td>
                            <td>at</td>
                            <td class="ScoreHome"><?php echo $WEEK->sch_home_score[$i]; ?></td>
                            <td id="home-<?php echo $WEEK->sch_game[$i]; ?>"><?php echo $WEEK->sch_team_home[$i]; ?></td>
                            <td class="GameYear"><?php echo $WEEK->sch_year[$i]; ?></td>
                            <td><?php echo rtrim(substr($WEEK->sch_time[$i], 0, 10)); ?></td>
                            <td><?php echo ltrim(substr($WEEK->sch_time[$i], 11)); ?></td>
                        </tr>
                        
                    <?php } ?>
                
        <?php } ?>
        
                    </tbody>
                </table>
    </div>
</div>


<?php



?>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 frmSchSelect">
       
       <h2>Selection Form</h2>
       
        <form action="landing.php" method="post">
            <?php for($i = 0; $i < count($WEEK->sch_id); $i++) {?>
            
            <label for="game_<?php echo $WEEK->sch_game[$i]; ?>">Game <?php echo $WEEK->sch_game[$i]; ?></label>
            <input type="text" name="game_<?php echo $WEEK->sch_game[$i]; ?>" id="game_<?php echo $WEEK->sch_game[$i];?>" value="<?php if (isset($USER_STATS_NOW->TeamName)) { echo $USER_STATS_NOW->TeamName[$i]; } ?>" <?php if ($currentSchedule->time_check($i) === "FALSE") { echo "Disabled"; } ?> >
            
            <?php } ?>
            <br><button type="submit" name="select_submit">Selection Submit</button>
        </form>
    </div>
</div>

<?php

    include('includes/footer.php');

?>