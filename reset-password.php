<?php
$pageName = "Forgot Password"; 																					// Set the page name

require_once './models/classes/Configurations.php'; 													// Include the project configuration file
require_once './controllers/userController.php';														// Include the user controller file
require_once './models/classes/TransactionClass.php';
if( $UserClass -> userIsLoggedin() != "" ) { $UserClass -> redirect( 'dashboard' ); }					// If user is already logged in, redirect to dashboard

require_once './controllers/documentHeader.php'; 														// Include the document header
?>

<!-- Begin page body -->
<body>

<!-- Begin all content wrapper -->
<div class="mainContainer">
    <div class="loginWrap">
        <img src="./models/img/loginLogo.png" alt="">
        <div class="loginContainer">

            <div class="loginHeader">
                <h5><img src="./models/img/icons/14x14/lock3.png" alt=""> Login</h5>
                <ul class="titleButtons">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="./models/img/icons/14x14/cog2.png" alt=""></a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="sign-in">Login</a></li>
                            <li><a href="contact-us">Contact support</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <?php if( isset( $message ) ) { echo $message; } ?>

            <!-- Begin form contents -->
            <form id="validate" action="" method="post" >
                <?php if(isset($_GET['userEmail'])){ $userEmail = $_GET['userEmail']; ?>
                    <label for="password">New Password</label>
                    <div class="inputField">
<!--                        <label class="control-label">New Password</label>-->
                        <input type="password" class="form-control" name="newPassword" data-validate="required" placeholder="Choose a new password" required="" autocomplete="off" />
                    </div>

                    <input type="hidden" name="userEmail" value="<?php echo $userEmail; ?>" />

                    <label for="password">Confirm Password</label>
                    <div class="inputField">
<!--                        <label class="control-label">Confirmed New Password</label>-->
                        <input type="password" class="form-control" name="confirmNewPassword" data-validate="required" placeholder="Confirm the new password" required="" autocomplete="off" />
                    </div>

                    <button type="submit" name="resetPassword" class="button noMargin sButton blockButton bSky">CHANGE PASSWORD</button>
                <?php } else { ?>
                <label for="email">Email</label>
                <div class="inputField">
                    <input type="email" id="email" name="email" placeholder="email" required>
                    <img src="./models/img/icons/14x14/envlope2.png" alt="">
                </div>


                <!-- <div class="checkX">
                    <label class="formButton"><input type="checkbox" name="check" checked> <span>Remember me</span></label>
                </div> -->

                <button type="submit" name="requestPasswordReset" class="button noMargin sButton blockButton bSky">RESET PASSWORD</button>
                <?php } ?>
            </form>
            <!-- End form contents -->

        </div>
    </div>
</div>
<!-- End all content wrapper -->

<!-- Begin the page scripts -->
<?php
require_once './controllers/pageScripts.php'; // Include the page scripts
?>
<!-- Begin the page scripts -->

</body>
<!-- End page body -->

</html>