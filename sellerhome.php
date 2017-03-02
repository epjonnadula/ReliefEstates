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
    <title>seller Home:Relief Estates</title>
    <link href="style/main.css" rel='stylesheet' type='text/css'/>
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
<a href=""> <img src="img/title.png" id="title2" ></a>

<div class="logindetails4">

    <a href="sellerprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutseller.php"><img src="img/logout.png" class="logoutpic4"></a>
<div class="propertydetialsdiv">
    <table class="propertydetailstable">
        <thead>
        <tr>
            <th colspan="5"><h1>Property Details</h1></th>
        </tr>
        <tr>
            <th>Type</th>
            <th>City Name</th>
            <th>Address</th>
            <th>Status</th>
            <th>Details</th>
        </tr>
        </thead>

        <tbody>
        <?php
         $query="SELECT  name,cityname, address,status FROM tempproperty";
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
                    $cityname=$row['cityname'];
                    $address=$row['address'];
                    $status=$row['status'];
                    $name=$row['name'];
                    ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $cityname; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $status?></td>
                        <td><a href="displaydetails.php?cityname=<?php echo $cityname; ?>&address=<?php echo $address?>&name=<?php echo $name; ?>"><input type="button" class="buybutton" value="View Details"></a></td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
        </tbody>
    </table>
</div>
<table>
    <tr>
        <td> <input type="submit" class="addpropertylink" value="Add Property" onclick="redirectaddproperty()"></td>
    </tr>
    <tr>
        <td> <input type="submit" class="removeproprtylink" value="Remove Property" onclick="redirectremoveproprty()"></td>
    </tr>
</table>
<footer>
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>
