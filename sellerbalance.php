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

    header("Location: loginseller.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>seller Balance:Relief Estates</title>
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
<a href="sellerhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""> <img src="img/title.png" id="title1" ></a>

<div class="logindetails1">

    <a href="sellerprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutseller.php"><img src="img/logout.png" class="logoutpic1"></a>
<?php
$username=$_SESSION['username'];
$query="SELECT abalance FROM sellers WHERE ausername='$username'";
if($queryrun=mysql_query($query))
{
    while($row=mysql_fetch_assoc($queryrun))
    {
        $balance=$row['abalance'];
    }

}

?>
<div class="loginoption">
    <form method="post">
        <div class="customerbutton"><a href="" ><?php echo "Rs ".$balance;?></a></div>
        <div class="sellerbutton"> <a href="addsellerbalance.php" >Add Balance</a></div>
    </form>
</div>
<footer class="problem1">
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>

