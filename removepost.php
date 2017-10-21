<?php
if(!isset($_GET['index'])) header("location: /Readthat/");
$recoveredData = file_get_contents('static/php/data.txt');
if($recoveredData){ $recoveredArray = unserialize($recoveredData);}else{ $recoveredArray = [];}

?>

<a href="/Readthat/">Go back</a>
