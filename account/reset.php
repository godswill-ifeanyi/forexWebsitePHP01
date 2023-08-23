<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html">
	<meta name="author" content="gencyolcu">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Password Reset Form</title>
    
 <meta charset="UTF-8">
 <link rel="icon" href="../logo.png">
 <link rel="stylesheet" href="../bootstrap%403.3.7/dist/css/bootstrap.min.css" type="text/css">
 <link rel="stylesheet" href="../bootstrap-select%401.12.4/dist/css/bootstrap-select.min.css" type="text/css">
 <link rel="stylesheet" href="../bootstrap-select-country%404.0.0/dist/css/bootstrap-select-country.min.css" type="text/css">

<script src="../jquery%403.4.1/dist/jquery.min.js"></script>
<script src="../bootstrap%403.3.7/dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-select%401.12.4/dist/js/bootstrap-select.min.js"></script>
<script src="../bootstrap-select-country%404.0.0/dist/js/bootstrap-select-country.min.js"></script>
<link href="../font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 
<script src="../js/jquery.min.js"></script><link href='../css-2?family=Roboto Condensed' rel='stylesheet'>

<link rel="stylesheet" href="style/style.css" type="text/css">  
  

<style>
*{margin:0%;padding:0%;}

body{font-family:'Roboto Condensed';}

#form{position:absolute;
            width:100%;
            background-size: cover;
            background-image: url(../imgsrc/back.jpg);
            background-attachment:fixed;
            padding:0em;
            height:100%;
            display:block;
            }
            
#form form{position:relative;
            width:35em;
            height:auto;
            padding:0em;
            top:0em;
            line-height:1em;
            background-color:rgba(25,25,65,0.9);}
            
            
#form form p{color:white;
            font-size:18pt;
                font-weight: bold;}
            
            
#form form .lab{color:white;
                font-size:13pt;
                line-height:1em;}
                
#form form input[type=text],input[type=email],input[type=password],select,input[type=number]{outline:none;
                            border-radius:5px;
                            display:block;
                            width:20em;
                            height:2.5em;
                            border:none;
                            text-indent: 0.5em;
                            font-size:11pt;}
                            
#form form input[type=submit]{outline:none;
                            border-radius:5px;
                            display:block;
                            width:20em;
                            height:2.5em;
                            background:black;
                            font-weight:bold;
                            color:white;
                            border:none;
                            font-size:11pt;}
                            
@media screen and (max-width:50em){
#form form{position:relative;
            width:100%;
            height:auto;
            padding:0em;
            line-height:1em;
            background-color:rgba(25,25,65,0.9);}
            
            
#form form p{color:white;
            font-size:18pt;
                font-weight: bold;}
            
            
#form form .lab{color:white;
                font-size:13pt;
                line-height:1em;}
                
#form form input[type=text],input[type=email],input[type=password],select,input[type=number]{outline:none;
                            border-radius:5px;
                            display:block;
                            width:90%;
                            height:2.5em;
                            border:none;
                            text-indent: 0.5em;
                            font-size:11pt;}
                            
#form form input[type=submit]{outline:none;
                            border-radius:5px;
                            display:block;
                            width:90%;
                            height:2.5em;
                            background:black;
                            font-weight:bold;
                            color:white;
                            border:none;
                            font-size:11pt;}

}




</style>

<script>
function checkR() {
jQuery.ajax({
url: "errorform/reset-error.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#status").html(data);
},
error:function (){}
});
}
</script>


<script>
function checkP() {
jQuery.ajax({
url: "errorform/reset-error.php",
data:'pin='+$("#pin").val(),
type: "POST",
success:function(data){
$("#status2").html(data);
},
error:function (){}
});
}
</script>


<script>
function checkPASS() {
jQuery.ajax({
url: "errorform/password-error.php",
data:'pass='+$("#pass").val(),
type: "POST",
success:function(data){
$("#status4").html(data);
},
error:function (){}
});
}
</script>

</head>

<body oncontextmenu="return false">
<center>
<div id="form">
<form method="post">
<p><a href="../index.php"><img src="../logo.png" width="150px"></a><br><br>(Reset Password <i class="fa fa-user"></i> )</p>
<label class="lab">Email Address</label><span id="status"></span><br>
<input type="email" class="formlist" name="username" required="required" placeholder="Email Address" onkeyup="checkR()" id="username"><br>
</form>
</div>

</center>



<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '2093ebdfc38700ddbe861726072eb73f7b0342f0';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
</body>
</html>