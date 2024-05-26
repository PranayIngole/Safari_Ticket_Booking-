<?php

//error_reporting(0);

include('includes/dbconnection.php');

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
            <h2>Ticket Detail</h2>
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
                            <h3>Ticket Detail</h3>

                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="number" name="search"
                                        value="<?php if(isset($_GET["search"])) {echo $_GET["search"]; }?>"
                                        class="form-control" placeholder="Search ticket">
                                    <button type="submit" class="btn btn-primary"> search </button>
                                </div>
                            </form>

                            <div>
                                <?php
                            $stmt= $con->prepare("SELECT * FROM ticketbooked WHERE contactNumber1=? ");
                            $stmt->bind_param("i", $_GET["search"] );
                            $stmt->execute();
                            $result = $stmt->get_result();

                                 if(mysqli_num_rows($result) > 0)
                                 
                                     foreach($result as $items)
                                     {
                                        ?>
                                <p>Ticket ID: <?php echo $items["TicketID"]?></p>
                                <p>Name: <?php  echo $items["CustomerName"];?></p>
                                <p>Safari: <?php  echo $items["SafariName"];?></p>
                                <p>Date: <?php  echo $items["Date"];?></p>
                                <p>Time: <?php  echo $items["Timming"];?></p>
                                <p>Number of adult: <?php  echo $items["NumberOfAdult"];?></p>
                                <p>Number of Children: <?php  echo $items["NumberOfChildren"];?></p>
                                <p>Jeepsis: <?php  echo $items["NumberOfJeepsis"];?></p>

                                <p>Adult Cost:
                                    <?php  echo  $items["TotalTicketPriceOfAdult"];?></p>
                                <p>Children cost:
                                    <?php  echo $items["TotalTicketPriceOfChildren"];?></p>
                                <p>Jeepsis cost:
                                    <?php  echo $items["TotalCostOfJeepsis"];?></p>
                                <p>Ticket Total <?php 
                            echo $items["totalwithoutgst"];?></p>
                                <p> <?php echo $items["GST"]."% Gst:". $items["GstAmount"];?></p>
                                <p>Grand Total: <?php echo $items["GrandTotal"];?></p>
                                <p>Booking Time: <?php echo $items["TicketBookingTime"];?></p>
                                <?php
                                     }
                                
                                 else
                                 {
                                     ?>
                                <tr>
                                    <td colspan="3">No Record Found</td>
                                </tr>
                                <?php
                                 }
                                
                                ?>
                            </div>
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