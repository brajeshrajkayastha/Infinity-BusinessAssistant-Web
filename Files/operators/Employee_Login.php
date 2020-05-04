<?php

class Login_Proc{
    private $UserName;
    private $PassWord;

    private $error;
    function __construct(){
        session_start();
    }
	function Login(){
		if(empty($_POST['EmployeeLogin'])){
			return false;
		}

        	if(empty($_POST['UserName']))
        	{
            		$this->Errorhandle ("UserName Field is empty");
            		return false;
        	}

        	if(empty($_POST['PassWord']))
        	{
            		$this->Errorhandle ("Password Field is empty");
            		return false;
        	}

        	$username = strtoupper(trim($_POST['UserName']));
        	$password = $this->convertmd5($_POST['PassWord']);

		if(!$this->UserCheck($username, $password)){
            $this->Errorhandle ("Error logging in. The username or Password does not match");
            header("Location: ./?Error=Error%20logging%20in.%20The%20username%20or%20Password%20does%20not%20match");
			return false;
		}
        	header("Location: ./");
            return true;

		}


    function LogOut(){
        $GLOBALS['database']->UPDATE_STMT("employeeprivilege", "OnlineStatus = 0", "ID = ".$_SESSION['UserId']);
        unset($_SESSION['UserId']);
		unset($_SESSION['Username']);
		header("Location: ./");
    }

	function LoginCheck(){

         	if(empty($_SESSION['UserId']))
         	{
            		return false;
         	}
         	return true;

    	}


	function NewUser(){

	}


	function UserCheck($User_Name, $Pass_Word){
	    $where = 'WHERE UserName="'.$User_Name.'" and Password="'.$Pass_Word.'"';
        $data = $GLOBALS['database']->SELECT_STMT("employeeprivilege", $where);
        $count = 0;
        foreach ($data as $row){
            $count+=1;
            $UserId=$row['ID'];
            $Username=$row['USERNAME'];
        }

        if($count!=1)
        {
            return false;
        }

        //session_start();

        $_SESSION['UserId']=$UserId;
        $_SESSION['Username']=$Username;

        $GLOBALS['database']->UPDATE_STMT("employeeprivilege", "OnlineStatus = 1", "ID = ".$UserId);
        return true;
    }


	function randomtext(){
		return base64_encode($this->randomnumber()).$this->randomnumber();
	}

	function randomnumber(){
		return rand(1111111,9999999);
	}

//go to main Path
    function GotoPath($path)
    {
        header("Location: $path");
        exit;
    }


//Convert text to MD5
	function convertmd5($textt){
		$md = md5($textt);
		return $md;
	}

//Errors Start---------------------------------------
	function error_message(){
        	if(empty($this->error)){
            		return '';
        	} else {
        		$error = nl2br(htmlentities($this->error));
        		return $error;
		}
    	}


    	function ErrorHandle($error){
        	$this->error .= $error."\r\n";
    	}
//Errors End----------------------------
}
?>
