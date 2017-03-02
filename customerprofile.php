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

    header("Location: logincustomer.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Profile:Relief Estates</title>
    <link href="style/login.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <script>
        function redirectremoveproprty(){
            window.open('removeproperty.php','_self')
        }
        function redirectaddproperty()
        {
            window.open('addproperty.php','_self')
        }
    </script>
</head>
<body id="customerdetailspage" style="background-image:url(img/bgall.jpg)">
<a href="customerhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""> <img src="img/title.png" id="title1" ></a>

<div class="logindetails1">

    <a href="customerprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutcustomer.php"><img src="img/logout.png" class="logoutpic1"></a>

<div class="loginoption">
    <form method="post">
        <div class="customerbutton"> <a href="updatecustomer.php" >Update Password</a></div>
        <div class="sellerbutton"> <a href="customerbalance.php" >View Balance</a></div>
    </form>
</div>
<footer class="problem1">
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>
