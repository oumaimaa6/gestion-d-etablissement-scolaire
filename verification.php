<?php
include_once("conbd.php");
if(!isset($_SESSION["email"]) || $_SESSION["email"] == null)
{
    header("location:index.php");
}
?>