<?php
Class LoginController extends LoginModel{
    private $email;
    private $password;
    
    public function __construct($email,$password){
        $this->email = $email;
        $this->password = $password;
    }
    public function login(){
        if($this->emtyCheck() == false){
            header("Location:../index.php?sec=login&message=emptyInput");
            exit();
        }
        $logindetails = $this->loginUser($this->email,$this->password);
        if($logindetails !== FALSE){
            session_start();
            $_SESSION["fname"] = $logindetails[0];
            $_SESSION["lname"] = $logindetails[1];
            $_SESSION["user"] = $logindetails[0] ." ". $logindetails[1];
            header("Location:../index.php");
        }
        else{
            header("Location:../index.php?sec=login&message=nologin");
            exit();
        }
    }
    private function emtyCheck(){
        $result = true;
        if(empty($this->email)){
            $result = false;
        }
        if(empty($this->password)){
            $result = false;
        }
        return $result;
    }
}