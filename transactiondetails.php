<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
require 'connect.inc.php';
session_start();
if(!$_SESSION['username'])
{
    header("Location: adminlogin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaction Details:Relief Estates</title>
    <link href="style/main.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <script>
        function redirectremoveseller(){
            window.open('removecustomer.php','_self')
        }
        function redirectaddseller()
        {
            window.open('addcustomer.php','_self')
        }
    </script>
</head>
<body id="sellerdetailspage" style="background-image:url(img/bgall.jpg)">
<a href="adminhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""> <img src="img/title.png" id="title2" ></a>
<div class="logindetails2">

    <a href="adminprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>
</div>
<a href="logout.php"><img src="img/logout.png" class="logoutpic2"></a>
<div class="sellerdetialsdiv">
    <table class="sellerdetailstable">
        <thead>
        <tr>
            <th colspan="9"><h1>Transaction Details</h1></th>
        </tr>
        <tr>
            <th>Type</th>
            <th>City Name</th>
            <th>Price</th>
            <th>Area</th>
            <th>Address</th>
            <th>seller username</th>
            <th>Transaction No</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $query="SELECT DISTINCT * FROM final WHERE 1";

        if($query_run=mysql_query($query))
        {
            if (mysql_num_rows($query_run) == 0)
            {
                echo '<tr><td colspan="9">No Information Available</td></tr>';
            }
            else
            {
                while ($row = mysql_fetch_assoc($query_run))
                {
                    echo "<tr><td>{$row['name']}</td><td>{$row['cityname']}</td><td>{$row['price']}</td><td>{$row['area']}</td><td>{$row['address']}</td><td>{$row['sellerusername']}</td><td>{$row['transno']}</td></tr>\n";
                }
            }
        }
        ?>
        </tbody>
    </table>
</div>
<!--<table>-->
<!--    <tr>-->
<!--        <td> <input type="submit" class="addsellerlink" value="Add Customer" onclick="redirectaddseller()"></td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td> <input type="submit" class="removesellerlink" value="Remove Customer" onclick="redirectremoveseller()"></td>-->
<!--    </tr>-->
<!--</table>-->
<footer>
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>