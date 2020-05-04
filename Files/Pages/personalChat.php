<style type="text/css">
    .messages{
        margin-bottom: 15px;
        position: relative;   
        min-height: 20px;
        width:100%;
        display: inline-block; 
    }

    .chatSender{
        margin-right:15px; 
        text-align: right;
        word-wrap: break-word;
    }
    .chatReciever{
        margin-left: 15px;
        text-align: left;
        word-wrap: break-word;
    }

    .chatSender >.mess{
        max-width: 55%;
        clear: right;
        float: right;
        word-wrap: break-word;   
        background-color:rgba(0, 100, 240, 1);    
        padding: 5px;   
        border-radius: 10px;
    }
    .chatReciever >.mess{
        max-width: 55%;
        clear: left;
        float: left;
        word-wrap: break-word;   
        background-color:rgba(0, 100, 240, 0.2); 
        padding: 5px;   
        border-radius: 10px;
    }
    .RecieverMsg{
        word-wrap: break-word;
        color:black;
    }
    .SenderMsg{
        word-wrap: break-word;
        color:white;
    }
</style>
	<div><h1 class="titlebarpersonalchat"><b>CHAT</b></h1></div>

	<div class="row">
		<div class ="col-md-12">
			<div class="panel border-top-green">
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading" "><h4><b>MESSAGES</b></h4></div>
						<ul style="list-style-type: none;">
							<li style="padding: 10%;"><a href="#">ganesh</a></li>
							<li><a href="#">karki</a></li>
							<li><a href="#">&nbsp;</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading" id="current_recept"><h4><b>CONVERSATION</b></h4></div>
						<div style="padding-top: 50%;">
			<form class="form-horizontal login_board" role="form" method="get" action="">
				<input type="hidden" name="Request" value="4">
				<input type="hidden" name="Ajax" value="0">
				<input type="hidden" name="UserId" value="" id="UserId"> 
							<br><br><br>
						 	<div class="list-group" id="conversation" style="position:absolute;top:0%;margin-top:40px; overflow-y: scroll; width:95%; height: 75%;">
							</div>

								 <div class="input-group">
						 			<span class="input-group-addon">
						 				<input type="button" id="Sender" class="btn btn-default glyphicon" value="&#xe171;" style="">
						 			</span>
						 			<textarea name="Message" id="Message" class="form-control" placeholder="Type your message here"></textarea>
						 			<!--<input type="text" class="form-control" placeholder="Type your message here">-->
						 		</div>
			</form>
							</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-default ">
						<div class="panel-heading"><h4><b>CONTACTS</b></h4></div>
						<ul>
		<?php 
			$users_Table=$GLOBALS['database']->SELECT_STMT("employeedetails", "", array('Id','FirstName','LastName'));
			foreach ($users_Table as $row){
				$users_prevelege=$GLOBALS['database']->SELECT_STMT("employeeprivilege", "WHERE ID=".$row['ID'], array('OnlineStatus'));
				$stat = "";
				foreach ($users_prevelege as $row1) {
					$stat = $row1['ONLINESTATUS'];
				}
				echo "<li><a href=\"#\" onclick=\"contact_choose(this);\" UserName= \"".$row['FIRSTNAME']."\" UserId=\"".$row['ID']."\">".$row['FIRSTNAME']."&nbsp;".$stat."</a></li>";
			}
		?>
						</ul>
					</div>
				</div>
			</div>	
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
    var scrolled = false;
    function updateScroll(){
        if(!scrolled){
            var element = document.getElementById("conversation");
            //element.scrollTop = element.scrollHeight;
            var isScrolledToBottom = element.scrollHeight - element.clientHeight <= element.scrollTop + 1;
            if(isScrolledToBottom)
                element.scrollTop = element.scrollHeight - element.clientHeight;
        }
    }
    document.getElementById("conversation").addEventListener('scroll', function(){
        scrolled=true;
    });
	setInterval(function(){
		if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {	
                document.getElementById("conversation").innerHTML=this.responseText;
                //updateScroll(document.getElementById("conversation"));
                //updateScroll();
            }
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
                	document.getElementById("Message").value="";
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

</script>