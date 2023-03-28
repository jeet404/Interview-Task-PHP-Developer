<?php
require_once 'DB/connect.php';
session_destroy();
header('Location: login.php');
?>