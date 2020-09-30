<?php
session_start();
$q=$_GET['q'];
$a=$_GET['a'];
$_SESSION['answer'][$q]=$a;
?>