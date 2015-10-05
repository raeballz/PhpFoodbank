<?php
include("db_manage.php");
session_start();

require("head.php");

if($_GET["fun"] == "login")
admin_login();
elseif($_GET["fun"]== "logout")
admin_exit();
elseif($_GET["fun"] == "change")
admin_change($_POST);

require("bottom.php");

function admin_exit()
{
    session_destroy();
    header("Location: homepage.php");
}

function admin_login()
{   
    //check the username and password
    if(CheckAdmin($_POST['username'], $_POST['password']) == "")
    {
        $_SESSION['admin'] = $_POST['username']; 
        header("Location: homepage.php");
    }
    else
    {
        header("Location: login.php");
    }   
}

function admin_change($_P)
{
    $info = CheckAdmin($_SESSION['admin'], $_POST['passold']);
    if($info != "")
    {
       $_SESSION['info'] = "Password is wrong,please input again";
       header("Location: admin.php");
    }
    elseif($_POST['passnew']!=$_POST['passnew1'])
    {
       $_SESSION['info'] = "两次输入密码不一致，请重新输入";
       header("Location: admin.php");
    }
    else
    {
       if(UpdateAdmin($_SESSION['admin'], $_POST['passnew']) == "")
       {
         echo "<p align='center'>修改成功</p>";
         echo "<p align='center'><a href='index.php'>返回主页</a></p>";
       }
       else
       {
         $_SESSION['info'] = "数据库操作失败，请稍后再试";
         header("Location: admin.php");
       }
    }
}

?>
