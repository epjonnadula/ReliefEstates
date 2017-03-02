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

    header("Location: adminlogin.php");
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Add Customer:Relief Estates</title>
        <link href="style/login.css" rel='stylesheet' type='text/css' />
        <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
    </head>
    <body>
    <a href="adminhome.php"><img src="img/logo.png" id="logo"></a>
    <a href=""> <img src="img/title.png" id="title1" ></a>
    <div class="logindetails3">

        <a href="adminprofile.php">  <?php
            echo $_SESSION['name'];
            ?></a>
    </div>
    <a href="logout.php"><img src="img/logout.png" class="logoutpic3"></a>
    <div class="signup-form">
        <h1>Add Customer</h1>
        <form action="addcustomer.php" method="POST">
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
                <input type="submit"  value="Register" >                                                                                                                                                                                                                      </h4>
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



        $query="INSERT INTO reliefestates.customers (cname,cusername,cpassword, cemail, ccity, ccontact, cquestion, canswer) VALUES ( '$name', '$username', '$password', '$email', '$city', '$contact', '$question','$answer')";
        $query2="SELECT cusername FROM customers WHERE cusername='$username'";
        if($confpassword==$password)
        {
            if($query_run2=mysql_query($query2))
            {
                if(mysql_num_rows($query_run2)==0)
                {
                    if($query_run=mysql_query($query))
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Added customer successfully.")';
                        echo '</script>';
                    }
                    else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Failed to add.")';
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
                echo 'alert("Failed to add.")';
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