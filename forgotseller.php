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
    <title>Change Password seller:Relief Estates</title>
    <link href="style/login.css" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
</head>
<body>
<a href="index.php"><img src="img/logo.png" id="logo"></a>

<div class="forgot-form">
    <h1>Change Password</h1>

    <form action="forgotseller.php" method="post">
        <li>
            <input type="text" class="text" placeholder="User Name" name="username"><a href="#" class=" icon user"></a>
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
        <li>
            <input type="password" name="newpassword" placeholder="New Password">
        </li>
        <li>
            <input type="password" name="confirmpassword" placeholder="Confirm Password">
        </li>
        <div class="forgot">
            <input type="submit" value="Reset">                                                                                                                                                                                                                                  </h4>
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
if(isset($_POST['username'])&&isset($_POST['securityquestion'])&&isset($_POST['answer'])&&isset($_POST['newpassword'])&&isset($_POST['confirmpassword']))
{
    if(!empty($_POST['username'])&&!empty($_POST['securityquestion'])&&!empty($_POST['answer'])&&!empty($_POST['newpassword'])&&!empty($_POST['confirmpassword']))
    {
        $username=$_POST['username'];
        $question=$_POST['securityquestion'];
        $answer=$_POST['answer'];
        $newpassword=$_POST['newpassword'];
        $confirmpassword=$_POST['confirmpassword'];

        $query1="UPDATE sellers SET apassword='$newpassword' WHERE ausername='$username'";
        $query2="SELECT aquestion,aanswer FROM sellers WHERE ausername='$username'";

        if ($query_run2 = mysql_query($query2))
        {
            if (mysql_num_rows($query_run2) != NULL)
            {
                while ($query_row2 = mysql_fetch_assoc($query_run2))
                {
                    $dbquestion = $query_row2['aquestion'];
                    $dbanswer = $query_row2['aanswer'];
                }
                if($dbquestion==$question&&$dbanswer==$answer)
                {
                    if($newpassword==$confirmpassword)
                    {
                        if ($query_run1 = mysql_query($query1))
                        {
                            echo '<script language="javascript">';
                            echo 'alert("Password change successful")';
                            echo '</script>';
                        }
                        else
                        {
                            echo '<script language="javascript">';
                            echo 'alert("Password change unsuccessful. Please try again.")';
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
                    echo 'alert("Either security question or answer is wrong.")';
                    echo '</script>';
                }
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("No username found.")';
                echo '</script>';
            }
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Password change unsuccessful. Please try again.")';
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
