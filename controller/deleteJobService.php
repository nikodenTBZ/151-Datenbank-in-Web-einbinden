<?php
session_start();
require "databaseController.php";

$jobID = $_SESSION['activeJob']['id'];

deleteJob($jobID);
header("Location: ../overview.php");
