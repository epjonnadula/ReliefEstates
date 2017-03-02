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
$cityname=$_GET['cityname'];
$bhk=$_GET['bhk'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Display Property:Relief Estates</title>
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
            <th colspan="9"><h1>Property Details</h1></th>
        </tr>
        <tr>
            <th>Type</th>
            <th>City Name</th>
            <th>Address</th>
            <td>BHK</td>
            <td>Construction Status</td>
            <td>Price</td>
            <td>Area of property</td>
            <td>Description</td>
            <td>View Documents</td>
        </tr>
        </thead>

        <tbody>
        <?php
        $query="SELECT * FROM tempproperty WHERE status='Approved' AND cityname='$cityname' AND name='$name' AND  bhk='$bhk'";
        if($query_run=mysql_query($query))
        {
            if (mysql_num_rows($query_run) == 0)
            {
                echo '<tr><td colspan="9">No Information Available</td></tr>';
            }
            else
            {
                while ($row = mysql_fetch_assoc($query_run))
                {
                    $cityname = $row['cityname'];
                    $address = $row['address'];
                    $status = $row['status'];
                    $name = $row['name'];
                    $constructionstatus=$row['constructionstatus'];
                    $price=$row['price'];
                    $area=$row['area'];
                    $description=$row['description'];
                    $username=$row['username'];
                    ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $cityname; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $bhk?></td>
                        <td><?php echo $constructionstatus?></td>
                        <td><?php echo $price?></td>
                        <td><?php echo $area?></td>
                        <td><?php echo $description?></td>
                        <td><a href="viewdocuments.php?address=<?php echo $address; ?>&name=<?php echo $name?>&bhk=<?php echo $bhk?>&username=<?php echo $username?>"><input type="button" class="buybutton" value="View Documents"></a></td>
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
</body>
</html>