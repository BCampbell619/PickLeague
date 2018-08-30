<?php

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "R77ZdvPs2qnzQYSu");
    define("DB_DATABASE", "league");

    class Database {
        
        public $Connection;
        
        function __construct(){
            
            $this->get_connect();
            
        }
        
        public function get_connect() {
            
            //$this->Connection = mysqli_connect("localhost", "thecamp7_admin", "573-Gzw-wD2-HLH", "thecamp7_LEAGUE");
            
            $this->Connection = mysqli_connect("localhost", "root", "R77ZdvPs2qnzQYSu", "league");
            
            if (mysqli_connect_errno()){
                
                die("Could not connect to database ".mysqli_connect_errno());
                
            }
            
        }
        
        public function query($qry) {
            
            $result = mysqli_query($this->Connection, $qry);
            
            $this->confirm_qry($result);
            
            return $result;
            
        }
        
        protected function confirm_qry($result) {
            
            if(!$result) {
                
                die("Query failed ".mysqli_error($this->Connection));
                
            }
            
        }
        
        public function escaped_string($str) {
            
            $escStr = mysqli_real_escape_string($this->Connection, $str);
            
            return $escStr;
            
        }
        
        public function is_user ($UserName, $Connect) {
    
            $query = mysqli_query($Connect, "SELECT UserName FROM PLAYER WHERE UserName = \"$UserName\";");
            
            if (mysqli_num_rows($query) == 1) {
                
                return TRUE; 
                
            } else {
                
                return FALSE;
                
            }

        }

        public function is_email($email) {
            
            $query = mysqli_query($this->Connection, "SELECT Email FROM PLAYER WHERE Email = \"$email\";");
            
            if (mysqli_num_rows($query) == 1) {
                
                return TRUE;
                
            } else {
                
                return FALSE;
                
            }
            
        }
        
        public function get_password($User, $Connect) {
    
            $query  =   mysqli_query($this->Connection, "SELECT UserPassword FROM PLAYER WHERE UserName = \"$User\";");
    
            $result =   mysqli_fetch_assoc($query);
            return $result['UserPassword'];
    
        }
        
        public function insert_player($fName, $lName, $e_mail, $User, $encPass, $signUpDate, $Connect) {
    
            $query = mysqli_query($Connect, "INSERT INTO PLAYER(FirstName, LastName, Email, UserName, UserPassword, JoinDate) VALUES (\"$fName\", \"$lName\", \"$e_mail\", \"$User\", \"$encPass\", \"$signUpDate\");");
       
        }
        

        public function get_week($sunday) {
            
            $qResult    =   mysqli_query($this->Connection, "SELECT WeekNumber FROM GAME_SCHEDULE WHERE LEFT(GameDate, 10) = '$sunday' LIMIT 1;");
            
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noWeek = "No Week Selected";
                return $noWeek;
                
            }
            
        }
        
        public function game_count($weekNumber) {
            
            $qResult    =   mysqli_query($this->Connection, "SELECT DISTINCT COUNT(GameNumber) AS Games FROM GAME_SCHEDULE WHERE WeekNumber = $weekNumber GROUP BY WeekNumber;");
            
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noGameCount    =   "No games counted";
                return $noGameCount;
                
            }
            
        }
        
        public function getGameNumbers($teamName, $wkNumber) {
            
            $qResult    =   mysqli_query($this->Connection, "SELECT GameNumber FROM STATS WHERE TeamName = '$teamName' AND WeekNumber = $wkNumber;");
            
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noGameNumber    =   "No games number";
                return $noGameNumber;
                
            }
            
        }
        
        public function get_all_games($week){
            
            $wkNum  =   intval($week);
            
            $qResult = mysqli_query($this->Connection, "SELECT t.WeekNumber AS Week, t.GameNumber AS Game, t.Team, t.TeamStatus AS Location, t.TeamScore AS Score, DATE_FORMAT(g.GameDate, '%a %b %d %Y') AS Date,                                             DATE_FORMAT(g.GameDate, '%r') AS Time
                                                        FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                        WHERE t.WeekNumber = $wkNum
                                                        ORDER BY t.GameNumber, t.TeamStatus DESC;");
            
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                die("Result set returned empty.");
                
            }
            
            
        }
        
        public function thurs_Query_Home($week){
            
            $wkNum  =   intval($week);
            
            $thQuery    =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Thu' AND t.WeekNumber = $wkNum AND t.TeamStatus = 'Home'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($thQuery)) {
                
                return $thQuery;
                
            } else {
                
                $noGames = "No Thursday Games";
                return $noGames;
                
            }
            
        }
        
        public function thurs_Query_Away($week){
            
            $wkNum  =   intval($week);
            
            $thQuery    =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Thu' AND t.WeekNumber = $wkNum AND t.TeamStatus = 'Away'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($thQuery)) {
                
                return $thQuery;
                
            } else {
                
                $noGames = "No Thursday Games";
                return $noGames;
                
            }
            
        }
        
        public function sat_Query_Home($week){
            
            $wkNum  =   intval($week);
            
            $satQuery    =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sat' AND t.WeekNumber = $wkNum AND t.TeamStatus = 'Home'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($satQuery)) {
                
                return $satQuery;
                
            } else {
                
                $noGames = "No Saturday Games";
                return $noGames;
                
            }
            
        }
        
        public function sat_Query_Away($week){
            
            $wkNum  =   intval($week);
            
            $satQuery    =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sat' AND t.WeekNumber = $wkNum AND t.TeamStatus = 'Away'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($satQuery)) {
                
                return $satQuery;
                
            } else {
                
                $noGames = "No Saturday Games";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query06_Home($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery06  =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '6:30 AM' AND t.TeamStatus = 'Home'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery06)) {
                
                return $sunQuery06;
                
            } else {
                
                $noGames = "No 630AM Sunday Games";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query06_Away($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery06  =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '6:30 AM' AND t.TeamStatus = 'Away'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery06)) {
                
                return $sunQuery06;
                
            } else {
                
                $noGames = "No 630AM Sunday Games";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query10_Home($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery10  =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '10:00 AM' AND t.TeamStatus = 'Home'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery10)) {
                
                return $sunQuery10;
                
            } else {
                
                $noGames = "No 10AM Sunday Games";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query10_Away($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery10  =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '10:00 AM' AND t.TeamStatus = 'Away'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery10)) {
                
                return $sunQuery10;
                
            } else {
                
                $noGames = "No 10AM Sunday Games";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query1305_Home($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery1305  =  mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '1:05 PM' AND t.TeamStatus = 'Home'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery1305)) {
                
                return $sunQuery1305;
                
            } else {
                
                $noGames = "No 1:05PM Sunday Games";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query1305_Away($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery1305  =  mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '1:05 PM' AND t.TeamStatus = 'Away'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery1305)) {
                
                return $sunQuery1305;
                
            } else {
                
                $noGames = "No 1:05PM Sunday Games";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query1325_Home($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery1325  =  mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '1:25 PM' AND t.TeamStatus = 'Home'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery1325)) {
                
                return $sunQuery1325;
                
            } else {
                
                $noGames = "No 1:25PM Games";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query1325_Away($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery1325  =  mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '1:25 PM' AND t.TeamStatus = 'Away'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery1325)) {
                
                return $sunQuery1325;
                
            } else {
                
                $noGames = "No 1:25PM Games";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query1730_Home($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery1730  =  mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '5:30 PM' AND t.TeamStatus = 'Home'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery1730)) {
                
                return $sunQuery1730;
                
            } else {
                
                $noGames = "No Sunday Night Game";
                return $noGames;
                
            }
            
        }
        
        public function sun_Query1730_Away($week){
            
            $wkNum  =   intval($week);
            
            $sunQuery1730  =  mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = $wkNum AND DATE_FORMAT(g.GameDate, '%l:%i %p') = '5:30 PM' AND t.TeamStatus = 'Away'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($sunQuery1730)) {
                
                return $sunQuery1730;
                
            } else {
                
                $noGames = "No Sunday Night Game";
                return $noGames;
                
            }
            
        }
        
        public function mon_Query_Home($week){
            
            $wkNum  =   intval($week);
            
            $monQuery    =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Mon' AND t.WeekNumber = $wkNum AND t.TeamStatus = 'Home'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($monQuery)) {
                
                return $monQuery;
                
            } else {
                
                $noGames = "No Monday Night Game";
                return $noGames;
                
            }
            
        }
        
        public function mon_Query_Away($week){
            
            $wkNum  =   intval($week);
            
            $monQuery    =   mysqli_query($this->Connection, "SELECT t.GameNumber AS Game, t.Team, g.GameDate AS Date
                                                            FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
                                                            WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Mon' AND t.WeekNumber = $wkNum AND t.TeamStatus = 'Away'
                                                            ORDER BY t.GameNumber;");
            
            if ($this->test_query($monQuery)) {
                
                return $monQuery;
                
            } else {
                
                $noGames = "No Monday Night Game";
                return $noGames;
                
            }
            
        }
        
        private function test_query($queryResult) {
            
            if (mysqli_num_rows($queryResult) >= 1) {
                
                return TRUE;
                
            } else {
                
                return FALSE;
                
            }
            
        }
        
        public function getUserID($userName) {
            
            $qResult = mysqli_query($this->Connection, "SELECT playerID FROM PLAYER WHERE UserName = '$userName';");
            
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noUser = "No User Name Selected";
                return $noUser;
                
            }
            
        }
        
        public function getAllWins($userID, $year) {
            
            $qResult = mysqli_query($this->Connection, "SELECT COUNT(statResult) AS Wins FROM STATS WHERE playerID = $userID and statResult = 'W' and GameYear = $year;");
                
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noWins = "No results for this year";
                return $noWins;
                
            }
            
        }
        
        public function getAllLosses($userID, $year) {
            
            $qResult = mysqli_query($this->Connection, "SELECT COUNT(statResult) AS Losses FROM STATS WHERE playerID = $userID and statResult = 'L' and GameYear = $year;");
                
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noLosses = "No results for this year";
                return $noLosses;
                
            }
            
        }
        
        public function getPlayerStats($userID, $Week, $year) {
            
            $week = intval($Week);
            $player = intval($userID);
            $yrSelect = intval($year);
            
            $pStatQuery = mysqli_query($this->Connection, "SELECT * FROM STATS WHERE playerID = $player AND WeekNumber = $week AND GameYear = $yrSelect ORDER BY WeekNumber, GameNumber;");
                
            if ($this->test_query($pStatQuery)) {
                
                return $pStatQuery;
                
            } else {
                
                $noStats = "No Stats for this week";
                return $noStats;
                
            }
            
        }
        
        public function getCurrWeekWins($userID, $week, $year) {
            
            $wkNum  =   intval($week);
            $player =   intval($userID);
            
            $qResult = mysqli_query($this->Connection, "SELECT COUNT(statResult) AS Wins FROM STATS WHERE playerID = $player and statResult = 'W' and WeekNumber = $wkNum and GameYear = $year;");
                
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noWins = "No results for this year";
                return $noWins;
                
            }
            
        }
        
        public function getCurrWeekLosses($userID, $week, $year) {
            
            $wkNum  =   intval($week);
            $player =   intval($userID);
            
            $qResult = mysqli_query($this->Connection, "SELECT COUNT(statResult) AS Losses FROM STATS WHERE playerID = $player and statResult = 'L' and WeekNumber = $wkNum and GameYear = $year;");
                
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noLosses = "No results for this year";
                return $noLosses;
                
            }
            
        }
        
        public function getPrevWeekWins($userID, $week, $year) {
            
            $wkNum  =   intval($week);
            
            $wkNum  =   $wkNum - 1;
            
            $qResult = mysqli_query($this->Connection, "SELECT COUNT(statResult) AS Wins FROM STATS WHERE playerID = $userID and statResult = 'W' and WeekNumber = $wkNum and GameYear = $year;");
                
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noWins = "No results for this year";
                return $noWins;
                
            }
            
        }
        
        public function getPrevWeekLosses($userID, $week, $year) {
            
            $wkNum  =   intval($week);
            
            $wkNum  =   $wkNum - 1;
            
            $qResult = mysqli_query($this->Connection, "SELECT COUNT(statResult) AS Losses FROM STATS WHERE playerID = $userID and statResult = 'L' and WeekNumber = $wkNum and GameYear = $year;");
                
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noLosses = "No results for this year";
                return $noLosses;
                
            }
            
        }
        
        public function getCurrWkPix($userID, $week, $year) {
            
            $wkNum  =   intval($week);
            $player =   intval($userID);
            
            $qResult = mysqli_query($this->Connection, "SELECT DISTINCT(s.TeamName), g.GameDate AS Date, s.StatResult FROM STATS s JOIN GAME_SCHEDULE g ON s.WeekNumber = g.WeekNumber and s.GameNumber = g.GameNumber WHERE s.playerID = $player and s.WeekNumber = $wkNum and s.GameYear = $year;");
                
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noPicks = "No Picks for this week";
                return $noPicks;
                
            }
            
        }
        
        public function allUserWins() {
            
            $qResult = mysqli_query($this->Connection, "SELECT p.UserName AS User, COUNT(s.StatResult) AS Wins FROM STATS s JOIN PLAYER p ON s.playerID = p.playerID WHERE s.StatResult = 'W' GROUP BY p.UserName ORDER BY p.UserName;");
            
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noData = "No data for users";
                return $noData;
                
            }
            
        }
        
        public function allUserLosses() {
            
            $qResult = mysqli_query($this->Connection, "SELECT p.UserName AS User, COUNT(s.StatResult) AS Losses FROM STATS s JOIN PLAYER p ON s.playerID = p.playerID WHERE s.StatResult = 'L' GROUP BY p.UserName ORDER BY p.UserName;");
            
            if ($this->test_query($qResult)) {
                
                return $qResult;
                
            } else {
                
                $noData = "No data for users";
                return $noData;
                
            }
            
        }
        
    }

$database = new Database();












?>