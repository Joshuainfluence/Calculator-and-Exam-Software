<?php 
require_once __DIR__. "/../config/session.php";

class LoginContr extends Login{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    protected function emptyInput(){
        if (empty($this->username) || empty($this->password)) {
            return true;
        }else{
            return false;
        }
    }
    protected function AdminLogin(){
        if ($this->username == "Admin" && $this->password == "12345") {
            return true;
        } else {
            return false;
        }
        
    }

    private function set_message($type, $message){
        $_SESSION[$type] = $message;
    }
    public function LogUser(){
        if ($this->emptyInput() == true) {
            $this->set_message("error", "Fields cannot be empty");
            header("Location: ../pages/registration/login.php?error=emptyinput");
            exit();
        }
        if ($this->AdminLogin() == true) {
            header("Location: ../admin/admin.php?Admin registration successful");
            exit();
        }
       
       
        $this->loginUser($this->username, $this->password);
    }
} 