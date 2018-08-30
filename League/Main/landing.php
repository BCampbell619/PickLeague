<?php

    define("TITLE", "Home | League of Campbells & Slankers");
    include('includes/header.php');
//    error_reporting(E_ALL);
//    ini_set('display_errors', 1);

    //Getting the current user id of this session
    //This variable hold the user name of the current user
    //This queries the Db for the player ID associated with this user
    //This variable holds the data returned by the query

    //Getting email of current user

    //Getting the current day and setting the week information
    //This retrieves the day in numeric form (i.e. Monday = 1)
    //This executes a function to find the date of the current or upcoming Sunday
    //This queries the Db for the week number based on the date of the current or upcoming Sunday
    //This variable holds the data returned by the query
    //This queries the Db to retreive the amount of games for the current week
    //The variable holds the data returned by the query
    //This query retreives the amount of games for the previous week
     //This variable holds the data returned by the query

    //Initializing the INSERT query variables
    $insertQuery = "";
    $year   =   date('Y');

    //Initializing the success or failure variables
    $success = "";
    $error  = "";

    //Getting current week picks


    //Getting last weeks picks


    //Getting the wins and losses for the previous week


    //Getting the total wins and losses for user


    //Running the game queries for the current week


    //Form submit code
    

?>

<section>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="hero">
    
            <h1>Welcome <span><?php echo $THE_USER->UserName; ?></span>&#33;</h1>

        </div>
    </div>
</section>

<section>
<div class="row no-gutters">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="winList">
            
        <?php if($stat_init_check) { 
    
                $currentWins = $USER_STATS_NOW->get_wins();
                $currentLoss = $USER_STATS_NOW->get_losses();
    
        ?>
       
            <h1>Week <?php echo $USER_STATS_NOW->WeekNumber; ?> Record</h1>
            <p><?php echo $currentWins; ?> - <?php echo $currentLoss; ?></p>
        
        <?php } else if (!$stat_init_check) { 
    
                $USER_STATS_ALL->get_user_stats($THE_USER->playerID);
                $USER_WINS = $USER_STATS_ALL->get_wins();
                $USER_LOSSES = $USER_STATS_ALL->get_losses();
    
        ?>
            
            <h1>Career Record</h1>
            <p><?php echo $USER_WINS; ?> &ndash; <?php echo $USER_LOSSES; ?></p>
        
        <?php } ?>

</div>
</div><!-- end of row -->

<div class="row no-gutters">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 info">
   
    <h2><?php echo $THE_USER->UserName; ?> Stats&#58;</h2>
    
</div>

<div class="info col-xs-12 col-sm-12 col-md-8 col-lg-8">
<?php if($sch_init_check) { 

            $USER_STATS_YEAR->user_stats_by_yr($THE_USER->playerID, date('Y'));
            $YEAR_WINS = $USER_STATS_YEAR->get_wins();
            $YEAR_LOSS = $USER_STATS_YEAR->get_losses();
    
?>
    
    <h3>Current Record&#58; &#40;<?php echo $YEAR_WINS; ?>&#45;<?php echo $YEAR_LOSS; ?>&#41;</h3>
    
<?php } else if (!$sch_init_check) { ?>

    <h3>No Current Schedule</h3>

<?php } ?>

</div>
</div><!-- end of row -->

<div class="row no-gutters">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 info">

<?php if($sch_init_check) {?>
   
    <h4>Week <?php echo $USER_STATS_NOW->WeekNumber; ?> picks&#58;</h4>

<?php } else if (!$sch_init_check) {?>
    
    <h4>Off Week&#58;</h4>

<?php } ?>

</div>
                  
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 info">
<?php 
    
    
    if($sch_init_check) {
    
    
?>
                <ul>
                    <?php 
    
                    if (isset($USER_STATS_NOW->TeamName)) {
    
                        for ($i = 0; $i < count($USER_STATS_NOW->TeamName); $i++) {
                            
                            if ($USER_STATS_NOW->StatResult[$i] === 'W') {
        
                                echo "<li class=\"win\"><img src=\"images/win_img.png\" width=\"27\" height=\"34\"> {$USER_STATS_NOW->TeamName[$i]}</li>";
        
                            } else if ($USER_STATS_NOW->StatResult[$i] === "L") {
                            
                                echo "<li class=\"lose\"><img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> {$USER_STATS_NOW->TeamName[$i]}</li>";
                            
                            } else {
                            
                                echo "<li>{$USER_STATS_NOW->TeamName[$i]}</li>";
                            
                            }
                            
                        }
                        
                    } else {
                        
                        echo "<li id=\"wideMsg\">No Picks for this week</li><br>";
                        
                    }
                ?>
                </ul>
                
<?php } else if (!$sch_init_check) { ?>
                
        <h3>No picks required</h3>

<?php } ?> 
                
</div>
</div><!-- end of row -->

<div class="row no-gutters">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 info">
<?php if($sch_init_check) { ?>
        <h4>Last week&#39;s picks&#58;</h4>
<?php } else if (!$sch_init_check) {?>
        <h4>Off Week&#58;</h4>
<?php } ?>
</div>    
           
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 info">
           
<?php if($sch_init_check) { ?>
           
            <ul>
                <?php
    
                    if ($USER_STATS_NOW->WeekNumber !== "1") {
                        
                        //Initialize the previous weeks stats object
                        $USER_STATS_PREV->user_stats_by_wk($THE_USER->playerID, $currentWeekNum-1, date('Y'));
                        
                        if (!empty($USER_STATS_PREV->TeamName)) {
                        
                            for ($i = 0; $i < count($USER_STATS_PREV->StatID); $i++) {
                                
                                    if ($USER_STATS_PREV->StatResult[$i] === "W") {
            
                                        echo "<li class=\"win\"><img src=\"images/win_img.png\" width=\"27\" height=\"34\"> {$USER_STATS_PREV->TeamName[$i]}</li>";
                                        
                                    } else if ($USER_STATS_PREV->StatResult[$i] === "L") {
                                        
                                        echo "<li class=\"lose\"><img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> {$USER_STATS_PREV->TeamName[$i]}</li>";
                                        
                                    }
                                
                            }
                        
                        } else {
                        
                            echo "<li>Picks not found for Week ".($currentWeekNum-1) ."</li>";
                        
                        }
                        
                    } else if ($USER_STATS_NOW->WeekNumber === "1") {
                        
                        echo "<li>No picks required</li>";
                        
                    } 
                ?>
            </ul>
               
<?php } else if (!$sch_init_check) { ?>
                
        <h3>No picks required</h3>

<?php } ?>    
</div>


</div><!-- end of row --> 
<div class="row no-gutters">

    <div class="col-xs-12 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6" id="quick">

       <?php if ($sch_init_check) {  ?>
       
        <h1>Enter Picks&#58;</h1>
        
        <?php 
                                   
            if (!isset($USER_STATS_NOW->TeamName)) { 
                echo "<p>Need to enter your picks&#63;</p><br>";
                echo "<p><a href=\"schedule.php?week=".$currentWeekNum."\">Go&#33;</a></p>";
                
            } else if ($USER_STATS_NOW->open_games() === "TRUE") { 
                echo "<p>Need to update your picks&#63;</p><br>";
                echo "<p><a href=\"schedule.php?week=".$currentWeekNum."\">Update</a></p>";
                
            } else {
                
                echo"<p>Week {$USER_STATS_NOW->WeekNumber} Closed</p>";
                
            }
                                  
        } else 
        
        if (!$sch_init_check) { ?>
       
        <h1>&#126;No Schedule&#126;</h1>
        <p>It&#39;s the off&ndash;season&#33;</p>
        
        <?php } ?>
    </div>
       
</div>

</section>

<!--<section id="scheduleBanner">
 
 


<script src="carousel.js"></script> -->
<?php

	include('includes/footer.php');

?>

