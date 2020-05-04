<?php
//chatbot
?>
<!--<br>
<div id="chatBotOutput"></div><br>
<div id="chatBotHistory"><h1 align="center">History</h1></div>-->

<style type="text/css">
    #chatBotContain{
        border: solid gray;
        height:100vh;
        overflow-y:hidden;
    }
    #chatBotOutput{
        display: block;
    }
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
    .ChoiceUl{

    }
    .ChoiceLi{

    }
</style><BR><BR>
<div class="row">
    <div class="col-sm-3">&nbsp;</div>
    <div class="col-sm-6" id="chatBotContain">
        <div id="chatBotOutput" style="position: absolute;top: 0%; width:95%;height:90%;overflow-y: scroll;">

        </div>
        <div class="input-group" style="position: absolute;bottom:0%; width:95%;">
            <!--<nav class="navbar navbar-inverse" role="navigation"> 
               <div> 
                  <ul class="nav navbar-nav"> 
                     <li><a href="#" data-id="1">Events</a></li> 
                     <li><a href="#" data-id="2">SVN</a></li> 
                     <li><a href="#" data-id="3">SVN</a></li> 
                     <li><a href="#" data-id="4">SVN</a></li> 
                     <li><a href="#" data-id="5">SVN</a></li> 
                     <li><a href="#" data-id="6">SVN</a></li> 
                     <li><a href="#" data-id="7">SVN</a></li> 
                     <li><a href="#" data-id="8">SVN</a></li> 
                     <li><a href="#" data-id="9">SVN</a></li> 
                     <li><a href="#" data-id="10">SVN</a></li> 
                     <li><a href="#" data-id="11">SVN</a></li> 
                  </ul> 
               </div> 
            </nav> -->
            <input type="text" name="chatBotInput" id="chatBotInput" class="form-control">
        </div>
    </div>
    <div class="col-sm-3">&nbsp;</div>
</div>
<script>

    function chatplacer(msg, sender=false){
        var divmessage = document.createElement("div");
        var div1 = document.createElement("div");
        var div2 = document.createElement("div");
        var span1 = document.createElement("span");

        //var rand = parseInt(Math.random()*1000);
        //div.id=rand;
        divmessage.classList="messages";
        if (sender==true){
            div1.classList="chatSender";
            div2.classList="mess";
            span1.classList="SenderMsg";
            span1.innerHTML = msg;
            div2.appendChild(span1);
            div1.appendChild(div2);
        } else {
            div1.classList="chatReciever";
            div2.classList="mess";
            span1.classList="RecieverMsg";
            span1.innerHTML = msg;
            div2.appendChild(span1);
            div1.appendChild(div2);
        }
        divmessage.appendChild(div1);
        document.getElementById("chatBotOutput").appendChild(divmessage);
    }
    function ListPlacer(array){
        var ul = document.createElement("ul");
        ul.classList = "ChoiceUl";
            var string="";
            for (var count = 0; count<array.length; count++){
                string+="<li class=\"ChoiceLi\"><button class=\"btn btn-danger\" onclick=\"ChatbotAnswer();\" data-id=\""+array[count][0]+"\">"+ array[count][1]+"</btn></li>";
            }
        ul.innerHTML = string;
        speak(string);
        document.getElementById("chatBotOutput").appendChild(ul);
    }

    function speak(string){
        var sound = new SpeechSynthesisUtterance();
        sound.voice = speechSynthesis.getVoices().filter(function(voice){return voice.name == "Agnes";})[0];
        sound.text = string;
        sound.lang = "en-US";
        sound.volume = 1; //1-0
        sound.rate = 1;
        sound.pitch = 1; //2-0
        speechSynthesis.speak(sound);
    }
    
    (function(){
        var chatBotInput=document.getElementById("chatBotInput");
        chatBotInput.addEventListener("keypress",function(e){
            var whichkey = e.which || e.keyCode;
            if (whichkey==13){
                chatplacer(chatBotInput.value,true);
                getChatbotAnswer(chatBotInput.value);
            }
        });

        function getChatbotAnswer(question) {
            var xhttp;
            if (question.length == 0) {
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    chatplacer(this.responseText);
                    //speak(this.responseText);
                }
            };
            xhttp.open("GET", "chatb.php?question="+question, true);
            xhttp.send();   
        }

        function init(){
            chatplacer("Hey here are the list of Categories I can Handle<BR>Note:You are requested to type command in numeric");
            //speak();

            ListPlacer(Array(Array(1,"Make New Events"),Array(2,"View Events"),Array(3,"sdf")));

        }
        init();
    })();

      


    /**/
</script>