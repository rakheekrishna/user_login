<?php
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypepassword = $_POST['retypepassword'];

    include_once "../class/common/db.php";
    include_once "../class/signup/signup_model.php";
    include_once "../class/signup/signup_controller.php";
    

    $signupObj = new SignupController($email,$password,$retypepassword,$fname,$lname);
    $signupObj->signupuser();
}