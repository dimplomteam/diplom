<?php
//var_dump($_GET);
header('Content-Type: text/html; charset=utf-8');
include("connect.php");
include("functions.php");

$anchor=trim($_GET["r"],"/");
if(!$anchor){
$anchor="index";}

$sql="select * from page where anchor='".$anchor."'";
$res=mysql_query($sql);
$page=mysql_fetch_assoc($res);

if(!$page){
$sql="select * from page where anchor='index'";
$res=mysql_query($sql);
$page=mysql_fetch_assoc($res);}

$temp=file_get_contents("temp/template.html");




echo strtr($temp,add_brackets($page));


