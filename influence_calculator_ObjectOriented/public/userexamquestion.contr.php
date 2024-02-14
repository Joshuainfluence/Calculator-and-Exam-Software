<?php

class UserExamQuestionContr extends UserExamQuestion{
    private $x;

    public function __construct($x)
    {
        $this->x = $x;
    }

    public function displayexamquestion(){
        if ($this->x == 0) {
            exit();
        }

        return $this->examquestiondisplay($this->x);
    }

    public function displayexamanswer(){
        if ($this->x == 0) {
            exit();
        }

        return $this->examanswerdisplay($this->x);
    }
}

class UserAddExamAnswerContr extends UserExamQuestion{
    private $questionid;
    private $question;
    private $optionA;
    private $optionB;
    private $optionC;
    private $optionD;
    private $ans;
    private $userid;
    private $userAns;
    private $isCorrect;
    

    public function __construct($questionid, $question, $optionA, $optionB, $optionC, $optionD, $ans, $userid, $userAns, $isCorrect)
    {
        $this->questionid = $questionid;
        $this->question = $question;
        $this->optionA = $optionA;
        $this->optionB = $optionB;
        $this->optionC = $optionC;
        $this->optionD = $optionD;
        $this->ans = $ans;
        $this->userid = $userid;
        $this->userAns = $userAns;
        $this->isCorrect = $isCorrect;
        
    }

    

    public function useranswerAdd(){
        

        return $this->addUserAnswer($this->questionid, $this->question, $this->optionA, $this->optionB, $this->optionC, $this->optionD, $this->ans,  $this->userid, $this->userAns, $this->isCorrect);
        
        
    }

}