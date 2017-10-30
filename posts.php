<?php
declare(strict_types=1);

// Path to with data
$pathToFile = __DIR__.'/static/js/data.json';

// Try to read and decode data or create empty array.
$recoveredData = file_get_contents($pathToFile);
if($recoveredData){ $recoveredArray = json_decode($recoveredData, true);}
else{ $recoveredArray = ['author' => [], 'posts' => []];}

//
if(isset($_POST['add_author']))
{
  $authorKey = str_replace([" ", " ", "."], "", strtolower($_POST['author']));
  if(!isset($recoveredArray['author'][$authorKey]));
  {
    $recoveredArray['author'][$authorKey] = ucwords(filter_var($_POST['author'], FILTER_SANITIZE_STRING));
  }
}

if(isset($_POST['new_post']))
{
  $data = [];
  foreach ($_POST as $key => $value)
  {
    $data[$key] = filter_var($value, FILTER_SANITIZE_STRING);
  }
  if(in_array($data['author'], $recoveredArray['author']))
  {
    $data['author'] = array_search($data['author'], $recoveredArray['author'], true);
  }
  else {
    header(__DIR__.'/?bad_user=true');
  }
  $data['likes'] = 0;
  $data['date'] = date("d-m-y H:i");
  if(sizeof($data) === 6) array_push($recoveredArray['posts'], $data);
}
if(isset($_POST['remove_post']))
{
  var_dump($_POST['index']);
  unset($recoveredArray['posts'][$_POST['index']]);
  $recoveredArray['posts'] = array_values($recoveredArray['posts']);
}

$serializedData = json_encode($recoveredArray);
file_put_contents($pathToFile, $serializedData);
header(__DIR__);
?>

<a href="/Readthat">Go back</a>
