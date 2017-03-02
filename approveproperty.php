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
    <title>Approve Property:Relief Estates</title>
    <link href="style/main.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
</head>
<body id="approveproperty">
<a href="adminhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""> <img src="img/title.png" id="title2" ></a>
<div class="logindetails4">

    <a href="adminprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>


</div>
<a href="logout.php"><img src="img/logout.png" class="logoutpic4"></a>
<div class="propertydetialsdiv">
    <table class="propertydetailstable">
        <thead>
        <tr>
            <th colspan="5"><h1>Property Approval Pending</h1></th>
        </tr>
        <tr>
            <th>Type</th>
            <th>City Name</th>
            <th>Address</th>
            <th>Seller username</th>
            <th>Approve Property</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $query="SELECT name,cityname,address,username FROM tempproperty WHERE status='Not Approved'";
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
                    $name = $row['name'];
                    $cityname=$row['cityname'];
                    $address=$row['address'];
                    $usernameseller=$row['username'];
                    ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $cityname; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $usernameseller; ?></td>
                        <td><a href="approvemiddle.php?address=<?php echo $address; ?>&name=<?php echo $name?>&usernameseller=<?php echo $usernameseller?>"><input type="button" class="buybutton" value="View to approve"></a></td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
        </
        </tbody>
    </table>
</div>
<!--<table>-->
<!--    <tr>-->
<!--        <td> <input type="submit" class="addpropertylink" value="Add Property" onclick="redirectaddproperty()"></td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td> <input type="submit" class="removeproprtylink" value="Remove Property" onclick="redirectremoveproprty()"></td>-->
<!--    </tr>-->
<!--</table>-->
<footer>
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>