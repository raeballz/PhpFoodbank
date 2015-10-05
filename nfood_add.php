<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("Location:login.php");                       
    }

    require_once("head.php");
    require_once("db_manage.php");
?>
<form method=\"POST\"  action=\"$_SERVER[PHP_SELF]\" >
<p><strong>Food Name</strong></p>
<input type=\"text\" name=\"foodname\" size=30 maxlength=50>

<p><strong>Food Type</strong></p>
<input type=\"radio\" name=\"foodtype\" value=\"Canned Side\">Canned Side

<input type=\"radio\" name=\"foodtype\" value=\"CannedMeal\">CannedMeal

<input type=\"radio\" name=\"foodtype\" value=\"CannedDesert\">CannedDesert

<input type=\"radio\" name=\"foodtype\" value=\"Rice\">Rice

<input type=\"radio\" name=\"foodtype\" value=\"Pasta\">Pasta

<input type=\"radio\" name=\"foodtype\" value=\"CookingSauces\">CookingSauces

<input type=\"radio\" name=\"foodtype\" value=\"Juice\">Juice

<input type=\"radio\" name=\"foodtype\" value=\"Tea/Coffee\">Tea/Coffee

<input type=\"radio\" name=\"foodtype\" value=\"Sugar\">Sugar
<p><strong>Food Amount</strong></p>
<input type=\"text\" name=\"foodamount\" size=5 maxlength=15>


<input type=\"submit\" value=\"OK\">
<input type=\"reset\" value=\"cancel\">

<?php
$foodname=$_POST['foodname'];
$foodtype=$_POST['foodtype'];
$foodamount=$_POST['foodamount'];
AddNFood($foodname,$foodtype,$foodamount);
include("bottom.php");

?>