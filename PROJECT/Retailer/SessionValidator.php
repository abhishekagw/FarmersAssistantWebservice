<?php
session_start();
if(!(isset($_SESSION['rid']) && !empty($_SESSION['rid']))){
    header("location: ../Guest/Login.php");
}