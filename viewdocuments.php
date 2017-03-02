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
$name=$_GET['name'];
$address=$_GET['address'];
$bhk=$_GET['bhk'];
$username=$_GET['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Display Documents:Relief Estates</title>
    <link href="style/main.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>

</head>
<body id="customerdetailspage" style="background-image:url(img/bgall.jpg)">
<a href="customerhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""> <img src="img/title.png" id="title2" ></a>

<div class="logindetails2">

    <a href="customerprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutcustomer.php"><img src="img/logout.png" class="logoutpic2"></a>
<div class="propertydetialsdiv">
    <table class="propertydetailstable">
        <thead>
        <tr>
            <th colspan="2"><h1>Document Details</h1></th>
        </tr>
        <tr>
            <th>Name of information</th>
            <th>Information</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $query="SELECT a,b,c,d,username FROM tempproperty WHERE name='$name' AND address='$address' AND bhk='$bhk' AND username='$username'";
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
                    $a=$row['a'];
                    $b=$row['b'];
                    $c=$row['c'];
                    $d=$row['d'];
                    $usernameseller=$row['username'];
                    ?>

                    <?php
                }
            }
        }
        ?>
        <tr>
            <td>Land Record</td>
            <td><img src="upload/<?php echo $address.$usernameseller?>/<?php echo $a?>" width="250px" ></td>
        </tr>
        <tr>
            <td>Construction Clearances</td>
            <td><img src="upload/<?php echo $address.$usernameseller?>/<?php echo $b?>"width="250px"></td>
        </tr>
        <tr>
            <td>Master Plan of the Area</td>
            <td><img src="upload/<?php echo $address.$usernameseller?>/<?php echo $c?>" width="250px"></td>
        </tr>
        <tr>
            <td>No Objection Certificates</td>
            <td><img src="upload/<?php echo $address.$usernameseller?>/<?php echo $d?>" width="250px"></td>
        </tr>
        <tr>
            <td>Buy</td>
            <td><a href="buyproperty.php?address=<?php echo $address; ?>&name=<?php echo $name?>&bhk=<?php echo $bhk?>&usernameseller=<?php echo $usernameseller?>"><input type="button" class="buybutton" value="Purchase"></a></td>
        </tr>
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