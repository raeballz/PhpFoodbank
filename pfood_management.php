<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("Location:login.php");                       
    }

    require_once("head.php");
    require_once("db_manage.php");
con_db();
$foodname=$_POST['foodname'];
$foodtype=$_POST['foodtype'];
$foodamount=$_POST['foodamount'];





   $line=5;
   $pagenum=$_GET['page']?$_GET['page']:1;
   //total rows
   $totsql="select count(*) from PerishableFoodinfro";
   $totarr=mysql_fetch_row(mysql_query($totsql));
   $pagetot=ceil($totarr[0]/$line);

   // limit the max page
   if($pagenum>=$pagetot){
    $pagenum=$pagetot;
   }
   $offset=($pagenum-1)*$line;

   
   //get all the data
   $sql="select * from PerishableFoodinfro order by NPF_id limit {$offset},{$length}";
   $rst=mysql_query($sql);

echo "<center>";
echo "<h2>view the perishable Food List | <a href='nfood_add.php'>Add Perishable Food</a></h2>";
echo "<table width='700px' border='1px'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>FOOD NAME</th>";
echo "<th>FOOD TYPE </th>";
echo "<th>FOOD AMOUNT</th>";
echo "<th>ADDED_TIME</th>";
echo "<th>MODIFIED_TIME</th>";
echo "<th>MODITY</th>";
echo "<th>DELETE</th>";
echo "</tr>";

while($row=mysql_fetch_assoc($rst)){
echo "<tr>";
echo "<td>{$row['PF_id']}</td>";
echo"<td>{$row['Foodname']}</td>";
echo"<td>{$row['Food_type']}</td>";
echo"<td>{$row['Amount']}</td>";
echo"<td>{$row['date_added']}</td>";
echo"<td>{$row['date_modified']}</td>";
echo"<td><a href='pfood_modified.php?id={$row['PF_id']}'>Modify</a></td>";
echo"<td><a href='pfood_delete.php?id={$row['PF_id']}'>Delete</a></td>";
}
echo"</table>";
$prevpage=$pagenum-1;
$nextpage=$pagenum+1;
?>
<p align="center">
   
   <a href='pfood_management.php?page={$prevpage}'>LastPage</a>|
   No.<?php echo $p+1;?>Page
   <a href='pfood_management.php?page={$nextpage}'>NextPage</a>
    
</p>
