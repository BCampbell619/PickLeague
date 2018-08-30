<?php

	define("TITLE","Players | League of Campbells & Slankers");
	include('includes/header.php');

    $bridge = array (
    
                "wins"      => 758,
                "losses"    => 509,
                "season"    => 6,
    );

    $broc = array (
    
                "wins"      => 790,
                "losses"    => 490,
                "season"    => 6,
    );

    $bryce = array (
    
                "wins"      => 735,
                "losses"    => 545,
                "season"    => 6,
    );

    $elizabeth = array (
    
                "wins"      => 800,
                "losses"    => 480,
                "season"    => 6,
    );

    $john = array (
    
                "wins"      => 318,
                "losses"    => 194,
                "season"    => 3,
    );

    $jordan = array (
    
                "wins"      => 452,
                "losses"    => 300,
                "season"    => 4,
    );

    $jtheBeautiful = array (
    
                "wins"      => 0,
                "losses"    => 0,
                "season"    => 1,
    );

    $scotty = array (
    
                "wins"      => 425,
                "losses"    => 326,
                "season"    => 4,
    );

    $talon = array (
    
                "wins"      => 452,
                "losses"    => 300,
                "season"    => 4,
    );

    $tamra = array (
    
                "wins"      => 633,
                "losses"    => 375,
                "season"    => 5,
    );

$bmcW = $bridge['wins'] + $bridgeTotalW;
$bmcL = $bridge['losses'] + $bridgeTotalL;

$bhcW = $broc['wins'] + $brocTotalW;
$bhcL = $broc['losses'] + $brocTotalL;

$bccW = $bryce['wins'] + $bryceTotalW;
$bccL = $bryce['losses'] + $bryceTotalL;

$emcW = $elizabeth['wins'] + $elizabethTotalW;
$emcL = $elizabeth['losses'] + $elizabethTotalL;

$jwsW = $john['wins'] + $johnTotalW;
$jwsL = $john['losses'] + $johnTotalL;

$jdcW = $jordan['wins'] + $jordanTotalW;
$jdcL = $jordan['losses'] + $jordanTotalL;

$jhcW = $jtheBeautiful['wins'] + $jtheTotalW;
$jhcL = $jtheBeautiful['losses'] + $jtheTotalL;

$sgcW = $scotty['wins'] + $scottyTotalW;
$sgcL = $scotty['losses'] + $scottyTotalL;

$tfcW = $talon['wins'] + $talonTotalW;
$tfcL = $talon['losses'] + $talonTotalL;

$tlcW = $tamra['wins'] + $tamraTotalW;
$tlcL = $tamra['losses'] + $tamraTotalL;

    //Getting the data for each user (i.e. wins and losses)
    $userWinsQ = $database->allUserWins();
    $userLossQ = $database->allUserLosses();

    //Setting the $perc variable
    $perc = "";

?>

        <div class="table-data">
            
            <table>

                <thead>

                    <tr>

                        <th>Player</th>
                        <th>Wins</th>
                        <th>Losses</th>
                        <th>Win &#37;</th>

                    </tr>

                </thead>

                <tbody>
                    
<?php 
                    
                    if ($userWinsQ != "No data for users" && $userLossQ != "No data for users") {
                        
                        userStart:
                        
                        while($userW = mysqli_fetch_assoc($userWinsQ)) {
                            
                            while($userL = mysqli_fetch_assoc($userLossQ)) {
                                
                                echo "<tr>
                                        <th>$userW[User]</th>
                                        <td>$userW[Wins]</td>";
                                
                                echo "<td>$userL[Losses]</td>
                                    <td>".$perc = winPerc($userW['Wins'], $userL['Losses'])."&#37;</td>
                                    
                                    </tr>";
                                
                                goto userStart;
                                
                            }
                            
                        }
                        
                    }
                    
?>

              </tbody>


            </table>
            
        </div>

<?php

	include('includes/footer.php');

?>

