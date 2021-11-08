<?php
session_start();
require "databaseController.php";

$jobname = $_POST['jobName'];
$jobdetails = $_POST['jobDetails'];
$jobdate = $_POST['jobDate'];
$jobsalary = $_POST['jobSalary'];
$jobprovider = $_SESSION['email'];
createJob($jobname, $jobdetails, $jobdate, $jobsalary, $jobprovider);

header("Location: ../overview.php");
