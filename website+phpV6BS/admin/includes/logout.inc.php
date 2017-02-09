<?php
require_once("../init.php");
session_start();
session_destroy(); 
redirect("../login.php");
?>