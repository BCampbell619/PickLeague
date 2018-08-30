<?php

function clean_up($var){
    
            $var = trim($var);
            $var = stripslashes($var);
            $var = htmlspecialchars($var);
            return $var;
    
        }

function no_header_inject($str){
    
           return preg_match( "/[\r\n]/", $str );
    
       }

function strip_bad_chars( $input ) {
    
	$output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input );
	return $output;
    
}

function winPerc($win,$loss){
    
        $Perc=($win/($win+$loss))*100;
        return number_format($Perc,2);
    
    }

function is_user ($UserName, $Connect) {
    
    $query = mysqli_query($Connect, "SELECT UserName FROM PLAYER WHERE UserName = \"$UserName\";");
    
    if (mysqli_num_rows($query) == 1) {
        
        return TRUE; 
        
    } else {
        
        return FALSE;
        
    }

}

function is_email($email, $Connect) {
    
    $query = mysqli_query($Connect, "SELECT Email FROM PLAYER WHERE Email = \"$email\";");
    
    if (mysqli_num_rows($query) == 1) {
        
        return TRUE;
        
    } else {
        
        return FALSE;
        
    }
    
}

function get_password($User, $Connect) {
    
    $query  =   mysqli_query($Connect, "SELECT UserPassword FROM PLAYER WHERE UserName = \"$User\";");
    
    $result =   mysqli_fetch_assoc($query);
    return $result['UserPassword'];
    
}

function mail_error($fName, $lName, $report) {
    
    $to = "broccampbell@gmail.com";
               
    $subject = "Error Report - League";
    
    $message = "$fName "."$lName was attempting to create a league profile.\r\n";
    $message .= "\n";
    $message .= "Here is the error:\n";
    $message .= "$report";

        
    $message = wordwrap($message, 70);
    
    $headers = "MIME-Version 1.0\r\n";
    $headers .="Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .="From: " . "thecamp7@just45.justhost.com" . " <" . "thecampbellscorner.com" . ">\r\n";
    $headers .="X-Priority: 1\r\n";
    $headers .="X-MSMail-Priority: High\r\n\r\n";
    
    mail($to, $subject, $message, $headers);
    
}

function mail_greeting($fName, $lName, $email, $User) {
    
    $to = $email;
    
    $subject = "League Sign up";
    
    $message = "Welcome ".$fName." ".$lName."!\r\n\r\n";
    $message .="Thanks for signing up to participate in our pick 'em league.\r\n";
    $message .="Below is your information:\r\n";
    $message .="First Name: ".$fName."\r\n";
    $message .="Last Name: ".$lName."\r\n";
    $message .="Email: ".$email."\r\n";
    $message .="User Name: ".$User."\r\n\r\n";
    $message .="We hope you enjoy the competition, and good luck with your picks!";
    
    $message = wordwrap($message, 70);
    
    $headers = "MIME-Version 1.0\r\n";
    $headers .="Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .="From: " . "thecamp7@just45.justhost.com" . " <" . "thecampbellscorner.com" . ">\r\n";
    $headers .="X-Priority: 1\r\n";
    $headers .="X-MSMail-Priority: High\r\n\r\n";
    
    mail($to, $subject, $message, $headers);
    
}
    
function logged_in(){
    
    if (isset($_SESSION['UserName'])){
        
        return TRUE;
        
    }   else    {
        
        return FALSE;
        
    }
}

function next_Sunday($day) {
    
    $currentDate = date('Y-m-d');
    
    if ($day === "1" ) {
        
        $sunday =   date('Y-m-d', strtotime("$currentDate - 1 day"));
        
    } else if ($day === "2") {
        
        $sunday =   date('Y-m-d', strtotime("$currentDate + 5 days"));
        
    } else if ($day === "3") {
        
        $sunday =   date('Y-m-d', strtotime("$currentDate + 4 days"));
        
    } else if ($day === "4") {
        
        $sunday =   date('Y-m-d', strtotime("$currentDate + 3 days"));
        
    } else if ($day === "5") {
        
        $sunday =   date('Y-m-d', strtotime("$currentDate + 2 days"));
        
    } else if ($day === "6") {
        
        $sunday =   date('Y-m-d', strtotime("$currentDate + 1 days"));
        
    } else {
        
        $sunday =   date('Y-m-d');

    }
    
    return $sunday;
}

?>