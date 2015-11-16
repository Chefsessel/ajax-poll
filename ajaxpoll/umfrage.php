<?php
// Cookie setzen, wenn noch nicht teilgenommen
if(isset($_COOKIE['status'])){
header('Location:poll_result.php');
exit;
}
else {
setcookie('status','anonym',time() + (86400 * 30)); // 86400 = 1 tag * 30 = Cookie ein Monat gültig
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-Equiv="Cache-Control" Content="no-cache" />
    <meta http-Equiv="Pragma" Content="no-cache" />
    <meta http-Equiv="Expires" Content="0" />
	<link href="style.css" rel="stylesheet">
		
<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<div id="poll">
<h3 class="umfrage">Umfrage</h3>
<p class="text">Haben Sie schon mal per Handy Geld überwiesen?</p>
<form>
<input type="radio" id="option1" name="vote" value="0" onclick="getVote(this.value)"> 
<label for="option1"></label>Ja
<br><br>
<input type="radio" id="option2" name="vote" value="1" onclick="getVote(this.value)">
<label for="option2"></label>Nein
</form>
</div>

</body>
</html> 

