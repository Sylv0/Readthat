<?php
if(!isset($_GET['index'])) header("location: /");
// $recoveredData = file_get_contents('static/php/data.txt');
// if($recoveredData){ $recoveredArray = unserialize($recoveredData);}

$recoveredData = file_get_contents('static/js/data.json');
if($recoveredData){ $recoveredArray = json_decode($recoveredData, true);}

unset($recoveredArray['posts'][$_GET['index']]);
$recoveredArray['posts'] = array_values($recoveredArray['posts']);
// $serializedData = serialize($recoveredArray);
// file_put_contents('static/php/data.txt', $serializedData);

$serializedData = json_encode($recoveredArray);
file_put_contents('static/js/data.json', $serializedData);

header('Location: /Readthat');
?>

<a href="/Readthat">Go back</a>
