<?php
$vote = $_REQUEST['vote'];

$filename = "ergebnis.txt";
$content = file($filename);

//content in den array
$array = explode("||", $content[0]);
$ja = $array[0];
$nein = $array[1];

if ($vote == 0) {
  $ja = $ja + 1;
}
if ($vote == 1) {
  $nein = $nein + 1;
}

//stimmen in txt file schreiben
$insertvote = $ja."||".$nein;
$teilnehmer = $ja + $nein;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-Equiv="Cache-Control" Content="no-cache" />
    <meta http-Equiv="Pragma" Content="no-cache" />
    <meta http-Equiv="Expires" Content="0" />
<link href="style.css" rel="stylesheet">
</head>

<div id="poll">
<h3 class="umfrage">Ergebnis:</h3>
<p  class="txt">Haben Sie schon mal per Handy Geld überwiesen?</p>
<table class="ergebnis">
<tr>
<td>Ja:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($ja/($nein+$ja),2)); ?>'
height='20'>
<?php echo(100*round($ja/($nein+$ja),2)); ?>%
</td>
</tr>
<tr>
<td>Nein:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($nein/($nein+$ja),2)); ?>'
height='20'>
<?php echo(100*round($nein/($nein+$ja),2)); ?>%
</td>
</tr>
</table> 
<p>Abgegebene Stimmen: <?php echo($teilnehmer)?></p>
</div>