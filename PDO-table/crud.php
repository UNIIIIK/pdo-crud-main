<?php

include("pdo-con.php");

if(isset($_POST['reg-submit']))
{
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $email = $_POST['email']; 
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];
    $address = $_POST['address'];

    //if user and email already exist
    $query = "insert into users (first_name,last_name,email,gender,birthdate,address) VALUES (:first, :last, :email, :gender, :birth, :address)";
    $query_run = $con->prepare($query);

    $data = [
        ':first' => $first,
        ':last' => $last,
        ':email' => $email,
        ':gender' => $gender,
        ':birth' => $birth,
        ':address' => $address,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: index.php');
        die;
    }
        $_SESSION['message'] = "Not Inserted";
        header('Location: index.php');
        die;
    }

