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
            <h2>about</h2>
        </div>
    </div>
    <!--about-->
    <div class="content">

        <!--advantage-->
        <div class="advantages">
            <div class="container">
                <?php

if(!isset($_GET["safariName"])) {
	echo "No Data Found";
  } else {
	$stmt= $con->prepare("SELECT * FROM safaris WHERE SafariName=? ");
	if($stmt){
	$stmt->bind_param("s", $_GET["safariName"]);
	if($stmt->execute()){
	$result = $stmt->get_result();
	if(mysqli_num_rows($result) > 0){
		foreach($result as $items){
 ?>
                <div class="advantages-grids">
                    <div class="col-md-12 advantage-grid">
                        <div class="advantage">
                            <h3><?php  echo $items["SafariName"];?></h3>
                            <div class="right-grid">

                                <p><?php  echo $items['aboutSafari'];?>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <table class="table table-striped">
                            <thead>
                                <th>Batch</th>
                                <th>Entry</th>
                                <th>Exit</th>
                            </thead>
                            <tbody>
                                <tr class="time">
                                    <th>Morning</th>
                                    <th><?php
                                        if(isset($items['Batch1opennigTime'])){
                                            echo $items['Batch1opennigTime'];
                                        }else{
                                            echo "Not Avaliable";
                                        }
                                    ?></th>
                                    <th><?php
                                        if(isset($items['Batch1closeTime'])){
                                            echo $items['Batch1closeTime'];
                                        }else{
                                            echo "Not Avaliable";
                                        }
                                    ?></th>
                                <tr>
                                <tr class="time">
                                    <th>Afternoon</th>
                                    <th><?php
                                        if(isset($items['Batch2opennigTime'])){
                                            echo $items['Batch2opennigTime'];
                                        }else{
                                            echo "Not Avaliable";
                                        }
                                        ?></th>
                                    <th><?php
                                        if(isset($items['Batch2closeTime'])){
                                            echo $items['Batch2closeTime'];
                                        }else{
                                            echo "Not Avaliable";
                                        }
                                        ?></th>
                                <tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="clearfix">
                        <table class="table table-striped">
                            <thead>
                                <th>Ticket</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                <tr class="time">
                                    <th>Adult</th>
                                    <th><?php if(isset($items['AdultTicketPrice'])){
                                        echo $items['AdultTicketPrice'];
                                    }else{
                                        echo "Not Avaliable";
                                    }
                                        ?></th>
                                </tr>
                                <tr class="time">
                                    <th>Child</th>
                                    <th>
                                        <?php
                                        if(isset($items['childTicketPrice'])){
                                            echo $items['childTicketPrice'];
                                    }else{
                                    echo "Not Avaliable";
                                    }
                                    ?></th>
                                </tr>
                                <tr class="time">
                                    <th>Jeepse</th>
                                    <th><?php
                                    if(isset($items['jeepsiprice'])){
                                        echo $items['jeepsiprice'];
                                    }else{
                                        echo "Not Avaliable";
                                        }
                                    ?></th>
                                <tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <?php
                   }
                 }else{
						echo "No Data Found";
					}
				}else{
				    echo "No Data Found";
				}
			}else{
			   echo "No Data Found";
			}
        }
			?>
        </div>
        <!--advantage-->
        <!--specials-->

    </div>
    <!--footer-->

</body>

</html>