<?php
if(!isset($_GET['index'])) header("location: /");
$recoveredData = file_get_contents('static/php/data.txt');
if($recoveredData){ $recoveredArray = unserialize($recoveredData);}else{ $recoveredArray = [];}
unset($recoveredArray[$_GET['index']]);
$recoveredArray = array_values($recoveredArray);
$serializedData = serialize($recoveredArray);
file_put_contents('static/php/data.txt', $serializedData);
header('Location: /Readthat');
?>

<a href="/Readthat">Go back</a>
