<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
require 'connect.inc.php';
$username=$_GET['del'];
//echo $username;
$query="delete  from customers WHERE cusername='$username'";
$run=mysql_query($query);
if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('customerdetails.php?deleted=user has been deleted','_self')</script>";
}

?>