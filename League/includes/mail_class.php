<?php

    class LeagueMail {
        protected static $HEADER = "MIME-Version 1.0\r\nContent-type: text/plain; charset=iso-8859-1\r\nFrom: " . "thecamp7@just45.justhost.com" . " <" . "thecampbellscorner.com" . ">\r\nX-Priority: 1\r\nX-MSMail-Priority: High\r\n\r\n";
        public $to;
        public $subject;
        public $message;
        
        public function signup_email($fName, $lName, $email, $User) {
    
            $this->to = $email;
            
            $this->subject = "League Sign up";
            
            $this->message = "Welcome ".$fName." ".$lName."!\r\n\r\n";
            $this->message .="Thanks for signing up to participate in our pick 'em league.\r\n";
            $this->message .="Below is your information:\r\n";
            $this->message .="First Name: ".$fName."\r\n";
            $this->message .="Last Name: ".$lName."\r\n";
            $this->message .="Email: ".$email."\r\n";
            $this->message .="User Name: ".$User."\r\n\r\n";
            $this->message .="We hope you enjoy the competition, and good luck with your picks!";
            
            $this->message = wordwrap($this->message, 70);
            
            $headers = static::$HEADER;
            
            mail($this->to, $this->subject, $this->message, static::$HEADER);
    
        }
        
        public function signup_error_email($fName, $lName, $report) {
    
            $this->to = "broccampbell@gmail.com";
                       
            $this->subject = "Error Report - League";
            
            $this->message = "$fName "."$lName was attempting to create a league profile.\r\n";
            $this->message .= "\n";
            $this->message .= "Here is the error:\n";
            $this->message .= "$report";
        
                
            $this->message = wordwrap($this->message, 70);
            
            mail($this->to, $this->subject, $this->message, static::$HEADER);
    
        }
        
        public function forgotUser_email($fName, $lName, $email, $User) {
            
            $this->to = $email;
                       
            $this->subject = "UserName Recovery - League";
            
            $this->message = "$fName "."$lName, you have requested to have your user name sent to you.\r\n";
            $this->message .= "Below you will find your user name.\r\n";
            $this->message .= "User Name:\n";
            $this->message .= "$User";
        
                
            $this->message = wordwrap($this->message, 70);
            
            mail($this->to, $this->subject, $this->message, static::$HEADER);
            
        }
        
        public function forgotPass_email($fName, $lName, $email, $User, $passWrd) {
            
            $this->to = $email;
                       
            $this->subject = "Password Recovery - League";
            
            $this->message = "$fName "."$lName, you have requested to have your password reset.\r\n";
            $this->message .= "Below you will find your password.\r\n\r\n";
            $this->message .= "User Name:\n";
            $this->message .= "$User\r\n";
            $this->message .= "Temporary Password:\n";
            $this->message .= "$passWrd";
        
                
            $this->message = wordwrap($this->message, 70);
            
            mail($this->to, $this->subject, $this->message, static::$HEADER);
            
        }
        
    }

    $myMail = new LeagueMail();

?>