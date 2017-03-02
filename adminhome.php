<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */

session_start();
if(!$_SESSION['username'])
{

    header("Location: adminlogin.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home:Relief Estates</title>
    <link href="style/login.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
</head>
<body>

<a href="adminhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""> <img src="img/title.png" id="title1" ></a>
<div class="logindetails1">

  <a href="adminprofile.php">  <?php
    echo $_SESSION['name'];
    ?></a>


</div>
<a href="logout.php"><img src="img/logout.png" class="logoutpic1"></a>

<div class="loginoption">
    <form method="post">
        <div class="customerbutton"> <a href="customerdetails.php" >Customer Details</a></div>
        <div class="sellerbutton"> <a href="sellerdetails.php" >seller Details</a></div>
        <div class="approveproperty"> <a href="approveproperty.php" >Approve Property</a></div>
        <div class="transactiondetails"> <a href="transactiondetails.php" >Transaction Details</a></div>
    </form>
</div>
<footer class="problem1">
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>
