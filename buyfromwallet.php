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
    <title>Buy From Wallet:Relief Estates</title>
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

<div class="logindetails3">

    <a href="customerprofile.php">  <?php
        $username=$_SESSION['username'];

        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutagent.php"><img src="img/logout.png" class="logoutpic3"></a>
<div class="loginoption">
    <form method="post">
        <div class="customerbutton"><a href="confirmbuy.php?address=<?php echo $address; ?>&name=<?php echo $name?>&bhk=<?php echo $bhk?>&usernameseller=<?php echo $usernameseller?>">Confirm</a></div>
        <div class="sellerbutton"> <a href="customerhome.php" >Cancel</a></div>
    </form>
</div>

</body>
</html>