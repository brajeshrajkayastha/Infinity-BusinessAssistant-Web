<?php 
/*
	Ajax = 1 if ajax to get data
	Request = 0 for Login Page
			= 1 for Login Page User's Image
			= 2 for if user exists
			= 3 for if chatbot options
			= 4 for saving single message
			= 5 for conversation message
			= 6 for new event
			= 7 for new email
			= 9 for new memo
*/
	//All Request Handler
	$Ajax = (isset($the_request['Ajax']) && $the_request['Ajax'] != '') ? True : False;
	//if and only loged in
	if($employeeLogin->LoginCheck()){
		switch ($the_request['Request']){
			case '4':
				if (!isset($the_request['UserId']) || $the_request['UserId'] == ''){
					echo "-1";
					exit();
				}
				$message = $the_request['Message'];
				$from = $_SESSION['UserId'];
				$to = $the_request['UserId'];
				$Date=$the_request['DateTime'];
				if ($GLOBALS['database']->INSERT_STMT('personalmessage', array(array(
					'Message'=>$message,
					'Sender'=>$from,
					'Recept'=>$to,
					'DateTime'=>$Date))
				)) echo "1";
				else 
					echo "-1";
				
			break;
			case '5':
				if (!isset($the_request['UserId']) || $the_request['UserId'] == ''){
					echo "-1";
					exit();
				}
				$UserIdSender = $_SESSION['UserId'];
				$UserIdRecept = $the_request['UserId'];
				$GLOBALS['database']->SetSql("SELECT * FROM personalmessage WHERE Sender=".$UserIdSender." and Recept=".$UserIdRecept." UNION SELECT * FROM personalmessage WHERE Sender=".$UserIdRecept." and Recept=".$UserIdSender." ORDER BY DateTime DESC");

				//$GLOBALS['database']->bindParam(':Sender', $UserIdSender);
				//$GLOBALS['database']->bindParam(':Recept', $UserIdRecept);

				$data = $GLOBALS['database']->Execute_Query();
            

        	echo "<div style=\"position: absolute;top: 0%; width:95%;height:90%;overflow-y: scroll; display: flex; flex-direction: column-reverse;\">";
				foreach ($data as $row){
					//echo $row["ID"]."&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<div class=\"messages\">";
					if ($row["SENDER"]==$UserIdSender){
						echo "<div class=\"chatSender\"><div class=\"mess\"><span class=\"SenderMsg\">";
						echo $row["MESSAGE"];
						echo "</span></div></div>";
					}
					else {
						echo "<div class=\"chatReciever\"><div class=\"mess\"><span class=\"RecieverMsg\">";
						echo $row["MESSAGE"];
						echo "</span></div></div>";
					}
					echo "</div>";
					//echo $row["SENDER"]."&nbsp;&nbsp;&nbsp;&nbsp;";
					//echo $row["RECEPT"]."&nbsp;&nbsp;&nbsp;&nbsp;";
					//echo $row["DATETIME"]."&nbsp;&nbsp;&nbsp;&nbsp;";
					//echo $row["STATUS"]."<BR>";
				}
			echo "</br>";
			break;

			case '6':
				$EventName = $the_request['EventName'];
				$Place = $the_request['Place'];
				$Body = $the_request['Body'];
				$datetime = $the_request['datetime'];
				if ($GLOBALS['database']->INSERT_STMT('events', array(array(
					'EventName'=>$EventName,
					'Place'=>$Place,
					'DateTime'=>$datetime,
					'info'=>$Body
				)))) echo "1";
					else
						echo "-1";

			case '7':
				$EmailTo = $the_request['EmailTo'];
				$EmailSub = $the_request['EmailSub'];
				$EmailBody = $the_request['EmailBody'];
				if (mail($EmailTo,$EmailSub,$EmailBody))
					echo "1";
				else 
					echo "-1";
			break;

			case '9':
				$MemoSub = $the_request['MemoSubject'];
				$MemoBody = $the_request['MemoMessage'];
				$MemoFile = $_FILES['Memofile'];
				$FileName = $MemoFile['name'];
				$tempName = $MemoFile['tmp_name'];
				$ok = 1;
				if 	(isset($FileName) || $FileName != ''){
					if (!move_uploaded_file($tempName, ATTACHMENTS.$FileName))
						$ok = 0;
				}
				if (!$GLOBALS['database']->INSERT_STMT('memo', array(array(
					'Sentby'=>$_SESSION['UserId'],
					'Subject'=>$MemoSub,
					'Body'=>$MemoBody,
					'Attachments'=>$FileName
				)))) $ok = 0;
				header("Location: ./");

			break;
		}

	}
	
	//no need to login
	switch ($the_request['Request']){
		case '1':
			//if ($Ajax)
				//header("Content-type: text/javascript");
		    $Output = "";
			if (isset($the_request['UserName']) && $the_request['UserName'] != ''){
				$User_Name = $the_request['UserName'];
				$where = 'WHERE USERNAME="'.$User_Name.'"';
		        $data = $GLOBALS['database']->SELECT_STMT("employeeprivilege", $where, array("Picture"));
		        $count = 0;
		        $picture = "";
		        foreach ($data as $row){
		        	$picture = $row['PICTURE'];
		        	$count = $count+1;
		        }
		        if ($count==1){
		        	$Output = $picture;
		        } else {
					$Output = -1;
				}
			} else {
				$Output = -2;
			}
			echo $Output;
		break;
	}

	if ($Ajax)
		exit();
?>