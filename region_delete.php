<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("Location:login.php");                       
    }

    require_once("head.php");
    require_once("db_manage.php");
    $r_id=$_GET['id'];
    DeleteRegion($r_id);

    ?>