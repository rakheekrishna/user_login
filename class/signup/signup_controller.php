<?php
Class SignupController extends SignupModel{
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $retypepassword;
    
    public function __construct($email,$password,$retypepassword,$fname,$lname){
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->password = $password;
        $this->retypepassword = $retypepassword;
    }
    public function signupuser(){
        if($this->emtyCheck() == false){
            header("Location:../index.php?sec=signup&message=emptyInput");
            exit();
        }
        if($this->validateEmail() == false){
            header("Location:../index.php?sec=signup&message=invalidEmail");
            exit();
        }
        if($this->passwordMatch() == false){
            header("Location:../index.php?sec=signup&message=pwdMismatch");
            exit();
        }
        if($this->emailTaken() == false){
            header("Location:../index.phpsec=signup&?message=emailTaken");
            exit();
        }
        if($this->emtyCheck() == true && $this->validateEmail() == true && $this->passwordMatch() == true && $this->emailTaken() == true){
            $this->insertUser($this->fname,$this->lname,$this->email,$this->password);
            header("Location:../index.php?sec=login&message=success");
            exit();
        }
        else{
            header("Location:../index.php?sec=signup&message=error");
            exit();
        }
    }
    private function emtyCheck(){
        $result = true;
        if(empty($this->fname)){
            $result = false;
        }
        if(empty($this->lname)){
            $result = false;
        }
        if(empty($this->email)){
            $result = false;
        }
        if(empty($this->password)){
            $result = false;
        }
        if(empty($this->retypepassword)){
            $result = false;
        }
        return $result;
    }

    private function validateEmail(){
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
          return false;
        }
        else
        return true;
    }

    private function passwordMatch(){
        if($this->password == $this->retypepassword){
            return true;
        }
        else
            return false;
    }

    private function emailTaken(){
        if($this->checkUser($this->email)){
            return false;
        }
        else
            return true;

    }

}