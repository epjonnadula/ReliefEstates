<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
require 'connect.inc.php';
$name = $_GET['name'];
$address=$_GET['address'];
$bhk=$_GET['bhk'];
$usernameseller=$_GET['usernameseller'];

session_start();
if(!$_SESSION['username'])
{

    header("Location: logincustomer.php");
}
$username=$_SESSION['username'];
@$query1="SELECT cbalance FROM customers WHERE cusername='$username'";
@$queryrun1=mysql_query($query1);
while(@$row=mysql_fetch_assoc($queryrun1))
{
    $cbalance=$row['cbalance'];
}
@$query2="SELECT price FROM tempproperty WHERE name='$name' AND address='$address' AND bhk='$bhk' AND username='$usernameseller'";
@$queryrun2=mysql_query($query2);
while(@$row=mysql_fetch_assoc($queryrun2))
{
    $price=$row['price'];
}
if(@$price>$cbalance) {
    echo '<script language="javascript">';
    echo 'alert("No sufficient funds.")';
    echo '</script>';
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Final Buy:Relief Estates</title>
        <link href="style/login.css" rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    </head>
    <body id="customerdetailspage" style="background-image:url(img/bgall.jpg)">
    <a href="customerhome.php"><img src="img/logo.png" id="logo"></a>
    <a href=""> <img src="img/title.png" id="title1"></a>

    <div class="logindetails3">

        <a href="customerprofile.php">  <?php
            $username = $_SESSION['username'];

            echo $_SESSION['name'];
            ?></a>

    </div>
    <a href="logoutseller.php"><img src="img/logout.png" class="logoutpic3"></a>
    <div class="loginoption">
        <form>
            <div class="adminbutton"><a href="customerhome.php">Return Home</a></div>
        </form>
    </div>
    <?php
}

else
{?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Final Buy:Relief Estates</title>
        <link href="style/main.css" rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
        <script type="text/javascript">

            function print()
            {<?php
                    echo '<script language="javascript">';
                    echo 'window.print();';
                    echo '</script>';

            ?>
<!--            this bracket should be there but it is displaying on page had to put in comment " } "-->
        </script>
    </head>
<body id="customerdetailspage" style="background-image:url(img/bgall.jpg)">
<a href="customerhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""> <img src="img/title.png" id="title2" ></a>

<div class="logindetails4">

    <a href="customerprofile.php">  <?php
        $username=$_SESSION['username'];

        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutagent.php"><img src="img/logout.png" class="logoutpic4"></a>
<div class="propertydetialsdiv">
    <table class="propertydetailstable">
    <thead>
    <tr>
        <th colspan="2"><h1>Invoice of Purchase</h1></th>
    </tr>
    <tr>
        <th>Name of information</th>
        <th>Information</th>
    </tr>
    </thead>
        <?php
        @$query="SELECT name, bhk, constructionstatus, cityname, price, area, address, description, status, a, b, c, d FROM tempproperty WHERE address='$address' AND name='$name'";
        if(@$query_run=mysql_query($query))
        {
            if (@mysql_num_rows($query_run) == 0)
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
                    $bhk=$row['bhk'];
                }
            }
        }
        ?>
        <tbody>
        <tr>
            <td>Type of Property</td>
            <td><?php echo @$name?></td>
        </tr>
        <tr>
            <td>BHK</td>
            <td><?php echo @$bhk?></td>
        </tr>
        <tr>
            <td>Construction Status</td>
            <td><?php echo @$constructionstatus?></td>
        </tr>
        <tr>
            <td>City Name</td>
            <td><?php echo @$cityname?></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><?php echo @$price?></td>
        </tr>
        <tr>
            <td>Area of property</td>
            <td><?php echo @$area?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo @$address?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><?php echo @$description?></td>
        </tr>
        <tr>
            <td>Approval Status</td>
            <td><?php echo @$status?></td>
        </tr>
        <tr>
            <td>Print</td>
            <td><input type="button" value="Print" onclick="print()" id="printbutton"></td>
        </tr>
        </tbody>
    </table>

        </body>
    </html>
<?php
    @$query3="UPDATE customers SET cbalance='$cbalance'-'$price' WHERE cusername='$username'";
    @$queryrun3=mysql_query($query3);
    @$query4="SELECT abalance FROM sellers WHERE ausername='$usernameseller'";
    @$queryrun4=mysql_query($query4);
    while(@$row=mysql_fetch_assoc($queryrun4))
    {
        $abalance=$row['abalance'];
    }
    @$query5="UPDATE sellers SET abalance ='$abalance'+'$price' WHERE ausername='$usernameseller'";
    @$queryrun5=mysql_query($query5);
    @$query6="DELETE FROM tempproperty WHERE name='$name' AND address='$address' AND bhk='$bhk'";
    @$queryrun6=mysql_query($query6);
    @$transno=rand(0,999999);
    @$query7="INSERT INTO transactions(name, bhk, cityname, price, area, address, sellerusername, transno) VALUES ('$name','$bhk','$cityname','$price','$area','$address','$usernameseller','$transno')";
    @$queryrun7=mysql_query($query7);
    @$query8="INSERT INTO final(name,bhk,cityname,price,area,address,sellerusername,transno) SELECT * FROM transactions WHERE cityname!=''";
    @$queryrun8=mysql_query($query8);
}?>