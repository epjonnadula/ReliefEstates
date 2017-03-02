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
    <title>Sign Up seller:Relief Estates</title>
    <link href="style/login.css" rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
</head>
<body>
<a href="index.php"><img src="img/logo.png" id="logo"></a>
<div class="signup-form">
    <h1>Sign Up</h1>
    <form action="signupseller.php" method="POST">
        <li>
            <input type="text" class="text" name="name" placeholder="Name" >
        </li>
        <li>
            <input type="text" class="text" name="username" placeholder="User Name" >
        </li>
        <li>
            <input type="password" name="password" placeholder="Password">
        </li>
        <li>
            <input type="password" name="confirmpassword" placeholder="Confirm Password">
        </li>
        <li>
            <input type="text" class="text" name="email" placeholder="Email">
        </li>
        <li>
            <input type="text" class="text" name="city" placeholder="City">
        </li>
        <li>
            <input type="text" class="text" name="contactno" placeholder="Contact No">
        </li>
        <li>
            <select name="securityquestion">
                <option value="0">Select security Question </option>
                <option value="1">What is name of your school?</option>
                <option value="2">What is name of your first pet?</option>
                <option value="3">What is you father's birth place?</option>
                <option value="4">What is your mother's middle name?</option>
            </select>
        </li>
        <li>
            <input type="text" class="text" name="answer" placeholder="Answer">
        </li>
        <div class ="forgot">
            <input type="submit"  value="Register" >
        </div>
    </form>
</div>
<!--<footer>-->
<!--    <h4>All rights reserved.</h4>-->
<!--    <a href="developers.php"><p>&copy Relief Estates</p><a>-->
<!--</footer>-->
</body>
</html>
<?php
if(isset($_POST['name'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['confirmpassword'])&&isset($_POST['email'])&&isset($_POST['city'])&&isset($_POST['contactno'])&&isset($_POST['securityquestion'])&&isset($_POST['answer']))
{
    if(!empty($_POST['name'])&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['confirmpassword'])&&!empty($_POST['email'])&&!empty($_POST['contactno'])&&!empty($_POST['city'])&&!empty($_POST['securityquestion'])&&!empty($_POST['answer']))
    {
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $confpassword=$_POST['confirmpassword'];
        $email=$_POST['email'];
        $city=$_POST['city'];
        $contact=$_POST['contactno'];
        $question=$_POST['securityquestion'];
        $answer=$_POST['answer'];


//        echo '<script language="javascript">';
//        echo 'alert("You have registered successfully.")';
//        echo '</script>';
        $query="INSERT INTO reliefestates.sellers (aname,ausername,apassword, aemail, acity, acontact, aquestion, aanswer) VALUES ( '$name', '$username', '$password', '$email', '$city', '$contact', '$question','$answer')";
        $query2="SELECT ausername FROM sellers WHERE ausername='$username'";
        if($confpassword==$password)
        {
            if($query_run2=mysql_query($query2))
            {
                if(mysql_num_rows($query_run2)==0)
                {
                    if($query_run=mysql_query($query))
                    {
                        echo '<script language="javascript">';
                        echo 'if(confirm("You have registered successfully."))';
                        echo 'window.location.href = "index.php"';
                        echo '</script>';
                    }
                    else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Registration unsuccessful 1.")';
                        echo '</script>';
                    }

                }
                else
                {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry Username already exits.")';
                    echo '</script>';
                }
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Registration unsuccessful query2.")';
                echo '</script>';
            }
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Passwords did not match.")';
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
