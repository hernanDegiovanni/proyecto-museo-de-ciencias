<?php
session_start();

if(!isset($_SESSION['dnige']) && !isset($_SESSION['dniadmin'])){
  header("location:../index.php");
 }
?>