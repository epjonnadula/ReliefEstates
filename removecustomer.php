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
    <title>Remove Customer:Relief Estates</title>
    <link href="style/main.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <script>
        function redirectremoveseller(){
            window.open('removecustomer.php','_self')
        }
        function redirectaddseller()
        {
            window.open('addacustomer.php','_self')
        }
    </script>
</head>
<body id="sellerdetailspage" style="background-image:url(img/bgall.jpg)">
<a href="adminhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""> <img src="img/title.png" id="title2" ></a>
<div class="logindetails4">

    <a href="adminprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>
</div>
<a href="logout.php"><img src="img/logout.png" class="logoutpic4"></a>
<div class="sellerdetialsdiv">

    <table class="sellerdetailstable">
        <thead>
        <tr>
            <th colspan="2"><h1>Customer Details</h1></th>
        </tr>
        <tr>
            <th>Username</th>
            <th>Delete Customer</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $query="SELECT cusername FROM customers";
        if($query_run=mysql_query($query))
        {
            if (mysql_num_rows($query_run) == 0)
            {
                echo '<tr><td colspan="2">No Information Available</td></tr>';
            }
            else
            {
                while ($row = mysql_fetch_assoc($query_run))
                {
                    $name = $row['cusername'];
                    ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><a href="deletecustomer.php?del=<?php echo $name; ?>"><input type="button" class="removebutton" value="Delete"></a></td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
        </tbody>
    </table>

</div>
<!--<table>-->
<!--    <tr>-->
<!--        <td> <input type="submit" class="addsellerlink" value="Add seller" onclick="redirectaddseller()"></td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td> <input type="submit" class="removesellerlink" value="Remove seller" onclick="redirectremoveseller()"></td>-->
<!--    </tr>-->
<!--</table>-->
<footer>
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>