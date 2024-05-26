<?php

//error_reporting(0);

include('includes/dbconnection.php');

$stmt= $con->prepare("SELECT * FROM safaris WHERE safariName=? ");
$stmt->bind_param("s", $_POST["safari"] );
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE HTML>
<html>

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
            <h2>Total Bill</h2>
        </div>
    </div>
    <!--about-->
    <div class="content">

        <!--advantage-->
        <div class="advantages">
            <div class="container">

                <div class="advantages-grids">
                    <div class="col-md-12 advantage-grid">
                        <div class="advantage">
                            <p>Name: <?php  echo $_POST["Name"];?></p>
                            <p>Mobile Number: <?php  echo $_POST["Mobile"];?></p>
                            <p>Alternate Mobile Number: <?php  echo $_POST["AlternateMobile"];?></p>
                            <p>Email : <?php  echo $_POST["Email"];?></p>
                            <p>Safari: <?php  echo $_POST["safari"];?></p>
                            <p>Date: <?php  echo $_POST["Date"];?></p>
                            <p>Time: <?php  echo $_POST["Time"];?></p>
                            <p>Number of adult: <?php  echo $_POST["adult"];?></p>
                            <p>Number of Children: <?php  echo $_POST["Child"];?></p>
                            <p>Jeepsis: <?php  echo $_POST["Jeepsis"];?></p>
                            <?php
								$total = mysqli_num_rows($result);
								if($total!=0){
								while(($result1 = mysqli_fetch_assoc($result))){
								?>

                            <p>Adult Cost:
                                <?php  echo $totalAdultTicket = $_POST["adult"] *  $result1["AdultTicketPrice"];?></p>
                            <p>Children cost:
                                <?php  echo $totalChildTicket = $_POST["Child"] * $result1["childTicketPrice"];?></p>
                            <p>Jeepsis cost:
                                <?php  echo $totalJeepsisTicket = $_POST["Jeepsis"] * $result1["jeepsiprice"];?></p>
                            <p> <?php   $total = $totalAdultTicket + $totalChildTicket + $totalJeepsisTicket;
                            echo "Ticket Total".$total;?></p>
                            <p> <?php
                                    $Gst = ($total* (($result1['GST'])/100));
                                    echo $result1['GST']."% Gst: ".$Gst;
                                    ?></p>
                            <p>Grand Total with Gst: <?php $totalwithGST = $total + $Gst; echo $totalwithGST;?></p>
                            <div class="btn">
                                <form action="booking_successful.php" method="post">
                                    <input type="hidden" name="name" value="<?php echo $_POST["Name"]; ?>">
                                    <input type="hidden" name="mobile" value="<?php echo $_POST["Mobile"]; ?>">
                                    <input type="hidden" name="AlternateMobile"
                                        value="<?php echo $_POST["AlternateMobile"]; ?>">
                                    <input type="hidden" name="email" value="<?php echo $_POST["Email"]; ?>">
                                    <input type="hidden" name="safari" value="<?php echo $_POST["safari"]; ?>">
                                    <input type="hidden" name="Date" value="<?php echo $_POST["Date"]; ?>">
                                    <input type="hidden" name="Time" value="<?php echo $_POST["Time"]; ?>">
                                    <input type="hidden" name="adult" value="<?php echo $_POST["adult"]; ?>">
                                    <input type="hidden" name="Child" value="<?php echo $_POST["Child"]; ?>">
                                    <input type="hidden" name="Jeepsis" value="<?php echo $_POST["Jeepsis"]; ?>">
                                    <input type="hidden" name="totalAdultTicket"
                                        value="<?php echo $totalAdultTicket; ?>">
                                    <input type="hidden" name="totalChildTicket"
                                        value="<?php echo $totalChildTicket; ?>">
                                    <input type="hidden" name="totalJeepsisTicket"
                                        value="<?php echo $totalJeepsisTicket; ?>">
                                    <input type="hidden" name="totalwithoutGST" value="<?php echo $total; ?>">
                                    <input type="hidden" name="gst" value="<?php echo $result1['GST'];?> ">
                                    <input type="hidden" name="gstAmount" value="<?php echo $Gst;?> ">
                                    <input type="hidden" name="totalwithGST" value="<?php echo $totalwithGST; ?>">
                                    <input type="hidden" name="AdultTicketPrice"
                                        value="<?php echo $result1["AdultTicketPrice"]; ?>">
                                    <input type="hidden" name="childTicketPrice"
                                        value="<?php echo $result1["childTicketPrice"] ?>">
                                    <input type="hidden" name="jeepsiprice"
                                        value="<?php echo $result1["jeepsiprice"]; }}?>">

                                    <button type="submit" name="book_ticket">Book Ticket</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!--footer-->
            <!-- footer area start-->
            <?php include_once('includes/footer.php');?>
            <!-- footer area end-->
        </div>
        <!-- page container area end -->
        <!-- offset area start -->

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