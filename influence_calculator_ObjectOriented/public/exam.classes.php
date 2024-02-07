<?php 
require_once __DIR__ . "/../config/session.php";
class Exam extends Dbh{
    private function set_message($type, $message){
        $_SESSION[$type] = $message;
    }
    protected function examLogin($regNo, $password)
    {
        $sql = "SELECT * FROM users WHERE regNo = ?";
        $statement =  $this->connection()->prepare($sql);
        if (!$statement->execute([$regNo])) {
            $statement = null;
            header("Location: ../pages/exam/examlogin.php");
            exit();
        }

        if ($statement->rowCount() == 0) {
            $statement = null;
            $this->set_message("error", "User not Found");
            header("Location: ../pages/exam/examlogin.php");
            exit();
        }

        $passwordHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]['password']);

        if ($checkPassword == false) {
            $statement = null;
            $this->set_message("error", "Incorrect Password");
            header("Location: ../pages/exam/examlogin.php?error=wrongpassword");
            exit();
        } elseif ($checkPassword == true) {
            $sql = "SELECT * FROM users WHERE regNo = ? AND password = ?";
            $statement = $this->connection()->prepare($sql);
            if (!$statement->execute([$regNo, $password])) {
                $statement = null;
                header("Location: ../pages/exam/examlogin.php?iweak");
                exit();
            }
            
        }

        $statement = null;
    }
    protected function userval($userid){
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$userid])) {
            $stmt = null;
            exit();
        }
        return $stmt;
    }
}