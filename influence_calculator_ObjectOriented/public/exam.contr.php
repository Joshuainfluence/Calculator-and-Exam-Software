<?php 

class ExamContr extends Exam{
    // private $id;
    private $regNo;
    private $password;

    public function __construct($regNo, $password)
    {
        // $this->id = $id;
        $this->regNo = $regNo;
        $this->password = $password;
    }
    protected function emptyInput(){
        if (empty($this->regNo) || empty($this->password)) {
            return true;
        }else{
            return false;
        }
    }

    private function set_message($type, $message){
        $_SESSION[$type] = $message;
    }
    public function loginExam(){
        if ($this->emptyInput() == true) {
            $this->set_message("error", "Fields cannot be empty");
            header("Location: ../pages/exam/examlogin.php?error=emptyinput");
            exit();
        }

        $this->examLogin($this->regNo, $this->password);
    }
}