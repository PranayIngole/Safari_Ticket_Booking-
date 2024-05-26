<script>
const button = document.getElementById('formsubmit');

function matchPassword() {
    var pw1 = document.getElementById("password").value;
    var pw2 = document.getElementById("ConformPassword").value;
    console.log(pw1);
    console.log(pw2);

    if (pw1 !== pw2) {
        document.getElementById("ConformPassword").style.borderBottomColor = "red";
        button.setAttribute("disabled", "");
    } else {
        document.getElementById("ConformPassword").style.borderColor = "green";
        button.removeAttribute("disabled");
    }
}
</script>
<?php
//error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['signup']))
{
$adminuser=$_POST['username'];
$password=md5($_POST['password']);
$adminname = $_POST['AdminName'];
$safariname = $_POST['safariname'];
$contactNumber = $_POST['ContactNumber'];
$Email = $_POST['Email'];
$query=mysqli_query($con,"INSERT INTO `tbladmin` ( `UserName`, `Password`, `SafariName`, `AdminName`,
`MobileNumber`, `Email`) VALUES ( '$adminuser', '$password', '$safariname', '$adminname', '$contactNumber',
'$Email')");

if($query){

header('location:dashboard.php');
}
else{
echo '<script>
alert("Invalid Detail.")
</script>';
}
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Safari Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="#" method="post" name="login">

                    <div class="login-form-head">
                        <h4> Safari Management System</h4>

                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="text" id="username" name="username" required="true">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="password" name="password" required="true">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Conform Password</label>
                            <input type="password" id="ConformPassword" name="Conformpassword" onkeyup="matchPassword()"
                                required="true">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">safari name</label>
                            <input type="text" id="safariname" name="safariname" required="true">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Admin Name</label>
                            <input type="text" id="AdminName" name="AdminName" required="true">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Contact Number</label>
                            <input type="Number" id="ContactNumber" name="ContactNumber" required="true">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="Email" id="Email" name="Email" required="true">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="formsubmit" type="submit" name="signup" disabled>Submit<i
                                    class="ti-arrow-right"></i></button>
                        </div>
                        <div style="padding-top: 20px">
                            <a href="../index.php">Back Home!!</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>