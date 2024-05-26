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
            <h2>Ticket Available</h2>
        </div>
    </div>
    <!--about-->
    <div class="content">

        <!--advantage-->
        <div class="advantages">
            <div class="container">
                <form action="availabilityCookies.php" method="GET">
                    <div class="input-group">
                        <input type="Date" name="search" value="<?php echo $_COOKIE['AvaliableTicket'];?>"
                            class="form-control" placeholder="Search Safari">
                        <button type="submit" class="btn btn-primary"> search </button>
                    </div>
                </form>
                <div class="animals">
                    <div class="container">

                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <th>Ticket</th>
                                    <th>Morning</th>
                                    <th>Afternoon</th>
                                </thead>
                                <tbody>
                                    <?php
                             if(isset($_COOKIE['AvaliableTicket']) && isset($_COOKIE['safari']))
                             {
                                $Date = $_COOKIE['AvaliableTicket'];
                                $Safari = $_COOKIE['safari'];

                                 //Ticket detail
                                 $query = "SELECT SUM(totalticket) as total FROM ticketBooked WHERE Date= '$Date' AND SafariName='$Safari' AND Timming ='morning'";
                                 $query_run = mysqli_query($con, $query);
                                 $row = mysqli_fetch_assoc($query_run);
                                 $morning_tickets = $row['total'];

                                 $query_afternoon = "SELECT SUM(totalticket) as total FROM ticketBooked WHERE Date= '$Date' AND SafariName='$Safari' AND Timming ='afternoon'";
                                 $query_run_afternoon = mysqli_query($con, $query_afternoon);
                                 $row_afternoon = mysqli_fetch_assoc($query_run_afternoon);
                                 $afternoon_tickets = $row_afternoon['total'];

                                 //safari avaliable ticket
                                 $query_safari = "SELECT totalAvaliableTicket FROM safaris WHERE SafariName='$Safari'";
                                 $query_run_safari = mysqli_query($con, $query_safari);
                                 $row_safari = mysqli_fetch_assoc($query_run_safari);
                                 $total_available_tickets = $row_safari['totalAvaliableTicket'];

                                 ?>
                                    <tr class="safari">
                                        <td>Seat</td>
                                        <td>
                                            <form action="add-normal-ticket.php" method="POST">
                                                <input type="hidden" name="shift" value="morning">
                                                <button type=" submit">
                                                    <?php if($morning_tickets != $total_available_tickets){

                                               if(is_null($morning_tickets)){
                                                echo "0/".$total_available_tickets;
                                                }else{
                                                echo $morning_tickets."/".$total_available_tickets;
                                            }?>
                                                </button>
                                            </form>
                                            <?php
                                            }else{
                                            echo "All Booked";
                                            }?>
                                        </td>
                                        <td>
                                            <form action="add-normal-ticket.php" method="POST">
                                                <input type="hidden" name="shift" value="afternoon">
                                                <button type=" submit">
                                                    <?php
                                            if($afternoon_tickets != $total_available_tickets){
                                                if(is_null($afternoon_tickets)){
                                                echo "0/".$total_available_tickets;
                                                }
                                                else{
                                                echo $row_afternoon['total']." /".$total_available_tickets;
                                                }?>
                                                </button>
                                            </form>
                                            <?php
                                            }else
                                            {
                                            echo "All Booked";
                                            }?>
                                        </td>
                                    </tr>
                                    <?php
                             }else
                                {
                                    ?>
                                    <tr>
                                        <td>Seat</td>
                                        <td colspan=" 2">No Record Found
                                        </td>
                                    </tr>
                                    <?php
                                 }?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--advantage-->
        <!--specials-->

    </div>
    <!--footer-->

</body>

</html>