<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    include_once "../class/common/db.php";
    include_once "../class/login/login_model.php";
    include_once "../class/login/login_controller.php";
    

    $signupObj = new LoginController($email,$password);
    $signupObj->login();
}