    <link rel="stylesheet" href="<?php echo STYLESHEETS?>login/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STYLESHEETS?>login/bootstrap.css">
    <link rel="stylesheet" href="<?php echo STYLESHEETS?>login/style.css">

<div class="container-fluid">
<div class="row">
<div class="col-lg-4 col">&nbsp;</div>
<div class="col-sm-4 col">
    <form class="form-horizontal login_board" role="form" method="post" action="">
        <input type="hidden" name="Request" value="0">
        <input type="hidden" name="EmployeeLogin" value="1">
    <div class="width">
        <div style="overflow-x:hidden; width:100px;  position:absolute;top:8%;left:30%; " id="UserIcon"><img src="<?php echo IMAGES; ?>user.png" class="img-circle" width="100px" height="100px"></div>
        <div id="ErrUName"></div>  
        <div class="input-group">
            <div class="input-group-addon"><span class="fa fa-user"></span></div>    
            <input type="text" class="form-control" Name="UserName" placeholder="Username" id="UserName">
        </div>
        
        <br>
        
        <div class="input-group">
            <div class="input-group-addon"><span class="fa fa-key"></span></div>    
            <input type="password" class="form-control" Name="PassWord" placeholder="Password" id="PassWord"><br>
        </div>
         <input type="submit" id="login" class="btn btn-default btn-lg btn-block" value="Login">
    </div>  
    </form>
</div>
<div class="col-lg-4 col">&nbsp;</div>
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



    document.getElementById("UserName").addEventListener("focusout",function(e){
        $UserName=document.getElementById("UserName");
        if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $inputArray = this.responseText;
                if ($inputArray==-1){
                    document.querySelector('#ErrUName').innerHTML="Username does not exists";
                    document.querySelector('#UserIcon').innerHTML ="<img src=\"<?php echo IMAGES; ?>user.png\" class=\"img-circle\" width=\"100px\" height=\"100px\">";
                    return false;
                }
                if ($inputArray==-2){
                    document.querySelector('#ErrUName').innerHTML="Username does not exists";
                    document.querySelector('#UserIcon').innerHTML ="<img src=\"<?php echo IMAGES; ?>user.png\" class=\"img-circle\" width=\"100px\" height=\"100px\">";
                    return false;
                }
                document.querySelector('#ErrUName').innerHTML="";
                var src = "data:image/jpeg;base64,";
                src += $inputArray;
                var newImage = document.createElement('img');
                newImage.id="Userimg";
                newImage.class="img-circle";
                newImage.src = src;
                newImage.width = newImage.height = "100";
                document.querySelector('#UserIcon').innerHTML = newImage.outerHTML;
             }
        };
        xmlhttp.open("GET", "?Request=1&Ajax=1&UserName="+$UserName.value, true);
        xmlhttp.send();
    });
</script>
                <!--<img src="<?php echo IMAGES;?>user.png" id="UserIcon">
                <div id="UserIcon"></div>
                <form method="post" action="">
                    <div style="margin:0px;"></div>
                    <input type="hidden" name="Request" value="0">
                    <input type="hidden" name="EmployeeLogin" value="1">
                    <table>
                        <tr>
                            <td><input type="text" name="UserName" placeholder="Username" id="UserName" autocomplete="off"></td>
                            <td><div id="ErrUName"></div></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="PassWord" placeholder="*******" autocomplete="off"></td>
                            <td><div id="ErrPWord"></div></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Login"/></td>
                        </tr>
                    </table>
                </form>-->

