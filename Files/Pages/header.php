	<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		 <div class="navbar-header">
			 <button type="button" class="navbar-toggle" data-toggle="collapse"
				 data-target="#example-navbar-collapse">
				 <span class="sr-only">Toggle navigation</span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>

			 </button>
			 <a class="navbar-brand" id="Infinity" href="#">INFINITY</a>
		</div>
		<div class="collapse navbar-collapse" id="example-navbar-collapse">
			 <ul class="nav navbar-nav" id="header_ui">
				 <li class="active"><a href="?Pagename=HOME&PageTitle=Home">Home</a></li>
				 <li><a href="?Pagename=NOTIFICATION&PageTitle=Notification">Notification</a></li>
				 <li class="dropdown">
					 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					 Events <b class="caret"></b>
					 </a>
					 <ul class="dropdown-menu">
						 <li><a type="button" id="modal"data-toggle="modal" data-target="#modalevent">Make Event</a></li>
						 <li><a href="?Pagename=VIEWEVENTS&PageTitle=Events">View Events</a></li>
						 
			 		</ul>
			 		<li class="dropdown">
					 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					 Message <b class="caret"></b>
					 </a>
					 <ul class="dropdown-menu">
						 <li class="dropdown-header" id="underline">  Email</li>
						 	<li><a type="button" id="modal"data-toggle="modal" data-target="#modalemail">Make Emails</a></li>
						 	<li><a href="#">View Emails</a></li>
						 <li class="dropdown-header" id="underline">Memo</li>
						 	<li><a type="button" id="modal"data-toggle="modal" data-target="#modalmemo">Make Memo</a></li>
						 	<li><a href="#">View Memos</a></li>
						 </a></li>
			 		</ul>
				  <li><a href="?Pagename=PERSONALCHAT&PageTitle=Chat">Conference Chat</a></li>
			 	
			 </ul>
			 <div>
				 <p class="navbar-text navbar-right">Signed in as
				 <a href="#" class="navbar-link"><?php echo $_SESSION['Username'];?></a>
				 </p>
 			</div>

		 </div>
	</nav>

	<div class="row">
		<div class="col-sm-3">
			
		</div>
	</div>

	<div class="btn" role="group" >
			  <button type="button" class="btn btn-default">=</button>
	</div>


	<div class="modal fade" id="modalemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Compose Email</h4>
		      </div>
		      <div class="modal-body">
		                <div class="input-group">
							  <span class="input-group-addon" id="basic-addon1">@</span>
							  <input type="text" class="form-control" placeholder="To" id="emailTo">
						</div>
					    <div class="form-group">
					          <input type="text" class="form-control" placeholder="Subject" id="emailSubject">
					    </div>   
					    <div class="form-group">
					          <textarea name="editor" class="form-control" placeholder="Message" id="emailMessage"></textarea>
					    </div>
      		    </div>
      		</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal" id="Emailclose">Close</button>
		        <button type="button" class="btn btn-default" id="emailSender"> <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Send</button>
		      </div>
		    </div>
	  </div>


	<div class="modal fade" id="modalmemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	  		<form method="POST" enctype="multipart/form-data">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Compose Memo</h4>
		      </div>
		      <div class="modal-body">
		      			<input type="hidden" name="Request" value="9">
		      			<input type="hidden" name="Ajax" value="0">
					    <div class="form-group">
					          <input type="text" class="form-control" placeholder="Subject" id="MemoSubject" name="MemoSubject">
					    </div>   
					    <div class="form-group">
					          <textarea name="MemoMessage" class="form-control" placeholder="Message"></textarea>
					    </div>
					    <div class="form-group">
					          <input type="file" name="Memofile" class="form-control">
					    </div>
      		    </div>
      		</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal" id="memoClose">Close</button>
		        <button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-send" aria-hidden="true" id="MemoSend"></span> Send</button>
		      </div>
		    </div>
			</form>
	  </div>

	<div class="modal fade" id="modalevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	  	<form method="get" action="">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">New Event</h4>
		      </div>
		      <div class="modal-body">
		      			<input type="hidden" name="Request" value="6">
		      			<input type="hidden" name="Ajax" value="1">
		                <div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"></span>
							  <input type="text" class="form-control" placeholder="Event" name="EventName" id="EventName">
						</div>
					    <div class="form-group">
					          <input type="text" class="form-control" placeholder="Place" name="Place" id="Place">
					    </div>   
					    <div class="form-group">
					          <textarea name="editor" class="form-control" placeholder="info" name="body" id="body"></textarea>
					    </div>
					    <div class="form-group">
					          <input type="Date" name="Date" class="form-control" name="date" id="date">
					    </div>
						<div class="form-group">
					          <input type="Time" name="Time" class="form-control" name="time" id="time">
					    </div>
				</div>
      		</div>
		      <div class="modal-footer">
		        <button type="button" id="Eveclose" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-default" id="submit"> <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Send</button>
		      </div>
		    </div>
	  	</form>
	  </div>
</div>


<script>

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


	document.getElementById("submit").addEventListener("click",function (e){
		e.preventDefault();
		var EventName = document.getElementById("EventName").value;
		var Place = document.getElementById("Place").value;
		var Body = document.getElementById("body").value;
		var date = document.getElementById("date").value;
		var Time = document.getElementById("time").value;
		if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {	
                if(this.responseText==1)  
					document.getElementById("Eveclose").click();
            }
        };
        var x=date+' '+Time;
		xmlhttp.open("GET", "?Request=6&Ajax=1&EventName="+EventName+"&Place="+Place+"&Body="+Body+"&datetime="+x, true);
        xmlhttp.send();
	});

	document.getElementById("emailSender").addEventListener("click",function (e){
		e.preventDefault();
		var emailTo = document.getElementById("emailTo").value;
		var emailSubject = document.getElementById("emailSubject").value;
		var emailMessage = document.getElementById("emailMessage").value;
		if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {	
                if(this.responseText==1)  
					document.getElementById("Emailclose").click();
            }
        };
		xmlhttp.open("GET", "?Request=7&Ajax=1&EmailTo="+emailTo+"&EmailSub="+emailSubject+"&EmailBody="+emailMessage, true);
        xmlhttp.send();
	});

	/*document.getElementById("MemoSend").addEventListener("click",function (e){
		alert("a");
		e.preventDefault();
		var MemoSubject = document.getElementById("MemoSubject").value;
		var MemoMessage = document.getElementById("MemoMessage").value;
		var MemoFile = document.getElementById("MemoFile");

		if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {	
        		console.log(this.responseText);
                if(this.responseText==1)  
					document.getElementById("memoClose").click();
            }
        };
		xmlhttp.open("POST", "", true);
		xmlhttp.setRequestHeader("Content-type", "multipart/form-data");
		xmlhttp.send("Request=7&Ajax=1&MemoSubject="+MemoSubject+"&MemoMessage="+MemoMessage+"&MemoFile="+MemoFile);
	});*/
</script>