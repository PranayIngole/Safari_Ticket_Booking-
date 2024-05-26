<?php

//error_reporting(0);

include('includes/dbconnection.php');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Safari Management System | Home Page</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>



<body>

    <?php include_once('includes/header.php');?>

    <div class="banner-header">
        <div class="container">
            <h2>Book Ticket</h2>
        </div>
    </div>


    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php //include_once('includes/sidebar.php');?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content m-5">
            <!-- header area start -->
            <?php include_once('includes/header.php');?>
            <!-- header area end -->
            <!-- page title area start -->
            <?php //include_once('includes/pagetitle.php');?>
            <!-- page title area end -->
            <div class="main-content-inner container-fluid ">
                <div class="row">

                    <div class="col-lg-4 col-ml-8">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-20 mt-5">
                                <div class="card">
                                    <div class="card-body">

                                        <form method="post" action="ComformingBookingDetail.php">
                                            <div class="form-group">
                                                <label for="exampleInputName">Name</label>
                                                <input type="text" name="Name" class="form-control"
                                                    placeholder="Username" aria-describedby="sizing-addon3" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName">Mobile Number</label>
                                                <input type="text" name="Mobile" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Name" maxlength="10" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName">Alternate Mobile Number</label>
                                                <input type="text" name="AlternateMobile" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Name" maxlength="10">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName">Email address</label>
                                                <input type="text" name="Email" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="safari">Choose a safari:</label>
                                                <select id="safari" name="safari" required>
                                                    <option><?php echo $_COOKIE['safari'];?></option>
                                                    <?php
					                                $query="select SafariName from safaris";
					                                $data = mysqli_query($con,$query);
					                                $total = mysqli_num_rows($data);

					                                if($total!=0){
						                            while(($result = mysqli_fetch_assoc($data))){
							                            echo "<option>".$result['SafariName']."</option>";
						                            }
					                                }
				                                ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputdate" required>Booking Date</label>
                                                <input type="Date" name="Date" class="form-control"
                                                    value="<?php echo $_COOKIE['AvaliableTicket'];?>"
                                                    id="exampleInputPassword1">
                                            </div>

                                            <div class="form-group">
                                                <label for="safari">Time</label>
                                                <select id="safari" name="Time" required>
                                                    <option><?php echo $_POST['shift'];?></option>
                                                    <option>Morning</option>
                                                    <option>Afternoon</option>
                                                </select>
                                            </div>
                                            <div class=" form-group">
                                                <label for="exampleInputdate">Number of Adult</label>
                                                <input type="number" name="adult" class="form-control"
                                                    id="exampleInputPassword1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputdate" require>Number of Children</label>
                                                <input type="number" name="Child" class="form-control"
                                                    id="exampleInputPassword1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputdate" require>Jeepsis Requerid</label>
                                                <input type="number" name="Jeepsis" class="form-control"
                                                    id="exampleInputPassword1" required>
                                            </div>

                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->

    <!-- jquery latest version -->
    <script src=" assets/js/vendor/jquery-2.2.4.min.js">
    </script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>/
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>





</body>

</html>