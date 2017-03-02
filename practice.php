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
$username=$_SESSION['username'];
 $address=$_GET['address'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Property:Relief Estates</title>
    <link href="style/login.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
</head>
<body id="customerdetailspage" style="background-image:url(img/bgall.jpg)">
<a href="sellerhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""><img src="img/title.png" id="title1" ></a>

<div class="logindetails1">

    <a href="sellerprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutseller.php"><img src="img/logout.png" class="logoutpic1"></a>
<div class="signup-form">
    <h1>Add Property</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="xx" value="<?php echo $address;?>" style="display:none">
        <li>
            <label class="label">Land Record</label>&nbsp; <input type="file" name="a">
        </li>
        <li>
            <label class="label"> Construction Clearances</label>&nbsp; <input type="file" name="b">
        </li>
        <li>
            <label class="label">Master Plan of the Area</label>&nbsp; <input type="file" name="c">
        </li>
        <li>
            <label class="label">No Objection Certificates</label>&nbsp; <input type="file" name="d">
        </li>
        <div class ="forgot">
            <input type="submit" value="UPLOAD">
        </div>
    </form>
</div>
</form>
</body>
</html>
