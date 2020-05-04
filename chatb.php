<?php
    require_once "configuration.php";
?>
<?php
//session_start();
if (!isset($_SESSION['CountForSave'])){
    $_SESSION['CountForSave'] = 0;
}

    function SaveData($data){
        $Name = "Data".$_SESSION['CountForSave'];
        $_SESSION["a"]=$data;
        $_SESSION['CountForSave'] += 1;
    }

    
$FirstTagSet = array(0=>"SEND MAIL",1=>"VIEW MESSAGE",3=>"COMPANY NAME");
$FirstTagAnswer = array(
    array("To whom", 1,3,1,0),
    array("of whom", 0,0,0,0),
    array("subject", 0,0,1,1),
    array("Infinity", 0,0,0,0)
);
$question  = "what is Company Name";



if (!isset($_SESSION['PointTo'])){
    $question = strtoupper($question);
    foreach ($FirstTagSet as $anskey=>$value) {
        if (strpos($question, $value) !== false) {
            echo $FirstTagAnswer[$anskey][0];
            if (isset($_SESSION['PointTo'])) unset($_SESSION['PointTo']);
                
            break;
        }
    }    
}

//unset($_SESSION['UserId']);
//$words = explode(" ", $question);
//echo $words[0];
//echo $words[1];
//$value = str_replace("#", "",$value);
?>