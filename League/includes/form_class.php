<?php

    class Form{
        
        public $usrName;
        public $usrPassword;
        public $rtnMessage;
        public $firstName;
        public $lastName;
        public $usrEmail;
        public $usrConfirm;
        
        protected function clean_up($var) {
            $newVar = trim($var);
            $newVar = stripslashes($var);
            $newVar = htmlspecialchars($var);
            return $newVar;
        }
        
        protected function temp_Pass($qty) {
            //Under the string $Characteres you write all the characters you want to be used to randomly generate the code. 
            $Characters = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
            $QuantifyCharacters = strlen($Characters); 
            $QuantifyCharacters--; 
        
            $Hash=NULL; 
            for($x=1; $x<=$qty; $x++){ 
                $randPass = rand(0, $QuantifyCharacters); 
                $Hash .= substr($Characters, $randPass, 1); 
            } 
            
            return $Hash;
        }
        
        public function login() {
            global $database;
            
            if ($this->usrName === "" && $this->usrPassword === "") {
                
                $this->rtnMessage = "All fields required!";
                return $this->rtnMessage;
                
            } 
            
            if ($this->usrName === "" && $this->usrPassword !== "") {
                
                $this->rnMessage = "Oops! We need a user name.";
                return $this->rtnMessage;
                
            } 
            
            if ($this->usrPassword === "" && $this->usrName !== "") {
                
                $this->rtnMessage = "Oops! we are missing a password.";
                return $this->rtnMessage;
                
            }
            
            $dbPass = $database->get_password($this->usrName, $database->Connection);
            
            if (!$database->is_user($this->usrName, $database->Connection)) {
                
                $this->rtnMessage = "Username does not exist";
                return $this->rtnMessage;
                
            } else if (!password_verify($this->usrPassword, $dbPass)) {
                
                $this->rtnMessage = "Username or password does not match";
                return $this->rtnMessage;
                
            } else {
                
                $_SESSION['UserName'] = $this->usrName;
                header('location: /Main/landing.php');
                
            }
        }
        
        public function user_create() {
            
            global $database;
            global $myMail;
            
            if ($this->firstName === "" || $this->lastName === "" || $this->usrEmail === "" || $this->usrName === "" || $this->usrPassword === "" || $this->usrConfirm === "") {
                
                $this->rtnMessage = "All fields are required!";
                return $this->rtnMessage;
                
            } else if (!filter_var($this->usrEmail, FILTER_VALIDATE_EMAIL)) {
                
                $this->rtnMessage = "Please enter a valid email";
                return $this->rtnMessage;
                
            } else if ($database->is_email($this->usrEmail, $database->Connection)) {
                
                $this->rtnMessage = "A profile already exists with this email";
                return $this->rtnMessage;
                
            } else if ($database->is_user($this->usrName, $database->Connection)) {
                
                $this->rtnMessage = "User name already exists";
                return $this->rtnMessage;
                
            } else if ($this->usrPassword !== $this->usrConfirm) {
                
                $this->rtnMessage = "Passwords do not match";
                return $this->rtnMessage;
                
            } else {
                
                $c_firstName    = $this->clean_up($this->firstName);
                $c_lastName     = $this->clean_up($this->lastName);
                $signUpDt       = date('Ymd');
                $encPass        = password_hash("$this->usrPassword", PASSWORD_DEFAULT);
                $database->insert_player($this->firstName, $this->lastName, $this->usrEmail, $this->usrName, $encPass, $signUpDt, $database->Connection);
                
            }
            
            if ($this->is_user()) {
                
                $myMail->signup_email($this->firstName, $this->lastName, $this->usrEmail, $this->usrName);
                $_SESSION['UserName'] = $this->usrName;
                header('location: /Main/landing.php');
                
            }
            
            
            
        }
        
        public function forgotUser() {
            global $database;
            global $myMail;
            
            if ($this->usrEmail === "") {
                
                $this->rtnMessage = "<p>Please enter the email address</p>";
                return $this->rtnMessage;
                
            } else if (!$database->is_email($this->usrEmail)) {
                
                $this->rtnMessage = "<p>Email not found</p>";
                return $this->rtnMessage;
                
            } else {
                
                $usrQry = mysqli_query($database->Connection, "SELECT FirstName, LastName, UserName FROM PLAYER WHERE Email = '$this->usrEmail'");
                $result = mysqli_fetch_assoc($usrQry);
                $this->usrName = $result['UserName'];
                $this->firstName = $result['FirstName'];
                $this->lastName = $result['LastName'];
                
                $myMail->forgotUser_email($this->firstName, $this->lastName, $this->usrEmail, $this->usrName);
                
                $this->rtnMessage = "<p>An email has been sent with your user name&#46;</p>";
                return $this->rtnMessage;
                
            }
            
        }
        
        public function forgotPass() {
            global $database;
            global $myMail;
            
            if ($this->usrEmail === "") {
                
                $this->rtnMessage = "<p>Please enter the email address</p>";
                return $this->rtnMessage;
                
            } else if (!$database->is_email($this->usrEmail)) {
                
                $this->rtnMessage = "<p>Email not found</p>";
                return $this->rtnMessage;
                
            } else {
                
                $tmpPass = $this->temp_Pass(8);
                $encPass = password-hash("$tmpPass", PASSWORD_DEFAULT);
                
                $usrQry = mysqli_query($database->Connection, "UPDATE PLAYER SET UserPassword = '$encPass' WHERE Email = '$this->usrEmail'");
                
                $usrQry = mysqli_query($database->Connection, "SELECT FirstName, LastName, UserName, UserPassword FROM PLAYER WHERE Email = '$this->usrEmail'");
                $result = mysqli_fetch_assoc($usrQry);
                $this->usrName = $result['UserName'];
                $this->firstName = $result['FirstName'];
                $this->lastName = $result['LastName'];
                $this->usrPassword = $result['UserPassword'];
                
                
                $myMail->forgotPass_email($this->firstName, $this->lastName, $this->usrEmail, $this->usrName, $this->usrPassword);
                
                $this->rtnMessage = "<p>An email has been sent with your recovery password&#46;</p>";
                return $this->rtnMessage;
                
            }
            
        }
        
    }

    $allForms = new Form();

?>