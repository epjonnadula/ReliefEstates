<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
require 'connect.inc.php';
$name = $_GET['name'];
$address=$_GET['address'];
$bhk=$_GET['bhk'];
$usernameseller=$_GET['usernameseller'];
session_start();
if(!$_SESSION['username'])
{

    header("Location: logincustomer.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Buy Property:Relief Estates</title>
    <link href="style/login.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <a href=""> <img src="img/title.png" id="title1" ></a>
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

<div class="logindetails3">

    <a href="customerprofile.php">  <?php
        $username=$_SESSION['username'];
        
        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutagent.php"><img src="img/logout.png" class="logoutpic3"></a>
<div class="loginoption">
    <form method="post">
        <div class="customerbutton"><a href="buyfromwallet.php?address=<?php echo $address; ?>&name=<?php echo $name?>&bhk=<?php echo $bhk?>&usernameseller=<?php echo $usernameseller?>">Pay From Wallet</a></div>
        <div class="sellerbutton"> <a href="buyfromother.php" >Pay From Other Source</a></div>
    </form>
</div>
<footer class="problem1">
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>