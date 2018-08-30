<?php
    session_start();
//    error_reporting(E_ALL);
//    ini_set('display_errors', 1);
	$leagueName = "League of Campbells & Slankers";
    $admin      = FALSE;
    include('includes/init.php');
    include('includes/functions.php');
    include('includes/arrays.php');

    $sch_init_check = FALSE;
    $player_init_check = FALSE;
    $stat_init_check = FALSE;
    

    if(isset($currentSchedule->sch_id)) {
        
        $sch_init_check = TRUE;
        
    }

    if(isset($THE_USER->playerID)) {
        
        $player_init_check = TRUE;
        
    }

    if(isset($USER_STATS_NOW->playerID)) {
        
        $stat_init_check = TRUE;
        
    }

    if (!logged_in()) {
        
        header('location: ../index.php');
        
    }

    if ($player_init_check) {
        if ($THE_USER->UserName === "B_rockn_u") {
            $admin = TRUE;
        }
    }

    if ($rec_init_check >= 1) {
        
        $USER_STATS_NOW->get_stat_results();
        
    }

?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo TITLE; ?></title>
<link href="main.css" rel="stylesheet" type="text/css"/>
<link href="main_tab.css" rel="stylesheet" type="text/css"/>
<link href="main_mobile.css" rel="stylesheet" type="text/css"/>
<link href="admin.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Anaheim" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
      
    <div id="wrapper">
      
    <div class="container-fluid">
        <div class="row">
            <div class="usrBar col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul>
                    
                    <li>                  
                        <div id="profile"><?php $player_init_check ? print $THE_USER->UserName : print "Guest User"; ?> <img src="/Main/Images/staticProfile.png" alt="profile image" width="26" height="32"></div>
                        
                        <div class="drop-content" id="usrProfile">
                            <ul>
                                <?php if ($admin) { ?>
                                <li><a href="admin.php?name=<?php echo $_SESSION['UserName']; ?>" id="first">Admin <img src="/Main/Images/briefcase.png" alt="Admin image briefcase" width="17" height="21"></a></li>
                                <li><a href="profile.php">Profile <img src="/Main/Images/cog-gear.png" alt="Profile cog" width="15px" height="21px"></a></li>
                                <li><a href="logout.php">Logout <img src="/Main/Images/logOut.png" alt="Logout image" width="15px" height="20px"></a></li>
                                <?php ; } else { ?>
                                <li id="first"><a href="profile.php">Profile <img src="/Main/Images/cog-gear.png" alt="Profile cog" width="15px" height="21px"></a></li>
                                <li><a href="logout.php">Logout <img src="/Main/Images/logOut.png" alt="Logout image" width="15px" height="18px"></a></li>
                                <?php ; }?>
                            </ul>
                        </div>
                    
                    </li>
                </ul>
            </div>
        </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="leagueNav">    
            <ul>
                <li><a href="landing.php">Home</a></li>
                <li><a href="players.php">Players</a></li>
                <li><a href="contact.php">Contact</a></li>
                
            </ul>
        </div>
    </div>