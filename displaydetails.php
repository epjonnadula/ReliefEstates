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
$cityname= $_GET['cityname'];
$address= $_GET['address'];
$name= $_GET['name'];
$username=$_SESSION['username'];
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
        <th colspan="2"><h1>Property Details</h1></th>
    </tr>
    <tr>
        <th>Name of information</th>
        <th>Information</th>
    </tr>
    </thead>
    <?php
             $query="SELECT name, bhk, constructionstatus, cityname, price, area, address, description, status, a, b, c, d FROM tempproperty WHERE address='$address' AND cityname='$cityname' AND name='$name'";
        if($query_run=mysql_query($query))
        {
            if (mysql_num_rows($query_run) == 0)
            {
                echo '<tr><td colspan="2">No Information Available</td></tr>';
            } else
            {
                while ($row = mysql_fetch_assoc($query_run)) {
                    $cityname = $row['cityname'];
                    $address = $row['address'];
                    $status = $row['status'];
                    $name = $row['name'];
                    $constructionstatus=$row['constructionstatus'];
                    $price=$row['price'];
                    $area=$row['area'];
                    $description=$row['description'];
                    $status=$row['status'];
                    $a=$row['a'];
                    $b=$row['b'];
                    $c=$row['c'];
                    $d=$row['d'];
                    $bhk=$row['bhk'];
                }
            }
        }
    ?>
    <tbody>
        <tr>
            <td>Type of Property</td>
            <td><?php echo $name?></td>
        </tr>
        <tr>
            <td>BHK</td>
            <td><?php echo $bhk?></td>
        </tr>
        <tr>
            <td>Construction Status</td>
            <td><?php echo $constructionstatus?></td>
        </tr>
        <tr>
            <td>City Name</td>
            <td><?php echo $cityname?></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><?php echo $price?></td>
        </tr>
        <tr>
            <td>Area of property</td>
            <td><?php echo $area?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $address?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><?php echo $description?></td>
        </tr>
        <tr>
            <td>Approval Status</td>
            <td><?php echo $status?></td>
        </tr>
        <tr>
            <td>Land Record</td>
            <td><img src="upload/<?php echo $address.$username?>/<?php echo $a?>" width="250px" ></td>
        </tr>
        <tr>
            <td>Construction Clearances</td>
            <td><img src="upload/<?php echo $address.$username?>/<?php echo $b?>"width="250px"></td>
        </tr>
        <tr>
            <td>Master Plan of the Area</td>
            <td><img src="upload/<?php echo $address.$username?>/<?php echo $c?>" width="250px"></td>
        </tr>
        <tr>
            <td>No Objection Certificates</td>
            <td><img src="upload/<?php echo $address.$username?>/<?php echo $d?>" width="250px"></td>
        </tr>
    </tbody>
</table>

</body>
</html>
