<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("Location:login.php");                       
    }

    require_once("head.php");
    require_once("db_manage.php");
    $f_id=$_GET['id'];
    con_db();
    $sql="select * from PerishableFoodinfro where PF_id='" . $f_id . "'";
    $rst=mysql_query($sql);
    $row = mysql_fetch_row($rst);
?>    
   

<form method=\"POST\"  action=\"$_SERVER[PHP_SELF]\" >
<p><strong>Food Name</strong></p>
<input type=\"text\" name=\"foodname\" value="{$row['Foodname']}" size=30 maxlength=50>

<p><strong>Food Type</strong></p>
<input type=\"radio\" name=\"foodtype\" value=\"Dairy\">Dairy

<input type=\"radio\" name=\"foodtype\" value=\"FruitVeg\">FruitVeg

<input type=\"radio\" name=\"foodtype\" value=\"Cereals\">Cereals

<input type=\"radio\" name=\"foodtype\" value=\"Bread\">Bread

<input type=\"radio\" name=\"foodtype\" value=\"Condiments\">Condiments

<input type=\"radio\" name=\"foodtype\" value=\"CakesBiscuits\">CakesBiscuits

<input type=\"radio\" name=\"foodtype\" value=\"Savoury\">Savoury


<p><strong>Food Amount</strong></p>
<input type=\"text\" name=\"foodamount\" value="{$row['Foodname']}" size=5 maxlength=15>


<input type=\"submit\" value=\"OK\">
<input type=\"reset\" value=\"cancel\">

<?php
$foodname=$_POST['foodname'];
$foodtype=$_POST['foodtype'];
$foodamount=$_POST['foodamount'];

$now=date();
UpdatePFood($foodname,$foodamount,$f_id,$now);
include("bottom.php");
?>