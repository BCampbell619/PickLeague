<?php

    class Player extends DB_Object {
        
        protected $tbl = "PLAYER";
        protected $fields = ['playerID', 'FirstName', 'LastName', 'Email', 'UserName', 'UserPassword', 'JoinDate'];
        public $playerID;
        public $FirstName;
        public $LastName;
        public $Email;
        public $USerName;
        public $UserPassword;
        public $JoinDate;

        public function select_player($UserName) {
            global $database;
            $user_fld = $this->fields[4];
            
            if (!empty($user_fld)) {

                $sql = $database->query("SELECT * FROM ".$this->tbl." WHERE ".$user_fld." = '{$UserName}';");
                
                $this->sng_assignment($sql);
                
            } else {
                
                return FALSE;
                
            }
            
        }
        
    }

?>