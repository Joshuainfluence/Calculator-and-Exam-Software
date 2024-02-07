<?php
require_once __DIR__ . "/../config/dbh.php";
require_once __DIR__ . "/../config/session.php";
class Login extends Dbh
{
    private function set_message($type, $message){
        $_SESSION[$type] = $message;
    }
    protected function loginUser($username, $password)
    {
        $sql = "SELECT password FROM users WHERE username = ? OR email = ?";
        $statement =  $this->connection()->prepare($sql);
        if (!$statement->execute([$username, $password])) {
            $statement = null;
            header("Location: ../pages/registration/login.php");
            exit();
        }

        if ($statement->rowCount() == 0) {
            $statement = null;
            $this->set_message("error", "User not Found");
            header("Location: ../pages/registration/login.php");
            exit();
        }

        $passwordHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]['password']);

        if ($checkPassword == false) {
            $statement = null;
            $this->set_message("error", "Incorrect Password");
            header("Location: ../pages/registration/login.php?error=wrongpassword");
            exit();
        } elseif ($checkPassword == true) {
            $sql = "SELECT * FROM users WHERE username = ? OR email = ? AND password = ?";
            $statement = $this->connection()->prepare($sql);
            if (!$statement->execute([$username, $username, $password])) {
                $statement = null;
                header("Location: ../pages/registration/login.php");
                exit();
            }
            if ($statement->rowCount() == 0) {
                $statement = null;
                header("Location: ../pages/registration/login.php");
                exit();
            }

            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            // session_start();
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];

            // this is to update the user's status in the database, when successfully logged in
            $updateSql = "UPDATE users SET last_activity = NOW() WHERE id = ?";
            $updateStmt = $this->connection()->prepare($updateSql);
            $updateStmt->execute([$_SESSION['id']]);  // Replace $userId with the actual user's ID
        }

        $statement = null;
    }
}
