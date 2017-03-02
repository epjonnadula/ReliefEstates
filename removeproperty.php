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
    <title>Remove Property:Relief Estates</title>
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

<div class="logindetails2">

    <a href="sellerprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutseller.php"><img src="img/logout.png" class="logoutpic2"></a>
<div class="propertydetialsdiv">
    <table class="propertydetailstable">
        <thead>
        <tr>
            <th colspan="4"><h1>Property Details</h1></th>
        </tr>
        <tr>
            <th>Type</th>
            <th>City Name</th>
            <th>Address</th>
            <th>Remove Property</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $query="SELECT name,cityname,address FROM tempproperty";
        if($query_run=mysql_query($query))
        {
            if (mysql_num_rows($query_run) == 0)
            {
                echo '<tr><td colspan="4">No Information Available</td></tr>';
            }
            else
            {
                while ($row = mysql_fetch_assoc($query_run))
                {
                    $name = $row['name'];
                    $cityname=$row['cityname'];
                    $address=$row['address'];

                    ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $cityname; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><a href="deleteproperty.php?del=<?php echo $address; ?>"><input type="button" class="removebutton" value="Delete"></a></td>
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

<footer>
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>
