<div id="footer">
	<span style="font-size:25px;cursor:pointer;float:left;" id="innersidenavopener">&#9776;</span>
	<div class="mainfooter">
		<div class="header">
			Footer
		</div>
	</div>
</div>

 <script>
        function innersidenavopen(){
             document.getElementById("innersidenav").style.visibility="visible";
             document.getElementById("innersidenav").className="col-2";
             document.getElementById("innersidenav").style.height="70%";
         }
         function innersidenavclose(){
             document.getElementById("innersidenav").style.height="0%";
             document.getElementById("innersidenav").style.visibility="hidden";
         }


     window.onload = onWindowLoad();
     function onWindowLoad(){
         document.getElementById("innersidenavopener").addEventListener("click", innersidenavopen);
         document.getElementById("innersidenavcloser").addEventListener("click", innersidenavclose);
     }

 </script>
