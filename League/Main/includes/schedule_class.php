<?php

    class Schedule extends DB_Object {
        protected $tbl = "SCHEDULES";
        protected $fields_str = ['sch_home_team', 'sch_team_away', 'sch_home_outcome', 'sch_away_outcome', 'sch_time'];
        protected $fields_int = ['sch_id', 'sch_wk', 'sch_game', 'sch_home_score', 'sch_away_score', 'sch_year'];
        protected $fields = ['sch_id', 'sch_wk', 'sch_game', 'sch_team_home', 'sch_team_away', 'sch_home_score', 'sch_away_score', 'sch_home_outcome', 'sch_away_outcome', 'sch_year', 'sch_time'];
        public $sch_id;
        public $sch_wk;
        public $sch_game;
        public $sch_team_home;
        public $sch_team_away;
        public $sch_home_score;
        public $sch_away_score;
        public $sch_home_outcome;
        public $sch_away_outcome;
        public $sch_year;
        public $sch_time;
        
        public function get_week() {
            global $database;
            $day = date('N');
            $currWeek = $this->next_sunday($day);
            $rtn = $database->query("SELECT sch_wk FROM ".$this->tbl." WHERE LEFT(sch_time, 10) = '{$currWeek}';");
            $result = mysqli_fetch_array($rtn);
            
            return !$result['sch_wk'] ? FALSE : $result['sch_wk'];
            
        }
        
        private function next_sunday($day) {
            
            $currentDate = date('Y-m-d');
    
            if ($day === "1" ) {
                
                $sunday =   date('Y-m-d', strtotime("$currentDate + 17 days")); // -1 day
                
            } else if ($day === "2") {
                
                $sunday =   date('Y-m-d', strtotime("$currentDate + 16 days")); // 5 days
                
            } else if ($day === "3") {
                
                $sunday =   date('Y-m-d', strtotime("$currentDate + 15 days")); // 4 days
                
            } else if ($day === "4") {
                
                $sunday =   date('Y-m-d', strtotime("$currentDate + 14 days")); // 3 days
                
            } else if ($day === "5") {
                
                $sunday =   date('Y-m-d', strtotime("$currentDate + 13 days")); // 2 days
                
            } else if ($day === "6") {
                
                $sunday =   date('Y-m-d', strtotime("$currentDate + 12 days")); // 1 day
                
            } else {
                
                $sunday =   date('Y-m-d'); // current day
        
            }
            
            return $sunday;
            
        }
        
        public function get_outcomes($homeArr, $visitArr) {
            
            if (count($this->sch_home_score) > count($this->sch_id) || count($this->sch_away_score) > count($this->sch_id)) {
            
                for ($i = 0; $i < count($this->sch_home_score); $i++) {
                    
                    array_shift($this->sch_home_score);
                    array_shift($this->sch_away_score);
                    array_shift($this->sch_home_outcome);
                    array_shift($this->sch_away_outcome);
                    
                }
            
            } else if (count($this->sch_home_score) == count($this->sch_id) || count($this->sch_away_score) == count($this->sch_id)) {
                
                for ($i = 0; $i < count($this->sch_id); $i++) {
                    
                    array_shift($this->sch_home_score);
                    array_shift($this->sch_away_score);
                    array_shift($this->sch_home_outcome);
                    array_shift($this->sch_away_outcome);
                    
                }
                
            }
            
            for ($i = 0; $i < count($this->sch_id); $i++) {
                
                $this->sch_home_score[] = $homeArr[$i];
                $this->sch_away_score[] = $visitArr[$i];
                
            }
            
            if (isset($this->sch_home_score) && isset($this->sch_away_score)) {
            
                $this->set_outcomes();
                return TRUE;
            
            } else {
                
                return FALSE;
                
            }
            
            
        }
        
        private function set_outcomes() {
            global $database;
            for ($i = 0; $i < count($this->sch_id); $i++) {
                
                if ($this->sch_home_score[$i] > $this->sch_away_score[$i]) {
                    
                    $this->sch_home_outcome[] = "W";
                    $this->sch_away_outcome[] = "L";
                    
                } else if ($this->sch_home_score[$i] < $this->sch_away_score[$i]) {
                    
                    $this->sch_away_outcome[] = "W";
                    $this->sch_home_outcome[] = "L";
                    
                } else if ($this->sch_home_score[$i] === $this->sch_away_score[$i]) {
                    
                    $this->sch_away_outcome[] = "U";
                    $this->sch_home_outcome[] = "U";
                    
                }
                
            }
            
            for ($i = 0; $i < count($this->sch_id); $i++) {
                
                $sql = "UPDATE ".$this->tbl." SET ".$this->fields[5]." = ".$this->sch_home_score[$i].", ".$this->fields[6]." = ".$this->sch_away_score[$i].", ";
                $sql .= $this->fields[7]." = '".$this->sch_home_outcome[$i]."', ".$this->fields[8]." = '".$this->sch_away_outcome[$i]."'";
                $sql .= " WHERE ".$this->fields[2]." = ".$this->sch_game[$i]." AND ".$this->fields[1]." = ".$this->sch_wk[$i].";";
                $database->query($sql);
                
            }
            
        }
        
        public function time_check($i) {
            
            $nowDate = strtotime('now');
            $gameDate = strtotime($this->sch_time[$i]);
            
            if ($nowDate < $gameDate) {
                
                return "TRUE";
                
            } else {
                
                return "FALSE";
                
            }
            
        }
        
    }

$SCHEDULE = new Schedule();

?>