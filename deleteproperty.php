<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
require 'connect.inc.php';
$address=$_GET['del'];

$query="delete  from tempproperty WHERE address='$address'";
//echo $query;
$run=mysql_query($query);

if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('sellerhome.php?deleted=user has been deleted','_self')</script>";
}

?>