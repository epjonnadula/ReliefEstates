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
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Customer Home:Relief Estates</title>
        <link href="style/login.css" rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
        <a href=""> <img src="img/title.png" id="title1" ></a>

    </head>
    <body id="customerdetailspage" style="background-image:url(img/bgall.jpg)">
    <a href="customerhome.php"><img src="img/logo.png" id="logo"></a>

    <div class="logindetails1">

        <a href="customerprofile.php">  <?php
            echo $_SESSION['name'];
            ?></a>

    </div>
    <a href="logoutcustomer.php"><img src="img/logout.png" class="logoutpic1"></a>
    <div class="signup-form">
        <h1>Search Property</h1>
        <form action="customerhome.php" method="get">
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
            <div class ="forgot">
                <input type="submit"  value="Search" >                                                                                                                                                                                                                 </h4>
            </div>
        </form>
    </div>
    <footer>
        <h4>All rights reserved.</h4>
        <a href="developers.php"><p>&copy Relief Estates</p><a>
    </footer>
    </body>
    </html>
<?php
if(isset($_GET['name'])&&isset($_GET['cityname'])&&$_GET['bhk'])
{
    if(!empty($_GET['name'])&&!empty($_GET['cityname'])&&!empty($_GET['bhk']))
    {
        $name=$_GET['name'];
        $cityname=$_GET['cityname'];
        $bhk=$_GET['bhk'];
//       header("Location:displayproperty.php");
        ?><script>window.open('displayproperty.php?name=<?php echo $name; ?>&cityname=<?php echo $cityname; ?>&bhk=<?php echo $bhk; ?>','_self')</script>
        <?php
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Please enter all fields.")';
        echo '</script>';
    }
}
?>