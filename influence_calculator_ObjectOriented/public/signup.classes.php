<?php 
require_once __DIR__."/../config/dbh.php";

class Signup extends Dbh{

    // to insert users into the database or signup users
    protected function RegisterUser($fullName, $username, $email, $password, $profileImage, $regNo){
        $sql = "INSERT INTO users(fullName, username, email, password, profileImage, regNo) VALUES(:fullName, :username, :email, :password, :profileImage, :regNo)";
        $statement = $this->connection()->prepare($sql);
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement->bindParam(':fullName', $fullName);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':profileImage', $profileImage);
        $statement->bindParam(':regNo', $regNo);

        if (!$statement->execute()) {
            $statement = null;
            header("Location: ../inc/signup.php?error=stmtfailed");
            exit();
        }

       $statement = null;
    }

    // to check if user already exists

    protected function UserCheck($username, $email){
        $sql = "SELECT username FROM users WHERE username = ? OR email = ?";
        $statement = $this->connection()->prepare($sql);
        $statement->execute([$username, $email]);
        $result = 0;

        if ($statement->rowCount() > 0) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
       

    }
}