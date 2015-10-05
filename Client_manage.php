 <?php
 
 require_once("db_manage.php");

 
 
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];

$tel=$_POST['tel'];
$email=$_POST['email'];

$address=$_POST['address'];

$city=$_POST['city'];
$zip=$_POST['zip'];
AddClient($firstname,$lastname,$tel,$email,$address,$zip,$city);

?>