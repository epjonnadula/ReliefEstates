<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
require 'connect.inc.php';
session_start();
 $address= $_POST['xx'];
if(!$_SESSION['username'])
{

    header("Location: loginseller.php");
}
$username=$_SESSION['username'];
?>
<?php
if(!file_exists("upload/".$address.$username."/"))
{
    mkdir("upload/".$address.$username."/");
}


else if(substr($_FILES['a']['type'],0,5)=='image')
{
    $ext= substr( $_FILES['a']['type'],6);
    $_FILES['a']['name']=$address.$username."a.".$ext;
    $img=$_FILES['a']['name'];
    move_uploaded_file($_FILES['a']['tmp_name'],"upload/".$address.$username."/".$_FILES['a']['name']);
}
else
{
    echo '<script language="javascript">';
    echo 'alert("Only images files")';
    echo '</script>';
}
?>
<?php
if(!file_exists("upload/".$address.$username."/"))
{
    mkdir("upload/".$address.$username."/");
}


else if(substr($_FILES['b']['type'],0,5)=='image')
{
    $ext= substr( $_FILES['b']['type'],6);
    $_FILES['b']['name']=$address.$username."b.".$ext;
    $img=$_FILES['b']['name'];
    move_uploaded_file($_FILES['b']['tmp_name'],"upload/".$address.$username."/".$_FILES['b']['name']);
}
else
{
    echo '<script language="javascript">';
    echo 'alert("Only images files")';
    echo '</script>';
}
?>
<?php
if(!file_exists("upload/".$address.$username."/"))
{
    mkdir("upload/".$address.$username."/");
}


else if(substr($_FILES['c']['type'],0,5)=='image')
{
    $ext= substr( $_FILES['c']['type'],6);
    $_FILES['c']['name']=$address.$username."c.".$ext;
    $img=$_FILES['c']['name'];
    move_uploaded_file($_FILES['c']['tmp_name'],"upload/".$address.$username."/".$_FILES['c']['name']);
}
else
{
    echo '<script language="javascript">';
    echo 'alert("Only images files")';
    echo '</script>';
}
?>
<?php
if(!file_exists("upload/".$address.$username."/"))
{
    mkdir("upload/".$address.$username."/");
}


else if(substr($_FILES['d']['type'],0,5)=='image')
{
    $ext= substr( $_FILES['d']['type'],6);
    $_FILES['d']['name']=$address.$username."d.".$ext;
    $img=$_FILES['d']['name'];
    move_uploaded_file($_FILES['d']['tmp_name'],"upload/".$address.$username."/".$_FILES['d']['name']);
}
else
{
    echo '<script language="javascript">';
    echo 'alert("Only images files")';
    echo '</script>';
}
?>

<?php
$a=$_FILES['a']['name'];
$b=$_FILES['b']['name'];
$c=$_FILES['c']['name'];
$d=$_FILES['d']['name'];
$query="UPDATE tempproperty SET a='$a',b='$b',c='$c',d='$d' WHERE username='$username' AND address='$address'";
$queryrun=mysql_query($query);
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
<br><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="sellerhome.php" >Go Back to home page</a>
</body>
</html>
