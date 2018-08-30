<?php
    define("TITLE","Contact | League of Campbells & Slankers");
    include('includes/header.php');

    if (!isset($_POST['contact_submit'])) {
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 offset-sm-2 col-sm-8 offset-md-4 col-sm-4 offset-lg-4 col-lg-4 contact">
            <h3>Got a question&#44; or comment&#63;</h3>
            <form method="post" action="">
               <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="ContactName">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="ContactEmail">
                <label for="message">Message</label>
                <textarea name="ContactMessage" class="form-control" rows="10" id="message"></textarea><br>
                <button type="submit" class="btn btn-primary" name="contact_submit" value="Send Message">Submit</button><br>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
        
    } else if (isset($_POST['contact_submit'])) {
               $cName    = trim($_POST['ContactName']);
               $cEmail   = trim($_POST['ContactEmail']);
               $cMsg     = $_POST['ContactMessage'];

               
               if (no_header_inject($cName) or no_header_inject($cEmail) or no_header_inject($cMsg)) {
                   die();
               }
               
               if (!$cName or !$cEmail or !$cMsg){ ?>
                          
                        <div class="row">
                            <div class="col-xs-12 offset-sm-2 col-sm-8 offset-md-4 col-sm-4 offset-lg-4 col-lg-4 contact">
                                 <p class="text-danger text-center">Please fill out all fields of the form. Click the &ldquo;Refresh&rdquo; button.</p>
                                    <div class="form-group has-error has-feedback">
                                      <label class="control-label" for="inputError1">Name</label>
                                      <input type="text" class="form-control" id="inputError1" name="ContactName">
                                      <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                      <span id="inputError2Status" class="sr-only">(error)</span>
                                      </div>
                                    <div class="form-group has-error has-feedback">
                                      <label class="control-label" for="inputError2">Email</label>
                                      <input type="text" class="form-control" id="inputError2" name="ContactEmail">
                                      <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                      <span id="inputError2Status" class="sr-only">(error)</span>
                                      </div>
                                    <div class="form-group has-error has-feedback">
                                      <label class="control-label" for="inputError3">Message</label>
                                      <textarea name="ContactMessage" id="inputError3" class="form-control"></textarea>
                                      <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                      <span id="inputError2Status" class="sr-only">(error)</span>
                                      </div>  
                                    <div class="form-group has-error has-feedback">
                                      <br>
                                      <a href="contact.php" class="btn btn-danger">Refresh</a><br>  
                                  </div>
                            </div>
                        </div>

            <?php        
                   include('includes/footer.php');
                   exit;
                   
               }
               
               $to = "broccampbell@gmail.com";
               
               $subject = "Comment, Question, or an Idea from $cName";
               
               $message  = "$cName has sent you the following ";
               $message .= "message from bunchocampbellslankers.com: \r\n\r\n";
               $message .= "$cMsg";
               
               $message = wordwrap($message, 70);
               
               $headers = "MIME-Version 1.0\r\n";
               $headers .="Content-type: text/text; charset=iso-8859-1\r\n";
               $headers .="From: " . $cName . " <" . $cEmail . ">\r\n";
               $headers .="X-Priority: 1\r\n";
               $headers .="X-MSMail-Priority: High\r\n\r\n";
               
               mail($to, $subject, $message, $headers); ?>
               
                    <div class="row">
                        <div class="col-xs-12 offset-sm-2 col-sm-8 offset-md-4 col-sm-4 offset-lg-4 col-lg-4 contact">
                            <p class="text-success text-center">Thanks for your input! You have successfully submitted your information!</p>
                                <div class="form-group has-success has-feedback">
                                  <label class="control-label" for="inputSuccess2">Name</label>
                                  <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status">
                                  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                  <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                </div>
                                <div class="form-group has-success has-feedback">
                                  <label class="control-label" for="inputSuccess3">Email</label>
                                  <input type="text" class="form-control" id="inputSuccess3" aria-describedby="inputSuccess2Status">
                                  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                  <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                </div>
                                <div class="form-group has-success has-feedback">
                                  <label class="control-label" for="inputSuccess4">Message</label>
                                  <textarea class="form-control" id="inputSuccess4" aria-describedby="inputSuccess2Status"></textarea>
                                  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                  <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                </div>
                                <a href="landing.php" class="btn btn-success">Finish</a><br>
                        </div>
                    </div>

               
<?php          } ?>

<?php
    include('includes/footer.php');
?>
