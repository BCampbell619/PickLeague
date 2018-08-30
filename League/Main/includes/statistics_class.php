<?php

    class Statistics extends DB_Object {
        
        protected $tbl = "STATS";
        protected $fields = ['StatID', 'playerID', 'WeekNumber', 'GameNumber', 'TeamName', 'StatResult', 'GameYear'];
        protected $fields_int = ['StatID', 'playerID', 'WeekNumber', 'GameNumber', 'GameYear'];
        protected $fields_str = ['TeamName', 'StatResult'];
        protected $msg;
        private $wins;
        private $losses; 
        public $StatID;
        public $playerID;
        public $WeekNumber;
        public $GameNumber;
        public $TeamName;
        public $StatResult;
        public $GameYear;
        
        public function get_msg() {
            
            return $this->msg;
            
        }
        
        public function open_games() {
            
            $open = array_search("U", $this->StatResult, true);
            echo $open;
            if ($open !== FALSE) {
                
                return "TRUE";
                
            } else {
                
                return "FALSE";
                
            }
            
        }
        
        public function get_wins() {
            $this->set_wins();
            return $this->wins;
        }
        
        private function set_wins() {
            $tmp_wins = [];
            if (isset($this->StatResult)) {
                
                for($i = 0; $i < count($this->StatResult); $i++) {
                    
                    if($this->StatResult[$i] === "W") {
                        
                        array_push($tmp_wins, $this->StatResult[$i]);
                        
                    }
                    
                }
                
                $this->wins = count($tmp_wins);
                
            } else {
                
                $this->wins = 0;
                
            }
        }
        
        public function get_losses() {
            $this->set_losses();
            return $this->losses;
        }
        
        private function set_losses() {
            $tmp_loss = [];
            if (isset($this->StatResult)) {
                
                for($i = 0; $i < count($this->StatResult); $i++) {
                    
                    if($this->StatResult[$i] === "L") {
                        
                        array_push($tmp_loss, $this->StatResult[$i]);
                        
                    }
                    
                }
                
                $this->losses = count($tmp_loss);
                
            } else {
                
                $this->losses = 0;
                
            }
        }
        
        public function get_user_stats($playerID) {
            global $database;
            
            $sql = "SELECT * FROM ".$this->tbl;
            $sql .= " WHERE ".$this->fields[1];
            $sql .= " = $playerID;";
            
            $sql_result = $database->query($sql);
            $this->mlt_assignment($sql_result);
        }
        
        public function user_stats_by_wk($playerID, $WeekNumber, $yr) {
            global $database;
            
            $sql = "SELECT StatID, playerID, WeekNumber, GameNumber, TeamName, StatResult, GameYear FROM ".$this->tbl;
            $sql .= " WHERE ".$this->fields[1];
            $sql .= " = {$playerID} AND ".$this->fields[2]." = {$WeekNumber} AND ".$this->fields[6]." = {$yr};";
            
            $sql_result = $database->query($sql);
            $this->mlt_assignment($sql_result);
        }
        
        public function user_stats_by_yr($playerID, $yr) {
            global $database;
            
            $sql = "SELECT StatID, playerID, WeekNumber, GameNumber, TeamName, StatResult, GameYear FROM ".$this->tbl;
            $sql .= " WHERE ".$this->fields[1];
            $sql .= " = {$playerID} AND ".$this->fields[6]." = {$yr};";
            
            $sql_result = $database->query($sql);
            $this->mlt_assignment($sql_result);
            
        }
        
        public function call_insert() {
            $this->insert_selections();
        }
        
        private function insert_selections() {
            global $database;
            $fetched_pix = array();
            
            $fetched_pix[] = Util::validate_picks($this->playerID, $this->WeekNumber);
            
            if (count($fetched_pix[0]) === 0) {
                
                if (isset($this->TeamName)) {
            
                    for ($i = 0; $i < count($this->TeamName); $i++) {
                        
                        $g = $i + 1;
                        $sql = "INSERT INTO STATS (playerID, WeekNumber, GameNumber, TeamName, GameYear) ";
                        $sql .= "VALUES($this->playerID, $this->WeekNumber, $g, '{$this->TeamName[$i]}', '".date('Y')."');";
                        
                        $database->query($sql);
                    
                    }
                
                } else {
                    
                    return FALSE;
                    
                }
                
            } else if (count($fetched_pix[0]) > 1) {
                
                for ($i = 0; $i < count($this->StatID); $i++) {
                    
                    if ($fetched_pix[0][$i] != $this->TeamName[$i]) {
                        
                        $sql = "UPDATE ".$this->tbl." ";
                        $sql .= "SET ".$this->fields[4]." = '".$this->TeamName[$i]."' ";
                        $sql .= "WHERE ".$this->fields[1]." = ".$this->playerID." AND ";
                        $sql .= $this->fields[2]." = ".$this->WeekNumber." AND ";
                        $sql .= $this->fields[3]." = ".$this->GameNumber[$i].";";
                        
                        $database->query($sql);
                        
                    }
                    
                }
                
            }
            

            
        }
        
        public  function get_stat_results() {
            
            $this->set_stat_results();
            
        }
        
        private function set_stat_results() {
            
            global $database;
            $qry_chk = FALSE;
            $sql_home = "SELECT sch_team_home AS 'HomeTeam', sch_team_away AS 'AwayTeam', sch_home_outcome AS 'HomeStat', sch_away_outcome AS 'AwayStat'";
            $sql_home .= " FROM SCHEDULES WHERE sch_wk = $this->WeekNumber;";
            
            if (empty($this->WeekNumber)) {
                
                $this->msg = "Week number not set";
                
            } else if (!empty($this->WeekNumber)) {
                
                $result_home = $database->query($sql_home);
                $set_scores = Util::check_scores($this->WeekNumber);
                
                if ($set_scores === 0) {
                
                    $this->msg = "Scores not entered";
                
                } else if ($set_scores >= 1) {
                    
                    $l = 0;
                    Util::clear_array($this->StatResult);
                    $this->StatResult = array();
                    while ($home = mysqli_fetch_assoc($result_home)) {
                        
                        if ($home['HomeStat'] !== "U" && $home['AwayStat'] !== "U") {
                            
                            if ($this->TeamName[$l] === $home['HomeTeam'] && $home['HomeStat'] === "W") {
                                
                                array_push($this->StatResult, "W");
                                
                            } else if ($this->TeamName[$l] === $home['AwayTeam'] && $home['AwayStat'] === "W") {
                                
                                array_push($this->StatResult, "W");
                                
                            } else if ($this->TeamName[$l] === $home['HomeTeam'] && $home['HomeStat'] === "L") {
                                
                                array_push($this->StatResult, "L");
                                
                            } else if ($this->TeamName[$l] === $home['AwayTeam'] && $home['AwayStat'] === "L") {
                                
                                array_push($this->StatResult, "L");
                                
                            } else {
                                
                                array_push($this->StatResult, "U");
                                
                            }
                            
                            $l++;
                        } else if ($home['HomeStat'] === "U" && $home['AwayStat'] === "U") {
                            
                            array_push($this->StatResult, "U");
                            $l++;
                        }
                        
                    }
                    
                    for ($i = 0; $i < count($this->StatID); $i++) {
                        
                        $sql = "UPDATE ".$this->tbl." ";
                        $sql .= "SET ".$this->fields[5]." = '".$this->StatResult[$i]."' ";
                        $sql .= "WHERE ".$this->fields[2]." = ".$this->WeekNumber." ";
                        $sql .= "AND ".$this->fields[3]." = ".$this->GameNumber[$i].";";
                        
                        $database->query($sql);
                        
                    }
                
                    $this->msg = "Results set";
                    
                }
                
            }
               
        }
        
        public function check_picks() {
            
            if (empty($this->TeamName)) {
                
                
                
            }
            
        }
        
    }

$STATS = new Statistics();

?>