<?php
/**
 * User: Jonnadula Prithvi
 * DBMS Project
 * Relief Estates
 */
$conn_error='could not connect';
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='';
$mysql_db='reliefestates';
if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password) || !@mysql_select_db($mysql_db))
{
    die($conn_error);
}
?>
