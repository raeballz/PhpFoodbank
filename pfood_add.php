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
<input type=\"radio\" name=\"foodtype\" value=\"Dairy\">Dairy

<input type=\"radio\" name=\"foodtype\" value=\"FruitVeg\">FruitVeg

<input type=\"radio\" name=\"foodtype\" value=\"Cereals\">Cereals

<input type=\"radio\" name=\"foodtype\" value=\"Bread\">Bread

<input type=\"radio\" name=\"foodtype\" value=\"Condiments\">Condiments

<input type=\"radio\" name=\"foodtype\" value=\"CakesBiscuits\">CakesBiscuits

<input type=\"radio\" name=\"foodtype\" value=\"Savoury\">Savoury



<input type=\"text\" name\"foodamount\" size=5 maxlength=15>

<input type=\"submit\" value=\"OK\">
<input type=\"reset\" value=\"cancel\">

<?php
$foodname=$_POST['foodname'];
$foodtype=$_POST['foodtype'];
$foodamount=$_POST['foodamount'];
AddPFood($foodname,$foodtype,$foodamount);

include("bottom.php");

?>