<?php

    define('TITLE', 'League | Forgot Password');

    include('includes/header.php');

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
            <h3>Password Recovery</h3>
            <p>Please enter the email used to create your account</p>
            <form action="forgotPass.php" method="post">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <button class="mybtn" type="submit" name="emailSubmit">Submit</button>
                <a href="./index.php">Cancel</a>
            </form>
            
            <div></div>
            
        </div>
        </div>
    </div>
</div>



<?php

    include('includes/footer.php');

?>