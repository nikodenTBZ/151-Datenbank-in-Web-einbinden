<?php
session_start();
require "databaseController.php";

$jobID = $_SESSION['activeJob']['id'];
$userEmail = $_SESSION['email'];

acceptJob($jobID, $userEmail);
header("Location: ../overview.php");
?> 