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
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Property:Relief Estates</title>
    <link href="style/login.css" rel='stylesheet' type='text/css'/>
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
<a href=""> <img src="img/title.png" id="title1" ></a>

<div class="logindetails1">

    <a href="sellerprofile.php">  <?php
        echo $_SESSION['name'];
        ?></a>

</div>
<a href="logoutseller.php"><img src="img/logout.png" class="logoutpic1"></a>


<div class="signup-form">
    <h1>Add Property</h1>
    <form action="addproperty.php" method="post">
        <li>
            <select name="name">
                <option value="0">Name</option>
                <option value="Apartment">Apartment</option>
                <option value="Independent">Independent</option>
            </select>
        </li>
        <li>
            <select name="bhk">
                <option value="0">BHK</option>
                <option value="1BHK">1BHK</option>
                <option value="2BHK">2BHK</option>
                <option value="3BHK">3BHK</option>
                <option value="4BHK">4BHK</option>
                <option value="5BHK">5BHK</option>
                <option value="6BHK">6BHK</option>
                <option value="7BHK">7BHK</option>
                <option value="8BHK">8BHK</option>
                <option value="9BHK">9BHK</option>
                <option value="9+BHK">9+BHK</option>
            </select>
        </li>
        <li>
            <select name="constatus">
                <option value="0">Construction Status</option>
                <option value="Completed">Completed</option>
                <option value="50 % Completed">50 % Completed</option>
                <option value="Not Completed">Not Completed</option>
            </select>
        </li>
        <li>
            <?php
            $query="SELECT cname from citiestable";
            $query_run=mysql_query($query);

            echo "<select name='cityname'>";
            echo "<option value='0'>Select City</option>";
            while ($row = mysql_fetch_array($query_run)) {
                echo $row['cname'];
                ?>
                <option  value="<?php echo $row['cname']; ?>"><?php echo $row['cname']; ?></option>
                <?php
            }
            echo "</select>";
            ?>
        </li>
        <li>
            <input type="text" class="text" name="price" placeholder="Price in RS">
        </li>
        <li>
            <input type="text" class="text" name="area" placeholder="Area in Yards">
        </li>
        <li>
            <textarea  rows="5" cols="54" class="text" name="address" placeholder="Address" ></textarea>
        </li>
        <li>
            <textarea  rows="5" cols="54" class="text" name="description" placeholder="Description" ></textarea>
        </li>


        <div class ="forgot">
            <input type="submit"  value="Upload" >
        </div>
        <?php
        if(isset($_POST['name'])&&isset($_POST['cityname'])&&isset($_POST['price'])&&isset($_POST['area'])&&isset($_POST['address'])&&isset($_POST['description'])&&isset($_POST['bhk'])&&isset($_POST['constatus']))
        {
            if(!empty($_POST['name'])&&!empty($_POST['cityname'])&&!empty($_POST['price'])&&!empty($_POST['area'])&&!empty($_POST['address'])&&!empty($_POST['description'])&&!empty($_POST['bhk'])&&!empty($_POST['constatus']))
            {
                $name=$_POST['name'];
                $cityname=$_POST['cityname'];
                $price=$_POST['price'];
                $area=$_POST['area'];
                $address=$_POST['address'];
                $description=$_POST['description'];
                $bhk=$_POST['bhk'];
                $constatus=$_POST['constatus'];


                $query2="INSERT INTO tempproperty(name, cityname, price, area, address, description, bhk, constructionstatus,status,username) VALUES ('$name','$cityname','$price','$area','$address','$description','$bhk','$constatus','Not Approved','$username') ";
                if($query_run2=mysql_query($query2))
                {
                    echo '<script language="javascript">';
                    echo 'alert("Upload successful.Please upload the documents")';

                    echo '</script>';

                }
                else
                {
                    echo '<script language="javascript">';
                    echo 'alert("Upload unsuccessful.")';
                    echo '</script>';
                }


            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Please enter all fields.")';
                echo '</script>';
            }
        }

        ?>
        <a href="practice.php?address=<?php echo $address?>" class="uploaddocuments">Upload Documents</a>
    </form>
</div>

<footer>
    <h4>All rights reserved.</h4>
    <a href="developers.php"><p>&copy Relief Estates</p><a>
</footer>
</body>
</html>

