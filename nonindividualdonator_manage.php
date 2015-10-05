<?php
require_once("db_manage.php");

$groupname=$_POST['groupname'];
$grouptype=$_POST['grouptype'];
$weight=$_POST['weight'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$zip=$_POST['zip'];
AddNIndividualDonator($groupname,$weight,$grouptype,$tel,$email,$address,$zip,$city);

?>