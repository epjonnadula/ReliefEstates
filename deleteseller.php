<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
require 'connect.inc.php';
$username=$_GET['del'];

$query="delete  from sellers WHERE ausername='$username'";
//echo $query;
$run=mysql_query($query);

if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('sellerdetails.php?deleted=user has been deleted','_self')</script>";
}

?>