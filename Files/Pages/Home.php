<?php 
	//require_once PAGES."chatbot.php";
?>
<?php 

//conference Chat

?>
<!--<style>
	#current_recept{
		background-color: red;
	}
</style>
<div class="row" id="Bipin" data=1>
	<div class="col-sm-3">
	</div>
	<div class="col-sm-6">
		<div id="messanger">
			<form class="form-horizontal login_board" role="form" method="get" action="">
				<input type="hidden" name="Request" value="4">
				<input type="hidden" name="Ajax" value="0">
				<input type="hidden" name="UserId" value="" id="UserId"> 
				<div id="current_recept">
				</div>
				<div id="conversation"></div>
				<br>
				<textarea name="Message" id="Message"></textarea>
				<input type="button" id="Sender" value="Send">
			</form>
		</div>
	</div>
	<div class="col-sm-3">
		<ul>
		<?php 
			$users_Table=$GLOBALS['database']->SELECT_STMT("employeedetails", "", array('Id','FirstName','LastName'));
			foreach ($users_Table as $row){
				echo "<li><a href=\"#\" onclick=\"contact_choose(this);\" UserName= \"".$row['FIRSTNAME']."\" UserId=\"".$row['ID']."\">".$row['FIRSTNAME']."</a></li>";
			}
		?>
		</ul>
	</div>
</div>

<script type="text/javascript">
	xmlhttp ='';
    function XMLReq(){
        if (window.XMLHttpRequest || window.ActiveXObject) {
            if (window.ActiveXObject) {
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                } catch(exception) {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
            } else {
              xmlhttp = new XMLHttpRequest(); 
            }
            return xmlhttp;
        } else {
            alert("Your browser does not support XMLHTTP Request");
        }      
    }

	function contact_choose(CID){
		document.getElementById("UserId").value = CID.getAttribute("UserId");
		document.getElementById("current_recept").innerHTML = CID.getAttribute("UserName");
		document.getElementById("conversation").innerHTML="";
	}

	setInterval(function(){
		if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {	
                document.getElementById("conversation").innerHTML=this.responseText;
        };
        var to = document.getElementById("UserId").value;
		xmlhttp.open("GET", "?Request=5&Ajax=1&UserId="+to, true);
        xmlhttp.send();
	},1000);



    document.getElementById("Sender").addEventListener("click",function(e){
        $Sender=document.getElementById("Sender");
        if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $inputArray = this.responseText;	
                if ($inputArray==1)
                	console.log("Ok");
                else if ($inputArray==-1)
                	alert ("Error");
             }
        };
        var to = document.getElementById("UserId").value;
        var Message = document.getElementById("Message").value;
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
        xmlhttp.open("GET", "?Request=4&Ajax=1&UserId="+to+"&DateTime="+dateTime+"&Message="+Message, true);
        xmlhttp.send();
    });

</script>-->