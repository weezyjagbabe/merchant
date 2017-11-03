<?php
$pageName = "Contact Us"; 																					// Set the page name

require_once './models/classes/Configurations.php'; 													// Include the project configuration file
require_once './controllers/userController.php';														// Include the user controller file
require_once './models/classes/TransactionClass.php';
if( $UserClass -> userIsLoggedin() != "" ) { $UserClass -> redirect( 'dashboard' ); }					// If user is already logged in, redirect to dashboard

require_once './controllers/documentHeader.php'; 														// Include the document header
?>

<!-- Begin page body -->
<body>

<!-- Begin all content wrapper -->
<div class="mainContainer ">

        <div class="Container">
            <div class="container-fluid" align="center">
        <img src="./models/img/loginLogo.png" alt="">
            </div>
            <div class="content">

        <div class="contentInner">
<!---->

<!---->
            <?php if( isset( $message ) ) { echo $message; } ?>
<!---->

            <div class="row-fluid">
                <div class="span10">
                    <div class="widget">
                        <div class="wTitle">
<!--                            <h5>Contact Us</h5>-->
                            <div class="loginHeader">
                                <h5><img src="./models/img/icons/14x14/emergency.png" alt=""> Contact Us</h5>
                                <ul class="titleButtons">
                                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="./models/img/icons/14x14/cog2.png" alt=""></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="sign-in">Login</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="wContent ">

                <!-- Begin contact form -->
                <form action="" method="post" role="form">

                                        <div class="formField">
<!--                                            <div class="row-fluid">-->
                                                <label for="name">Name</label>
                                                <div class="inputField">
                                                    <input type="text" id="name" name="name" placeholder="name">
<!--                                                    <img src="./models/img/icons/14x14/book.png" alt="">-->
                                                </div>
<!--                                            </div>-->
                                        </div
<!---->
                                        <div class="formField">
<!--                                            <div class="row-fluid">-->
                                                <label for="email">Email</label>
                                                <div class="inputField">
                                                    <input type="text" id="email" name="email" placeholder="email">
<!--                                                    <img src="./models/img/icons/14x14/envlope2.png" alt="">-->
                                                </div>
<!--                                            </div>-->
                                        </div>


                                        <div class="formField">
<!--                                            <div class="row-fluid">-->
                                                <label for="subject">Subject</label>
                                                <div class="inputField">
                                                    <input type="text" id="subject" name="subject" placeholder="subject">
<!--                                                    <img src="./models/img/icons/14x14/notebook.png" alt="">-->
                                                </div>
<!--                                            </div>-->
                                        </div>
                                        <div class="formField">
<!--                                            <div class="row-fluid">-->
                                                <label for="message">Message</label>
                                                <div class="inputField">
                                                    <textarea class="form-control" name="message" id="message" placeholder="" rows="12" required></textarea>
                                                </div>
<!--                                            </div>-->
                                        </div>
                                        <div class="formButtons"><br>
                                            <div align="right">
                                                <button class="btn btn-primary" type="submit">Send Message</button>
                                            </div>
                                        </div>
                </form>
                <!-- End contact form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
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