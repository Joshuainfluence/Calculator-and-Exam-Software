<?php 

class AdminExamQuestionContr extends AdminExamQuestion{
    private $question;
    private $optionA;
    private $optionB;
    private $optionC;
    private $optionD;
    private $ans;
    private $category;

    public function __construct($question, $optionA, $optionB, $optionC, $optionD, $ans, $category)
    {
        $this->question = $question;
        $this->optionA = $optionA;
        $this->optionB = $optionB;
        $this->optionC = $optionC;
        $this->optionD = $optionD;
        $this->ans = $ans;
        $this->category = $category;
        
    }

    private function emptyInput(){
        if (empty($this->question) || empty($this->optionA) || empty($this->optionB) || empty($this->optionC) || empty($this->optionD)) {
           return true;
        }else{
            return false;
        }
    }
    private function set_message($type, $message){
        $_SESSION[$type] = $message;
    }


    public function questionAdd(){
        if ($this->emptyInput() == true) {
            $this->set_message("error", "Fields cannot be empty");
            header("Location: ../admin/exam_question.php?emptyfields");
        }

        $this->addQuestion($this->question, $this->optionA, $this->optionB, $this->optionC, $this->optionD, $this->ans, $this->category);
        $this->set_message("success", "Question added successfully");
        header("Location: ../admin/exam_question.php?questionaddedsuccessfully");
    }

    
}

class AdminShowQuestionContr extends AdminExamQuestion{
    private $x;

    public function __construct($x)
    {
        $this->x = $x;
    }

    public function questionShow(){
        
        return $this->showQuestion($this->x);
    }
}