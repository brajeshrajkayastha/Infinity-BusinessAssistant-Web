<!DOCTYPE html>
<HTML>
<HEAD>
	<TITLE><?php echo $pageTitle?></TITLE>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if($employeeLogin->LoginCheck()){?>

    <link rel="stylesheet" href="<?php echo FILES?>Bootstrap/css/bootstrap.min.css">
    <script src="<?php echo FILES?>Bootstrap/jquery.min.js"></script>
    <script src="<?php echo FILES?>Bootstrap/js/bootstrap.min.js"></script>

    <?php } ?>
    <link rel="stylesheet" href="<?php echo STYLESHEETS?>Font.css">

</HEAD>

<BODY>
    <?php if($employeeLogin->LoginCheck()){?>

    <?php 
        require_once PAGES."header.php";
        require_once PAGES."assistant.php";
    } ?>
    <?php
        require_once PAGES.$content;
    ?>



</BODY>

</HTML>
