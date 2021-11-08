<?php

require "./controller/databaseController.php";

class jobService
{

    public function getJobsList()
    {

        // Get the Jobs from the Database
        return getProducts();
    }

    public function getJob($id)
    {

        return getProductById($id);
    }

    public function acceptJob($jobId, $userEmail)
    {
        acceptJob($jobId, $userEmail);
    }

    function createNewJob($jobName, $jobDescription, $jobDateAndTime, $jobSalary)
    {
        $creatorEmail = $_SESSION["email"];
        createJob($jobName, $jobDescription, $jobDateAndTime, $jobSalary, $creatorEmail);
    }
}
