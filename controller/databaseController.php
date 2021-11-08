<?php
if (file_exists("../model/JobDatabase.php")) {
    include "../model/JobDatabase.php";
} else if (file_exists("./model/JobDatabase.php")) {
    include "./model/JobDatabase.php";
}

if (file_exists("../model/UserDatabase.php")) {
    include "../model/UserDatabase.php";
} else if (file_exists("./model/UserDatabase.php")) {
    include "./model/UserDatabase.php";
}

function getProducts()
{

    $conn = job_db_connect();

    $sql = "SELECT * FROM job";

    $result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

    return $result;
}

function verifyLogin($email, $password)
{
    $conn = user_db_connect();
    $sql = 'SELECT * from user';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        foreach ($result as $row) {
            if ($row['email'] == $email) {
                if (password_verify($password, $row['password'])) {
                    return true;
                }
            }
        }
    }

    $conn->close();
    return false;
}

function register($email, $password)
{
    $conn = user_db_connect();
    $sql = 'SELECT * from user';


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        foreach ($result as $row) {
            if ($row['email'] == $email) {
                $_SESSION['errorMessage'] = 'Something went wrong while Registering, please try again or contect the site admin';
                return false;
            }
        }
    }

    $sql = 'INSERT INTO user(email, password) VALUES (?, ?)';

    $stmt = mysqli_prepare($conn, $sql);

    if (false === $stmt) {
        echo mysqli_error($conn);
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, 'ss', $email, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
    return true;
}


function getProductById($id)
{
    $conn = job_db_connect();
    $sql = "SELECT * from job where id = $id";

    $result = $conn->query($sql);

    return mysqli_fetch_array($result);
}

function acceptJob($jobId, $userEmail)
{
    $conn = job_db_connect();
    $sql = "UPDATE job SET jobAceptor='$userEmail' WHERE id=$jobId";

    $result = $conn->query($sql);
    return mysqli_fetch_array($result);
}

function createJob($jobName, $jobDescription, $jobDateAndTime, $jobSalary, $jobProvider)
{
    $conn = job_db_connect();
    $sql = "INSERT INTO job (name, details, dateAndTime, salaryPerHour, jobProvider) VALUES (?,?,?,?,?)";


    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $jobName, $jobDescription, $jobDateAndTime, $jobSalary, $jobProvider);
    $result = $conn->query($sql);
    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

function deleteJob($jobID)
{
    $conn = job_db_connect();
    $sql = "DELETE FROM job WHERE id=$jobID";

    $result = $conn->query($sql);
    return mysqli_fetch_array($result);
}
