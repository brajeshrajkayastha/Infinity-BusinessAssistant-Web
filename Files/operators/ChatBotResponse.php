<?php
    $answers = array();
    $where = "WHERE QUESTION = '".$the_request['question']."'";
    $questiondata = $GLOBALS['database']->SELECT_STMT("chatbotquestions",$where);
        foreach ($questiondata as $row){
            $ID=$row['ID'];
            $Question=$row['QUESTION'];
            $link=$row['LINK'];
        }
        if(isset($ID)){
            $where = "WHERE QuestionId = '".$ID."'";
            $answerdata = $GLOBALS['database']->SELECT_STMT("chatbotanswer",$where);
            
            foreach ($answerdata as $rows){
                array_push($answers, $rows['ANSWER']);
            }
            echo  $answers[rand(0, sizeof($answers)-1)];
        }            
?>
