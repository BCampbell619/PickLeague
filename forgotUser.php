<?php

    define('TITLE', 'League | Forgot UserName');

    include('includes/header.php');

    $error = "";
    $recoverForm = new Form();

    if (isset($_POST['emailSubmit'])) {
        
        $recoverForm->usrEmail = $_POST['email'];
        
        $error = $recoverForm->forgotUser();
        
    }

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="recoveryHeader">
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="usrNmFrm">
            <h3>User Name Recovery</h3>
            <p>Please enter the email used to create your account</p>
            <form action="forgotUser.php" method="post">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <button class="mybtn" type="submit" name="emailSubmit" id="emailSubmit">Submit</button>
                <a href="./index.php">Cancel</a>
            </form>
            
            <div id="entryError"><?php if ($error) { echo $error; }?></div>
            
        </div>
        </div>
    </div>
</div>   



<?php

    include('includes/footer.php');

?>