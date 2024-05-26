<?php
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Safari Management System | Home Page</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/bootstrap5.css" rel="stylesheet" type="text/css" media="all">
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
    <script src="js/bootstrap5.js"></script>
</head>

<body>
    <?php include_once('includes/header.php');?>
    <div class="header-banner">
        <div class="container">
            <div class="head-banner">
                <h3>Visit to a Safari</h3>
                <p> A visit to a Safari offers us an opportunity to see the wild animals.Zoo is a place where we can see
                    different animals and birds at one place. It has great attraction particularly for the children. A
                    visit to a zoo gives us both information and entertainment. We come to learn about the rare species.
                </p>
            </div>
            <div class="banner-grids">
                <div class="col-md-6 banner-grid">
                    <h4>Vestibulum sagittis</h4>
                    <p>Donec dui velit, hendrerit id pharetra nec, posuere porta nisl. Donec magna nulla, commodo in
                        ultrices faucibus lacus aliquet.</p>
                </div>
                <div class="col-md-6 banner-grid">
                    <h4>Itaque Earum Rerum</h4>
                    <p>Donec dui velit, hendrerit id pharetra nec, posuere porta nisl. Donec magna nulla, commodo in
                        ultrices faucibus lacus aliquet.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--header-->
    <!--welcome-->
    <div class="content">
        <div class="welcome">
            <div class="container">
                <h2>welcome to Safari Management</h2>
                <form action="" method="GET">
                    <div class="input-group">
                        <input type="text" name="search"
                            value="<?php if(isset($_GET["search"])) {echo $_GET["search"]; }?>" class="form-control"
                            placeholder="Search Safari">
                        <button type="submit" class="btn btn-primary"> search </button>
                    </div>
                </form>
                <div class="animals">
                    <div class="container">
                        <h3>List of Safaris</h3>
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <th>Safari</th>
                                    <th>Detail</th>
                                    <th>Booked</th>
                                </thead>
                                <tbody>
                                    <?php
                             if(isset($_GET['search']))
                             {
                                 $filtervalues = $_GET['search'];
                                 $query = "SELECT * FROM Safaris WHERE CONCAT(safariName) LIKE '%$filtervalues%' ";
                                 $query_run = mysqli_query($con, $query);
                                 if(mysqli_num_rows($query_run) > 0)
                                 {
                                     foreach($query_run as $items)
                                     {?>
                                    <tr class="safari">
                                        <td><?php echo $items['SafariName']?></td>
                                        <th>
                                            <form action="about.php" method="get">
                                                <input type="hidden" name="safariName"
                                                    value="<?php echo $items['SafariName'];?>">
                                                <button type="submit">Detail</button>
                                            </form>
                                        </th>
                                        <th>
                                            <form action="availabilityCookies.php" method="get">
                                                <input type="hidden" name="safari"
                                                    value="<?php echo $items['SafariName'];?>">
                                                <Button type="submit">Click To
                                                    Book</Button>
                                            </form>
                                        </th>
                                        <?php   }
                                }
                                 else
                                 {
                                     ?>
                                    <tr>
                                        <td colspan="3">No Record Found</td>
                                    </tr>
                                    <?php
                                 }
                             }else{
                                 $query = "SELECT * FROM Safaris";
                                 $query_run = mysqli_query($con, $query);
                                 if(mysqli_num_rows($query_run) > 0)
                                 {
                                     foreach($query_run as $items)
                                     {
                                    ?><tr class="safari">
                                        <td><?php echo $items['SafariName']?></td>
                                        <th>
                                            <form action="about.php" method="get">
                                                <input type="hidden" name="safariName"
                                                    value="<?php echo $items['SafariName'];?>">
                                                <button type="submit">Detail</button>
                                            </form>
                                        </th>
                                        <th>
                                        <th>
                                            <form action="availabilityCookies.php" method="get">
                                                <input type="hidden" name="safari"
                                                    value="<?php echo $items['SafariName'];?>">
                                                <Button type="submit">Click To
                                                    Book</Button>
                                            </form>
                                        </th></Button>
                                        </th>
                                    </tr>
                                    <?php
                                     }
                                 }
                                }
				?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--models-->
                <!--events-->

            </div>
            <?php include_once('includes/footer.php');?>
            <!--footer-->
</body>

</html>