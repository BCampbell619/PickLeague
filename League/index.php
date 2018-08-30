<?php
    session_start();//Make sure that the session_start is at the TOP of all pages
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    define("TITLE","Sign in | League of Campbells & Slankers");
    include('includes/header.php');
    include('Main/includes/functions.php');

//This section is the signin form handling code.

    $error      =   "";

    $loginForm = new Form();

    if (isset($_POST['login'])) {
        
        $loginForm->usrName     = $_POST['username'];
        $loginForm->usrPassword = $_POST['password'];
        
        $error  =   $loginForm->login();
        
    }

//This section is the signup form handling code.

    $catch      =   "";
    $success    =   "";
    $signUpDate =   date('Ymd');

    if (isset($_POST['SignUpSubmit'])) {
        
        $loginForm->usrName     = $_POST['NewUser'];
        $loginForm->usrPassword = $_POST['NewPass'];
        $loginForm->firstName = $_POST['First'];
        $loginForm->lastName = $_POST['Last'];
        $loginForm->usrEmail = $_POST['Email'];
        $loginForm->usrConfirm = $_POST['ChkNewPass'];
        
        $catch = $loginForm->user_create();
        
    }

?>

<div class="container-fluid">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 loginBanner">

            <h2>Welcome Back</h2>

        </div>
    
    </div>
    
</div>

<div class="container-fluid">
   
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div id="rtnUser">

                <h2>
                
                <?php if ($error) {
                            echo $error;
                        } else {
                            echo "Sign In";
                        }
                    
                ?>
                
                </h2>

                <form method="post" action="" id="signin">

                    <input type="text" name="username" id="username" placeholder="User Name" onfocus="signIn.eventHandler('focus', 'username')" onblur="signIn.eventHandler('blur','username')">
                    <a href="forgotUser.php" target="_blank">forgot username</a>
                    <input type="password" name="password" id="password" placeholder="Password" onfocus="signIn.eventHandler('focus', 'password')" onblur="signIn.eventHandler('blur','password')">
                    <a href="forgotPass.php" target="_blank">forgot password</a><br><br>
                    <button class="mybtn" type="submit" name="login">Sign In</button>

                </form>

            </div>

        </div>

    </div>
        
</div>       

<div class="container-fluid">
   
    <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 loginBanner">
            
            <h2>First Timer&#63;</h2>
            
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div id="newUser">

                <h2>
                
                <?php
                    
                    if ($catch) {
                        echo $catch;                                                
                    } else {
                        echo "Sign Up";
                    }
                    
                ?>
                
                </h2>

                <form method="post" action="index.php" id="signup">

                    <input type="text" name="First" placeholder="First Name" id="First" onfocus="signUp.eventHandler('focus','First')" onblur="signUp.eventHandler('blur','First')">
                    <input type="text" name="Last" placeholder="Last Name" id="Last" onfocus="signUp.eventHandler('focus','Last')" onblur="signUp.eventHandler('blur','Last')">
                    <input type="email" name="Email" placeholder="example@gmail.com" id="mail" onfocus="signUp.eventHandler('focus','mail')" onblur="signUp.eventHandler('blur','mail')">
                    <input type="text" name="NewUser" placeholder="User Name" id="identity" onfocus="signUp.eventHandler('focus','identity')" onblur="signUp.eventHandler('blur','identity')">
                    <input type="password" name="NewPass" placeholder="Password" id="secret" onfocus="signUp.eventHandler('focus','secret')" onblur="signUp.eventHandler('blur','secret')">
                    <input type="password" name="ChkNewPass" placeholder="Confirm Password" id="dblSecret" onfocus="signUp.eventHandler('focus','dblSecret')" onblur="signUp.eventHandler('blur','dblSecret')">
                    <button class="mybtn" type="submit" name="SignUpSubmit" id="push">Sign Up</button>

                </form>

            </div>

        </div>

    </div>
        
</div>
    
<?php

    include('includes/footer.php');

?>