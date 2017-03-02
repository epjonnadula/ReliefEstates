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
    <title>seller Details:Relief Estates</title>
    <link href="style/main.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <script>
        function redirectremoveseller(){
            window.open('removeseller.php','_self')
        }
        function redirectaddseller()
        {
            window.open('addseller.php','_self')
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
            <th colspan="5"><h1>seller Details</h1></th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>City</th>
            <th>Contact</th>

        </tr>
        </thead>

        <tbody>
        <?php
        $query="SELECT aname,ausername,aemail,acity,acontact FROM sellers";
        if($query_run=mysql_query($query))
        {
            if (mysql_num_rows($query_run) == 0)
            {
                echo '<tr><td colspan="5">No Information Available</td></tr>';
            }
            else
            {
                while ($row = mysql_fetch_assoc($query_run))
                {
                    echo "<tr><td>{$row['aname']}</td><td>{$row['ausername']}</td><td>{$row['aemail']}</td><td>{$row['acity']}</td><td>{$row['acontact']}</td></tr>\n";
                }
            }
        }
        ?>
        </tbody>
    </table>
</div>
<table>
    <tr>
        <td> <input type="submit" class="addsellerlink" value="Add seller" onclick="redirectaddseller()"></td>
    </tr>
    <tr>
        <td> <input type="submit" class="removesellerlink" value="Remove seller" onclick="redirectremoveseller()"></td>
    </tr>
</table>
<footer>
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>