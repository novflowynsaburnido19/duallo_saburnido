<?php
include("./include/header.php")
?>

<?php
session_start();    
include("config.php");

if(isset($_POST["registerButton"])){

    $student_id = $_POST['student_id'];
    $fname = $_POST['fname'];
    $mname = isset($_POST['mname']) ? $_POST['mname'] : '' ;
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $email_address = $_POST['email_address'];
    

    $check_email_query = "SELECT * FROM `student_information` WHERE `email_address` = '$email'";
    $email_result = mysqli_query($con,$check_email_query);
    $email_count = mysqli_fetch_array($email_result)[0];

    if($email_count > 0){
        $_SESSION['status'] = "Email address already taken";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }

    if ($password !== $repassword){
        $_SESSION['status'] = "Password does not match";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }


    $query = "INSERT INTO `student_information`(`student_id`, `fname`, `mname`, `lname`, `address`, `birthday`, `email_address`) VALUES ('$student_id','$fname','$mname','$lname','$address','$birthday','$email_address')";

    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Registration Sucess!";
        $_SESSION['status_code'] = "success";
        header("Location: login.php");
        exit();
    }
}


if(isset($_POST["loginButton"])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_query = "SELECT `id`, `email`, `password`, `fname`, `mname`, `lname` FROM `user` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1 ";
    $login_result = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_result) == 1){
            $_SESSION['status'] = "Welcome!";
            $_SESSION['status_code'] = "success";
            header("Location: index.php");
            exit();
    }else{
        $_SESSION['status'] = "Invalid Username/Password";
        $_SESSION['status_code'] = "error";
        header("Location: login.php");
        exit();
    }
}



if(isset($_POST["insertButton"])){

    $student_id = $_POST['student_id'];
    $fname = $_POST['fname'];
    $mname = isset($_POST['mname']) ? $_POST['mname'] : '' ;
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $email_address = $_POST['email_address'];
    

    $check_email_query = "SELECT * FROM `student_information` WHERE `email_address` = '$email_address'";
    $email_result = mysqli_query($con,$check_email_query);
    $email_count = mysqli_fetch_array($email_result)[0];

    if($email_count > 0){
        $_SESSION['status'] = "Email address already taken";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }

    if ($password !== $repassword){
        $_SESSION['status'] = "Password does not match";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }


    $query = "INSERT INTO `student_information`(`student_id`, `fname`, `mname`, `lname`, `address`, `birthday`, `email_address`) VALUES ('$student_id','$fname','$mname','$lname','$address','$birthday','$email_address')";

    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Registration Sucess!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }


}







if(isset($_POST["updateButton"])){

    $student_id = $_POST['student_id'];
    $fname = $_POST['fname'];
    $mname = isset($_POST['mname']) ? $_POST['mname'] : '' ;
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $email_address = $_POST['email_address'];
    

    $check_email_query = "SELECT * FROM `student_information` WHERE `email_address` = '$email_address'";
    $email_result = mysqli_query($con,$check_email_query);
    $email_count = mysqli_fetch_array($email_result)[0];

    if($email_count > 0){
        $_SESSION['status'] = "Email address already taken";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }

    if ($password !== $repassword){
        $_SESSION['status'] = "Password does not match";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }


    $query = "INSERT INTO `student_information`(`student_id`, `fname`, `mname`, `lname`, `address`, `birthday`, `email_address`) VALUES ('$student_id','$fname','$mname','$lname','$address','$birthday','$email_address')";

    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Registration Sucess!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }


}

