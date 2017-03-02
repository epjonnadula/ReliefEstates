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
    <title>Admin Profile:Relief Estates</title>
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
        <div class="adminbutton"> <a href="updateadmin.php" >Update Password</a></div>
    </form>
</div>
</body>
</html>
