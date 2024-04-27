<?php 
require_once __DIR__. "/../config/dbh.php";
class UserExamQuestion extends Dbh{
    protected function examquestiondisplay($x){
        $sql = "SELECT * FROM exam WHERE id = ?";
        $stmt = $this->connection()->prepare($sql);

        if (!$stmt->execute([$x])) {
            $stmt = null;
            exit();
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function examanswerdisplay($x){
        $sql = "SELECT * FROM mark WHERE userId = ?";
        $stmt = $this->connection()->prepare($sql);

        if (!$stmt->execute([$x])) {
            $stmt = null;
            exit();
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function answerCorrectGet($x){
        $sql = "SELECT ans FROM mark WHERE questionId = ?";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$x])) {
            $stmt = null;
            exit();
        }

        $reuslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reuslt;
    }
    protected function addUserAnswer($questionid, $question, $optionA, $optionB, $optionC, $optionD, $ans, $userid, $userAns, $isCorrect){
        $sql = "INSERT INTO mark(questionId, question, optionA, optionB, optionC, optionD, ans, userId, userAns, isCorrect) VALUES (:questionId, :question, :optionA, :optionB, :optionC, :optionD, :ans, :userId, :userAns, :isCorrect)";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindParam(':questionId', $questionid);
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':optionA', $optionA);
        $stmt->bindParam(':optionB', $optionB);
        $stmt->bindParam(':optionC', $optionC);
        $stmt->bindParam(':optionD', $optionD);
        $stmt->bindParam(':ans', $ans);
        $stmt->bindParam(':userId', $userid);
        $stmt->bindParam(':userAns', $userAns);
        $stmt->bindParam(':isCorrect', $isCorrect);
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../admin/exam_question.php?stmtfailed");
            exit();
        }

        $stmt = null;
    }
}