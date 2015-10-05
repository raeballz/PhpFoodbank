<?php

/*
    Used to init database
*/

//Create connection
$con = mysql_connect("silva.computing.dundee.ac.uk", "14ac3u21", "132acb");
if(!$con)
{
    die('could not connect: ' . mysql_error());
}



mysql_select_db("14ac3d21", $con);


//Create Tables
$sql = "
create table admin
(
    username varchar(30),
    password varchar(30),
    PRIMARY KEY(username)
)";


$sql= "
create table individualdonator
(  
    ID_id  int NOT NULL AUTO_INCREMENT,
    Firstname varchar(15) NOT NULL,
    Lastname varchar(20),
    WeightOfDonation varchar(15),
    Tel varchar(15),   
    Email  varchar(150),
    Address varchar(50),
    City         varchar(15),
    Zipcode  varchar(10),
    date_added  datetime,
    PRIMARY KEY(ID_id)    
)";



$sql= "
create table nonindividualdonator
(  
    ND_id  int NOT NULL AUTO_INCREMENT,
    GroupName varchar(15) NOT NULL,
    Group_type varchar(20),
    WeightOfDonation varchar(10),
    Tel varchar(15),   
    Email  varchar(150),
    Address varchar(50),
    City         varchar(15),
    Zipcode  varchar(10),
    date_added datetime,
    PRIMARY KEY(ND_id)    
)";



$sql="
create table Client
(
    C_id  int NOT NULL AUTO_INCREMENT,
    Firstname varchar(15) NOT NULL,
    Lastname varchar(20),
    Tel varchar(15),   
    Email  varchar(150),
    Address varchar(50),
    City         varchar(15),
    Zipcode  varchar(10),
    date_added datetime,
    PRIMARY KEY(C_id)    
)";


$sql="
create table Volunteer
(
    V_id  int NOT NULL AUTO_INCREMENT,
    Firstname varchar(15) NOT NULL,
    Lastname varchar(20),
    Tel varchar(15),   
    Email  varchar(150),
    Address varchar(50),
    City         varchar(15),
    Zipcode  varchar(10),
    date_added datetime,
    PRIMARY KEY(C_id)    
)";

$sql="create table Branches
(
    B_id  int NOT NULL AUTO_INCREMENT,
    Branchname varchar(20),
    Tel varchar(15),   
    Email  varchar(150),
    Address varchar(50),
    City         varchar(15),
    Zipcode  varchar(10),
    Staffnumber  int,
    Amountoffood varchar(10),
    date_added datetime,
    PRIMARY KEY(B_id)    
)";

$sql="create table NonPerishableFoodinfro(
   NPF_id int NOT NULL AUTO_INCREMENT,
   Foodname varchar(50),
   Food_type varchar(20),
   Amount varchar(10),
   date_added datetime,
   date_modified datetime,
   PRIMARY KEY(NPF_id)
)";

$sql="create table PerishableFoodinfro(
   PF_id int NOT NULL AUTO_INCREMENT,
   Foodname varchar(50),
   Food_type varchar(20),
   Amount varchar(10),
   date_added datetime,
   date_modified datetime,
   PRIMARY KEY(PF_id)
)";

$sql="create table Region(
  R_id int NOT NULL AUTO_INCREMENT,
  RegionName varchar(30),
  EmploymentPercentage varchar(10),
  GDP varchar(20),
  Population varchar(20),
  AverageCost varchar(20),
  PRIMARY KEY(R_id)
  )";
if(!(mysql_query($sql, $con)))
{
    echo "failed error: " . mysql_error();
}

mysql_close($con);

?>