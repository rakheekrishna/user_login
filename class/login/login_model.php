<?php
Class LoginModel extends Db{

    protected function loginUser($email,$password){
        // prepare sql and bind parameters
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_user WHERE email = ?");
        if(!$stmt->execute(array($email))){
            $stmt = "";
            header("Location:../index.php?sec=login&error=error");
            exit();
        }
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (password_verify($password, $result[0]['password'])){
                return array($result[0]['fname'],$result[0]['lname']);
            }
            else
                return false;
        }
        else{
            return false;
        }
    }
}