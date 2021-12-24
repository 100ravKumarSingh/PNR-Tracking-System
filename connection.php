<?php

//connecting to server
$con = new mysqli("localhost", "root", "","rms");
if ($con->connect_error) die("Connection failed: " . $con->connect_error);


//creating tables

//creating admin table
$qry="create table admin(
id bigint(20)primary key, name varchar(30),pass varchar(20)
)";
$con->query($qry);
if(($con->query($qry))==true) echo "<script> alert(' admin table created successfully')</script>"; 

//creating passengers table
$qry="create table passengers(
id bigint(20)primary key, name varchar(30),pnr varchar(20)
)";
$con->query($qry);
if(($con->query($qry))==true) echo"<script> alert('pnr  table created successfully')</script>";


?>
