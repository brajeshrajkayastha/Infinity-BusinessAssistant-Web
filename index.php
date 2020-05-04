<?php
//ITMEET
//index.php

require_once dirname(__FILE__).'/configuration.php';

    switch($_SERVER['REQUEST_METHOD'])
    {
    case 'GET':
        $the_request = &$_GET;
        $methodOfFormData=0;
        break;
    case 'POST':
        $the_request = &$_POST;
        $methodOfFormData=1;
        break;
    }
    if (@isset($the_request['Request']) && $the_request['Request']>=1){
        require_once OPERATORS.'RequestHandler.php';
    }


if(!$employeeLogin->LoginCheck()){
    $employeeLogin->Login();
    $content = 'login.php';
    $pageTitle = SOFTWARE_SNAME.'->Login';
} else {
    $pageName = (isset($_GET['Pagename']) && $_GET['Pagename'] != '') ? strtoupper($_GET['Pagename']) : '';
    $pageTitle = (isset($_GET['PageTitle']) && $_GET['PageTitle'] != '') ? $_GET['PageTitle'] : SOFTWARE_FNAME;

    switch ($pageName) {
        Case 'HOME' :
            $content = 'home.php';
            break;

        Case 'LOGOUT' :
            $employeeLogin->LogOut();
            header("Location: ./");
            break;

        Case 'NOTIFICATION':
            $content = 'notification.php';
            break;

        Case 'VIEWEVENTS':
            $content = 'viewevents.php';
            break;
            
        Case 'PERSONALCHAT':
            $content = 'personalChat.php';
            break;
        /*Case '' :
            $content = 'xyz.php';
            if(!empty($_POST['visitormsg']))
                {
                require_once operations.'visitormsg.class.php';
                $newVisitorMessage = new VisitorMessage;
                    if ($newVisitorMessage->SaveMessage()){
                        $content = 'page1.php';
                    }
                }
            break;
    */
        
        default :
            $content = 'chatbot.php';
    }
}
require_once FILES.'point.php';
?>