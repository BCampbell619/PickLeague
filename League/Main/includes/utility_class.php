<?php

    class Util {
        
        public static function clean_up($var){
    
            $var = trim($var);
            $var = stripslashes($var);
            $var = htmlspecialchars($var);
            return $var;
    
        }

        public static function no_header_inject($str){
            
            return preg_match( "/[\r\n]/", $str );
            
        }
        
        public static function strip_bad_chars( $input ) {
            
            $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input );
            return $output;
            
        }
        
        /*
        This function is to clear any arrays that need to be cleared before filling
        This is usually used for the StatResults array - clearing the 'U' that is set
        before any action happens in the week
        */
        
        public static function clear_array($arr) {
            
            for ($i = 0; $i < count($arr); $i++) {
                
                array_shift($arr);
                
            }
            
            
        }
        
        /*
        This function is used to check if any scores have been added to any of the games
        for the week. If no scores have been added then the get_stats() function is not run
        If there are scores set then the get_stats() function is run
        */
        
        public static function check_scores($wkNum) {
            global $database;
            $sql = "SELECT SUM(sch_home_score) AS 'Home Total', SUM(sch_away_score) AS 'Away Total' ";
            $sql .= "FROM SCHEDULES ";
            $sql .= "WHERE sch_wk = $wkNum";
            
            $limbo = $database->query($sql);
            
            $result = mysqli_fetch_assoc($limbo);
            
            $totals = $result['Home Total'] + $result['Away Total'];
            
            return $totals;
            
        }
        
        /*
        This function is to check if there are picks already inserted into the DB for the
        current week. This retreives the data for the week and then passes an array to be
        checked against.
        */
        
        public static function validate_picks($playerID, $WkNum) {
            
            global $database;
            $teamList = array();
            
            $sql = "SELECT TeamName ";
            $sql .= "FROM STATS ";
            $sql .= "WHERE playerID = {$playerID} AND WeekNumber = {$WkNum};";
            
            $limbo = $database->query($sql);
            
            while ($rows = mysqli_fetch_assoc($limbo)) {
                
                $teamList[] = $rows['TeamName'];
                
            }
            
            return $teamList;
            
        }
        
    }

?>