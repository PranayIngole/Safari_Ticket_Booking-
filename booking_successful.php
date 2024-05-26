<?php
error_reporting(0);
include('includes/dbconnection.php');
$Safari = $_POST['safari'];
$Date = $_POST['Date'];
$TIME = $_POST['Time'];
$query= "SELECT SUM(totalticket) as total FROM ticketBooked WHERE Date= '$Date' AND SafariName='$Safari' AND
Timming ='$TIME'";
$query_run = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($query_run);
$tickets = (is_null($row['total']))? 0: $row['total'];
$query_safari = "SELECT totalAvaliableTicket FROM safaris WHERE SafariName='$Safari'";
$query_run_safari = mysqli_query($con, $query_safari);
$row_safari = mysqli_fetch_assoc($query_run_safari);
$total_available_tickets = $row_safari['totalAvaliableTicket'];
if(($_POST['adult'] + $_POST['Child'])>($total_available_tickets - $tickets)){
    header("Location: unsuccessful.php");
}else{
$stmt= $con->prepare("INSERT INTO ticketbooked (TicketID, CustomerName, contactNumber1, contactNumber2, Email, SafariName,Date, Timming,
NumberOfAdult, NumberOfChildren, NumberOfJeepsis, TicketCostOfSingleChild, TicketCostOfSingleAdult,CostOfSingleJeepsis,
TotalTicketPriceOfChildren, TotalTicketPriceOfAdult, TotalCostOfJeepsis, GrandTotal, GST,totalwithoutgst, GstAmount, TicketBookingTime,
totalticket)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?);");
$ticketNumber = mt_rand(100000000, 999999999);
if($stmt){
    $stmt->bind_param("isiissssiiiddddddddddsi",$TicketID, $CustomerName, $contactNumber1, $contactNumber2, $Email,$SafariName, $Date, $Timming,
    $NumberOfAdult, $NumberOfChildren, $NumberOfJeepsis, $TicketCostOfSingleChild,$TicketCostOfSingleAdult, $CostOfSingleJeepsis,
    $TotalTicketPriceOfChildren, $TotalTicketPriceOfAdult,$TotalCostOfJeepsis, $GrandTotal, $GST, $totalwithoutgst, $GstAmount,
    $TicketBookingTime,$TotalTicketBook);
    $TicketID = $ticketNumber; $CustomerName = $_POST["name"]; $contactNumber1 = $_POST["mobile"]; $contactNumber2 = $_POST["AlternateMobile"];
    $Email = $_POST["email"];$SafariName = $_POST["safari"];$Date = $_POST["Date"];$Timming = $_POST["Time"];$NumberOfAdult = $_POST["adult"];
    $NumberOfChildren = $_POST["Child"];$NumberOfJeepsis = $_POST["Jeepsis"];$TicketCostOfSingleAdult = $_POST["AdultTicketPrice"];$TicketCostOfSingleChild=$_POST["childTicketPrice"];
    $CostOfSingleJeepsis = $_POST["jeepsiprice"];$TotalTicketPriceOfChildren = $_POST["totalChildTicket"];
    $TotalTicketPriceOfAdult = $_POST["totalAdultTicket"];$TotalCostOfJeepsis = $_POST["totalJeepsisTicket"];
    $GrandTotal = $_POST["totalwithGST"];$GST = $_POST["gst"];$totalwithoutgst = $_POST["totalwithoutGST"];$GstAmount = $_POST["gstAmount"];
    $TicketBookingTime = date('Y-m-d H:i:s');$TotalTicketBook = $NumberOfAdult + $NumberOfChildren;
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
            <h2>Ticket Booked SuccessFuly</h2>
        </div>
    </div>
    <!--about-->
    <div class="content">
        <!--advantage-->
        <div class="advantages">
            <div class="container">
                <?php
            if($stmt->execute()){
                ?>
                <div class="advantages-grids">
                    <div class="col-md-12 advantage-grid">
                        <div class="advantage">
                            <h3>Ticket Booked SuccessFuly</h3>
                            <p>Ticket ID: <?php echo $TicketID?></p>
                            <p>Name: <?php  echo $_POST["name"];?></p>
                            <p>Safari: <?php  echo $_POST["safari"];?></p>
                            <p>Date: <?php  echo $_POST["Date"];?></p>
                            <p>Time: <?php  echo $_POST["Time"];?></p>
                            <p>Number of adult: <?php  echo $_POST["adult"];?></p>
                            <p>Number of Children: <?php  echo $_POST["Child"];?></p>
                            <p>Jeepsis: <?php  echo $_POST["Jeepsis"];?></p>
                            <p>Adult Cost:
                                <?php  echo  $_POST["totalAdultTicket"];?></p>
                            <p>Children cost:
                                <?php  echo $_POST["totalChildTicket"];?></p>
                            <p>Jeepsis cost:
                                <?php  echo $_POST["totalJeepsisTicket"];?></p>
                            <p>Ticket Total <?php
                            echo $_POST["totalwithoutGST"];?></p>
                            <p> <?php echo $_POST["gst"]."% Gst:". $_POST["gstAmount"];?></p>
                            <p>Grand Total: <?php echo $_POST["totalwithGST"];?></p>
                        </div>
                    </div>
                </div>
                <?php
            }else{
                echo "Unsuccessfull";
            }
        }else{
            echo "unsuccessful";
            echo "Error".$con->error;
        }$con->close();
}?>
            </div>
            <!--footer-->
            <script src="certificate.js"></script>
        </div>
        <div>
            <!-- footer area start-->
            <?php include_once('includes/footer.php');?>
            <!-- footer area end-->
        </div>
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