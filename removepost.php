<?php
if(!isset($_GET['index'])) header("location: /");
$recoveredData = file_get_contents('static/php/data.txt');
if($recoveredData){ $recoveredArray = unserialize($recoveredData);}
unset($recoveredArray['posts'][$_GET['index']]);
$recoveredArray['posts'] = array_values($recoveredArray['posts']);
$serializedData = serialize($recoveredArray);
file_put_contents('static/php/data.txt', $serializedData);
header('Location: /Readthat');
?>

<a href="/Readthat">Go back</a>
