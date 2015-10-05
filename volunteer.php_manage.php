<?php


require_once("db_manage.php");

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$weight=$_POST['weight'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$zip=$_POST['zip'];
AddVolunteer($firstname,$lastname,$weight,$tel,$email,$address,$zip,$city);


?>