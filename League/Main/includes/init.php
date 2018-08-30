<?php
    date_default_timezone_set('America/Los_Angeles');
    define('CURR_DATE', date('Ymd'));
    define('CURR_TIME', date('H:i:s'));
    require('database.php');
    require('DB_Object.php');
    require('schedule_class.php');
    require('player_class.php');
    require('statistics_class.php');
    require('utility_class.php');

// Initializing the current week's schedule
// $currentSchedule is a class Schedule object
// $currentWeekNum is a variable to hold the return value of the get_week() method of Schedule class
// $currentWeekNum is either FALSE or has the number of the current or upcoming week/schedule
// if $currentWeekNum is FALSE it is set to 0
// if $currentWeekNum is an integer then it will be fed into the select_schedule method of the $currentSchedule object

    $currentSchedule = new Schedule();
    $currentWeekNum = $SCHEDULE->get_week();

    if (!$currentWeekNum) {
        
        $currentWeekNum = 0;
        
    } else {
        
        $currentSchedule->select_schedule($currentWeekNum, date('Y'));
        $rec_init_check = Util::check_scores($currentSchedule->sch_wk[0]);
        
    }

// $THE_USER is set as a Player class object
// $THE_USER is initialized when the player logs in successfully,
// meaning the $_SESSION['UserName'] is set

    $THE_USER = new Player();

    if (isset($_SESSION['UserName'])) {
        
        $THE_USER->select_player($_SESSION['UserName']);
        
    }
    

// $USER_STATS_NOW, $USER_STATS_YEAR, & $USER_STATS_ALL are set Statistics class objects
// $USER_STATS_NOW will be used for the current year throught the site
// $USER_STATS_YEAR will be used to query the stat results by year on the profile page
// $USER_STATS_ALL will be used to query career stats
// $USER_STATS_NOW is the only one initialized here. The $USER_STATS_YEAR will be initialized
// when the user is selecting a year on their profile page
// $USER_STATS_NOW is initialized if the playerID of the $THE_USER object is set
// and the $currentWeekNum is not 0

    $USER_STATS_NOW = new Statistics();
    $USER_STATS_PREV = new Statistics();
    $USER_STATS_YEAR = new Statistics();
    $USER_STATS_ALL = new Statistics();

    if (isset($THE_USER->playerID) && $currentWeekNum !== 0) {

        $USER_STATS_NOW->user_stats_by_wk($THE_USER->playerID, $currentWeekNum, date('Y'));

    }

    $USER_STATS_NOW->playerID = $THE_USER->playerID;
    $USER_STATS_NOW->WeekNumber = $currentWeekNum;

    if(isset($_POST['select_submit'])) {
        $index = ['game_1', 'game_2', 'game_3', 'game_4', 'game_5', 'game_6', 'game_7', 'game_8', 'game_9', 'game_10', 'game_11', 'game_12', 'game_13', 'game_14', 'game_15', 'game_16'];
        
        if (!isset($USER_STATS_NOW->TeamName)) {
            
            for ($i = 0; $i < count($currentSchedule->sch_id); $i++) {
            
                $USER_STATS_NOW->TeamName[] = $_POST[$index[$i]];
            
            }
            
        } else if (count($USER_STATS_NOW->TeamName >= 1)) {
        
        
            for ($i = 0; $i < count($currentSchedule->sch_id); $i++) {
                
                if (isset($_POST[$index[$i]])) {
                    
                    $USER_STATS_NOW->TeamName[$i] = $_POST[$index[$i]];
                    
                }
                
            }
        
        }
        
        $USER_STATS_NOW->call_insert();
        
    }

?>