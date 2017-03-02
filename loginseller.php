<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
require 'connect.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login seller:Relief Estates</title>
    <link href="style/login.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
</head>
<body>
<a href=""> <img src="img/title.png" id="title1" ></a>
<a href="index.php"><img src="img/logo.png" id="logo"></a>

<div class="login-form">
    <h1>Sign In seller</h1>

    <h2><a href="signupseller.php">Create Account</a></h2>

    <form action="loginseller.php" method="post">
        <li>
            <input type="text" class="text" placeholder="User Name" name="username"><a href="#" class=" icon user"></a>
        </li>
        <li>
            <input type="password" placeholder="Password" name="password"><a href="#" class=" icon lock"></a>
        </li>
        <div class="forgot">
            <h3><a href="forgotseller.php">Forgot Password?</a></h3>
            <input type="submit" value="Sign In"> <a href="#"  class=" icon arrow"></a>                                                                                                                                                                                                                                 </h4>
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
session_start();
if(isset($_SESSION['username']))
{

    header("Location: sellerhome.php");
}

if(isset($_POST['username'])&&isset($_POST['password']))
{
    if(!empty($_POST['username'])&&!empty($_POST['password']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $query="SELECT ausername,apassword FROM sellers WHERE ausername='$username' AND apassword='$password'";
        $query2="SELECT aname FROM sellers WHERE ausername='$username'";
        if($query_run=mysql_query($query))
        {
            if (mysql_num_rows($query_run) != NULL)
            {
                //echo "<script>window.open('adminhome.php','_self')</script>";
                header("Location:sellerhome.php");
                $_SESSION['username']=$username;
                if($query_run2=mysql_query($query2))
                {
                    while($row=mysql_fetch_assoc($query_run2))
                    {
                        $name= $row['aname'];
                    }
                    $_SESSION['name']=$name;
                    //var_dump($_SESSION);
                }
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Either username or password is wrong")';
                echo '</script>';
            }
        }
        else
        {echo '<script language="javascript">';
            echo 'alert("error")';
            echo '</script>';}
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Please enter all fields.")';
        echo '</script>';
    }
}
?>