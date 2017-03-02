<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */

require('connect.inc.php');
session_start();
if(!$_SESSION['username'])
{

    header("Location: loginseller.php");
}
$sessionname=$_SESSION['username']
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update seller:Relief Estates</title>
    <link href="style/login.css" rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
</head>
<body>
<a href="sellerhome.php"><img src="img/logo.png" id="logo"></a>
<a href=""> <img src="img/title.png" id="title1" ></a>
<div class="logindetails3">

    <a href="sellerprofile.php">  <?php
        echo $_SESSION['name'];

        ?></a>

</div>
<a href="logoutseller.php"><img src="img/logout.png" class="logoutpic3"></a>
<div class="signup-form">
    <h1>Update Password</h1>
    <form action="updateseller.php" method="POST">

        <li>
            <input type="password" name="oldpassword" placeholder=" Old Password">
        </li>
        <li>
            <input type="password" name="newpassword" placeholder=" New Password">
        </li>
        <li>
            <input type="password" name="confirmpassword" placeholder="Confirm Password">
        </li>

        <div class ="forgot">
            <input type="submit"  value="Update" >                                                                                                                                                                                                                      </h4>
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
if(isset($_POST['newpassword'])&&isset($_POST['oldpassword'])&&isset($_POST['confirmpassword']))
{
    if (!empty($_POST['newpassword']) &&isset($_POST['oldpassword'])&& !empty($_POST['confirmpassword']) )
    {
        $newpassword = $_POST['newpassword'];
        $oldpassword=$_POST['oldpassword'];
        $confpassword = $_POST['confirmpassword'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $contact = $_POST['contactno'];
        $question = $_POST['securityquestion'];
        $answer = $_POST['answer'];

        $query="UPDATE sellers SET apassword='$newpassword' WHERE ausername='$sessionname' ";
        $query2="SELECT apassword from sellers WHERE ausername='$sessionname'";
        if($query_run2 = mysql_query($query2))
        {

            $dbpassword = mysql_result($query_run2,0,'apassword');
            $dbpassword;

            if($dbpassword==$oldpassword)
            {
                if($query_run = mysql_query($query))
                {
                    echo '<script language="javascript">';
                    echo 'alert("Update successful.")';
                    echo '</script>';
                }
                else
                {
                    echo '<script language="javascript">';
                    echo 'alert("Update unsuccessful. Please try again.")';
                    echo '</script>';
                }
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Old password wrong. Please try again.")';
                echo '</script>';
            }
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Update unsuccessful. Please try again.")';
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