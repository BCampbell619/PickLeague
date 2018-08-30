<?php 
    
    define("TITLE", "Profile | League of Campbells & Slankers");
    include('includes/header.php');

    // Setting the stats variables
    $USER_STATS_ALL->get_user_stats($THE_USER->playerID);
    $USER_STATS_PREV->user_stats_by_yr($THE_USER->playerID, date('Y')-1);

    // Set the ALL_STATS wins and losses
    $allTimeWins = $USER_STATS_ALL->get_wins();
    $allTimeLosses = $USER_STATS_ALL->get_losses();

    // Set the current year's wins and losses
    $currYrWins = $USER_STATS_NOW->get_wins();
    $currYrLosses = $USER_STATS_NOW->get_losses();

    // Set the previous year's wins and losses
    $prevYrWins = $USER_STATS_PREV->get_wins();
    $prevYrLosses = $USER_STATS_PREV->get_losses();

    // Getting all the years in the SCHEDULES table
    $getYears = "SELECT DISTINCT(sch_year) FROM SCHEDULES;";
    $getYearsData = mysqli_query($database->Connection, $getYears);

    
    // Setting the profile statistics object
    $USER_STATS_PROF = new Statistics();
    $WK_OBJ_INDEX = ['$USER_STATS_WK1', '$USER_STATS_WK2', '$USER_STATS_WK3', '$USER_STATS_WK4', '$USER_STATS_WK5', '$USER_STATS_WK6', '$USER_STATS_WK7', '$USER_STATS_WK8', '$USER_STATS_WK9', '$USER_STATS_WK10', '$USER_STATS_WK11', '$USER_STATS_WK12', '$USER_STATS_WK13', '$USER_STATS_WK14', '$USER_STATS_WK15', '$USER_STATS_WK16', '$USER_STATS_WK17'];

    if (isset($_POST['getMyPicks'])) {
        
        $sql = "SELECT DISTINCT(WeekNumber) FROM STATS WHERE playerID = {$THE_USER->playerID} AND GameYear = {$_POST['year']};";
        
        $limbo = $database->query($sql);
        
        while ($rows = mysqli_fetch_assoc($limbo)) {
            
            $WeekNumber[] = $rows['WeekNumber'];
            
        }
        
        array_multisort($WeekNumber, SORT_ASC, SORT_NUMERIC);
        
        for ($i = 0; $i < count($WeekNumber); $i++) {
            
            $WK_OBJ_INDEX[$i] = new Statistics();
            $WK_OBJ_INDEX[$i]->user_stats_by_wk($THE_USER->playerID, $WeekNumber[$i], $_POST['year']);
            
        }
        
    }
    
?>

<section>
   
   <div class="row">      
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">            
        <div class="profDetail">
           <img src="Images/staticProfile_LG.png" alt="Profile Image">
            <p>User Name: <?php echo $THE_USER->UserName; ?></p>
            <p>First Name: <?php echo $THE_USER->FirstName; ?></p>
            <p>Last Name: <?php echo $THE_USER->LastName; ?></p>
            <p>Email: <?php echo $THE_USER->Email; ?></p>
            <p>Date Joined: <?php echo $THE_USER->JoinDate; ?></p>
          </div>
       </div>
   </div>
<div class="row">
  
    <div class="col-xs-12 col-sm-12 col-md-6 col-md-6 contain">
       
       <h2 class="stat">Picks By Year <img src="Images/arrowGraphUpRight.png" alt=""></h2>
        
        <form action="profile.php" method="post">
            
            <label for="year">Please Select a Year&#58;</label>
            <select name="year" id="yr">
            
            <?php while ($yr = mysqli_fetch_assoc($getYearsData)) {
    
                    echo "<option value=\"$yr[sch_year]\">$yr[sch_year]</option>";
                    
                    } 
                
            ?>
            
            </select><br>
            
            <button class="mybtn" name="getMyPicks">Select</button>
            
        </form>
        
    </div>
   
   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       
       <h2 class="stat">Stat Summary <img src="Images/graphHorizontal.png" alt=""></h2>
       
           <h4>All&ndash;Time Record</h4>
           <p><?php echo $allTimeWins; ?>-<?php echo $allTimeLosses; ?></p>
       
           <h5>This Year</h5>
           <p><?php echo $currYrWins; ?>-<?php echo $currYrLosses; ?></p>
       
           <h5>Last Year</h5>
           <p><?php echo $prevYrWins; ?>-<?php echo $prevYrLosses; ?></p>
       
       
   </div>

</div>

<div class="row">
       

    
</div>
</section>

<section>
<?php if (isset($WK_OBJ_INDEX[0]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[0]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[0]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[0]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[0]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[0]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[0]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[0]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
 <?php if (isset($WK_OBJ_INDEX[1]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[1]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[1]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[1]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[1]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[1]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[1]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[1]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
 <?php if (isset($WK_OBJ_INDEX[2]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[2]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[2]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[2]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[2]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[2]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[2]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[2]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
   
<?php if (isset($WK_OBJ_INDEX[3]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[3]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[3]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[3]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[3]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[3]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[3]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[3]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
 <?php if (isset($WK_OBJ_INDEX[4]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[4]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[4]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[4]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[4]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[4]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[4]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[4]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
 <?php if (isset($WK_OBJ_INDEX[5]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[5]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[5]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[5]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[5]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[5]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[5]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[5]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
   
<?php if (isset($WK_OBJ_INDEX[6]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[6]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[6]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[6]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[6]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[6]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[6]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[6]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
 <?php if (isset($WK_OBJ_INDEX[7]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[7]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[7]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[7]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[7]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[7]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[7]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[7]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
   
<?php if (isset($WK_OBJ_INDEX[8]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[8]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[8]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[8]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[8]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[8]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[8]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[8]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
 <?php if (isset($WK_OBJ_INDEX[9]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[9]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[9]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[9]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[9]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[9]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[9]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[9]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
 <?php if (isset($WK_OBJ_INDEX[10]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[10]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[10]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[10]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[10]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[10]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[10]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[10]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>

 <?php if (isset($WK_OBJ_INDEX[11]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[11]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[11]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[11]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[11]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[11]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[11]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[11]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
 <?php if (isset($WK_OBJ_INDEX[12]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[12]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[12]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[12]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[12]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[12]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[12]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[12]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
   
<?php if (isset($WK_OBJ_INDEX[13]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[13]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[13]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[13]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[13]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[13]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[13]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[13]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>

 <?php if (isset($WK_OBJ_INDEX[14]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[14]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[14]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[14]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[14]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[14]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[14]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[14]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>

 <?php if (isset($WK_OBJ_INDEX[15]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[15]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[15]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[15]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[15]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[15]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[15]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[15]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
   
 <?php if (isset($WK_OBJ_INDEX[16]->StatID)) {?>
    <div class="profileWk">
    
        <h2>Week <?php echo $WK_OBJ_INDEX[16]->WeekNumber[0]; ?></h2>

        
        <ul>
           
           <?php for ($i = 0; $i < count($WK_OBJ_INDEX[16]->StatID); $i++) {?>
            
            <li><?php 
                                                                           
                    if ($WK_OBJ_INDEX[16]->StatResult[$i] === "W") {
                    
                        echo "<img src=\"images/win_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[16]->TeamName[$i]; 
                        
                    } else if ($WK_OBJ_INDEX[16]->StatResult[$i] === "L") {
                        
                        echo "<img src=\"images/loss_img.png\" width=\"27\" height=\"34\"> ".$WK_OBJ_INDEX[16]->TeamName[$i];
                        
                    } else {
                        
                        echo $WK_OBJ_INDEX[16]->TeamName[$i];
                        
                    }
                
                ?>
                    
            </li>
            
            <?php } ?>
            
        </ul>
        
    </div>
    
<?php } ?>
    
</section>

<?php

    include('includes/footer.php');

?>