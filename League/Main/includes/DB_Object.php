<?php

    class DB_Object {
        
        public function select_all() {
            global $database;
            $sql = $database->query("SELECT * FROM ".$this->tbl.";");
            $this->mlt_assignment($sql);
            
        }
        
        public function select_specific($sql_in) {
            global $database;
            $sql = $database->query($sql_in);
            $this->mlt_assignment($sql);
            
        }
        
        public function select_schedule($wk_num, $yr) {
            global $database;
            $sql = "SELECT * FROM ".$this->tbl." WHERE sch_wk = {$wk_num} AND sch_year = {$yr};";
                
            $sql_result = $database->query($sql);
            $this->mlt_assignment($sql_result);
            
        }
        
        protected function mlt_assignment($sql) {
            
            while($rows = mysqli_fetch_assoc($sql)) {
                
                for($i = 0; $i < count($this->fields); $i++) {
                    
                    $attr = $this->fields[$i];
                
                    if($this->has_attribute($attr)) {

                        $this->$attr[] = $rows[$this->fields[$i]];

                    } // end of if statement
                
                } // end of for loop
                
            } // end of while loop
            
        } // end of mlt_assignment()
        
        protected function sng_assignment($sql) {
            
            while($row = mysqli_fetch_assoc($sql)) {
            
                foreach($row as $props => $vals) {
                    
                    $this->$props = $vals;
                    
                }
            
            }
            
        }
        
        protected function has_attribute($attribute) {//(1)
            
            $objectProperties = get_object_vars($this);//(2)
            
            return array_key_exists($attribute, $objectProperties);//(3)The attributes (which are the table column names) need to match the class properties or you get blanks!!!!!!
            
        }
        
        protected function get_properties_str() {
            
            $properties = array();
            
            foreach($this->fields_str as $field) {
                
                if(property_exists($this, $field)) {
                    
                    $property[$field] = $this->$field;
                    
                }
                
            }
            
            return $property;
            
        }
        
        protected function get_properties_int() {
            
            $properties = array();
            
            foreach($this->fields_int as $field) {
                
                if(property_exists($this, $field)) {
                    
                    $property[$field] = $this->$field;
                    
                }
                
            }
            
            return $property;
            
        }
        
        protected function clean_properties() {
            
            global $database;
            
            $clean_properties = array();
            
            foreach($this->get_properties_str() as $key => $value) {
                
                $clean_properties[$key] = $database->escaped_string($value);
                
            }
            
            return $clean_properties;
            
        }
        
        public function create() {
            
            global $database;
            
            $properties_str = $this->clean_properties();
            
            if ($this->tbl == "CATEGORY" || $this->tbl == "NEWSLETTER" || $this->tbl == "USERS") {
                
                $sql = "INSERT INTO " . $this->tbl . "(" . implode(",", array_keys($all_properties)). ")";
                $sql .= "VALUES ('".implode("','", array_values($properties_str)).")";
                
            } else {
                
                $properties_int = $this->get_properties_int();
                
                $sql = "INSERT INTO " . $this->tbl . "(" . implode(",", array_keys($all_properties)) . " , " . implode(",", array_keys($properties_int)) . ")";
                $sql .= "VALUES ('".implode("','", array_values($properties_str))."', " . implode(", ", $properties_int) . ")";
                
            }
            
            if($database->query($sql)) {
                
                $ID = $this->fields[0];
                $this->$ID = $database->insert_id();
                
                return true;
                
            } else {
                
                return false;
                
            }
            
            
        }
        
        /*
        This section of code is part of abstraction. It has two functions essentially.
        First it checks to see if the ID of the object is set. (1)
        If it is set, then the update() method is called. (2)
        If it is not set, then the create() method is called. (3)
        */
        
        public function save() {
            $ID = $this->fields[0];
            //              (1)           (2)             (3)
            return isset($this->$ID) ? $this->update() : $this->create();
            
        }
        
        /*
        This method updates the record the object contains.
        First the global object of the database is called. (1)
        Then an UPDATE SQL statement is put together to update the record. (2)
        The the query() method of the database object is called to run the UPDATE statement. (3)
        Lastly, the method returns either TRUE or FALSE if the query ran successfully or not. (4)
        */
        
        public function update() {
            
            global $database;     //(1)
            
            $ID = $this->fields[0];
            
            $properties_str = $this->clean_properties();
            
            $properties_pairs_str = array();
            
            foreach ($properties_str as $key => $value) {
                
                $properties_pairs_str[] = "{$key}='{$value}'";
                
            }
            
            if ($this->tbl == "CATEGORY" || $this->tbl == "NEWSLETTER" || $this->tbl == "USERS") {
                
                $sql = "UPDATE " .$this->tbl . " SET ";
                $sql .= implode(", ", $properties_pairs_str);
                $sql .= " WHERE {$this->fields[0]} = " . $this->$ID;
                
            } else {
                
                $properties_int = $this->get_properties_int();
                
                $properties_pairs_int = array();
            
                foreach ($properties_int as $key => $value) {
                    
                    $properties_pairs_int[] = "{$key}={$value}";
                    
                }
                
                array_shift($properties_pairs_int);
            
                $sql = "UPDATE " .$this->tbl . " SET ";
                $sql .= implode(", ", $properties_pairs_str). ", " . implode(", ", $properties_pairs_int);
                $sql .= " WHERE {$this->fields[0]} = " . $this->$ID;       //(2)
                
            }
            
            $database->query($sql);       //(3)
            
            return (mysqli_affected_rows($database->Connection) == 1) ? true : false;     //(4)
            
        }
        
        public function delete() {
            
            global $database;
            $ID = $this->fields[0];
            
            $sql = "DELETE FROM " .$this->tbl . " ";
            $sql .= "WHERE ID = " . $database->escaped_string($this->$ID);
            $sql .= " LIMIT 1";
            
            $database->query($sql);
            
            return (mysqli_affected_rows($database->Connection) == 1) ? true : false;
            
        }
        
    }

?>