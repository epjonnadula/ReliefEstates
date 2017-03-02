<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
require 'connect.inc.php';
$address=$_GET['address'];
$name=$_GET['name'];
$usernameseller=$_GET['usernameseller'];
$query="UPDATE tempproperty SET status='Approved' WHERE address='$address' AND name='$name' AND username='$usernameseller'";
//echo $query;
$run=mysql_query($query);

if($run)
{
    echo "<script>window.open('approveproperty.php','_self')</script>";
}

?>