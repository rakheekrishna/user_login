<?php
Class SignupModel extends Db{

    protected function checkUser($email){
        // prepare sql and bind parameters
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_user WHERE email = ?;");
        if(!$stmt->execute(array($email))){
            $stmt = "";
            header("Location:../index.php?sec=signup&error=error");
            exit();
        }
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
    protected function insertUser($fname,$lname,$email,$password){
        // prepare sql and bind parameters
        $stmt = $this->connect()->prepare("INSERT INTO tbl_user (fname,lname,email, password) VALUES (?,?,?,?);");
        $ecrPwd = password_hash($password,PASSWORD_DEFAULT);
        if(!$stmt->execute(array($fname,$lname,$email,$ecrPwd))){
            $stmt = "";
            header("Location:../index.php?sec=signup&error=error");
            exit();
        }
    }
}