<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("Location:login.php");                       
    }

    require_once("head.php");
    require_once("db_manage.php");
    $nf_id=$_GET['id'];
    DeleteNFood($nf_id);

    ?>