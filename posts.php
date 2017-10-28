<?php
declare(strict_types=1);

// Try to read and decode data or create empty array.
$recoveredData = file_get_contents('static/js/data.json');
if($recoveredData){ $recoveredArray = json_decode($recoveredData, true);}
else{ $recoveredArray = ['author' => [], 'posts' => []];}

//
if(isset($_POST['add_author']))
{
  $authorKey = str_replace([" ", " ", "."], "", strtolower($_POST['author']));
  if(!isset($recoveredArray['author'][$authorKey]));
  {
    $recoveredArray['author'][$authorKey] = ucwords($_POST['author']);
  }
}

if(isset($_POST['new_post']))
{
  $data = [];
  foreach ($_POST as $key => $value)
  {
    if(strlen($value) > 0) $data[$key] = $value;
  }
  if(in_array($data['author'], $recoveredArray['author']))
  {
    $data['author'] = array_search($data['author'], $recoveredArray['author'], true);
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
file_put_contents('static/js/data.json', $serializedData);
header('Location: /Readthat');
?>

<a href="/Readthat">Go back</a>
