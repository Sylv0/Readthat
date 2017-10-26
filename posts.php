<?php
  declare(strict_types=1);
  // $recoveredData = file_get_contents('static/php/data.txt');
  // if($recoveredData){ $recoveredArray = unserialize($recoveredData);}else{ $recoveredArray = ['author' => [], 'posts' => []];}
  $recoveredData = file_get_contents('static/js/data.json');
  if($recoveredData){ $recoveredArray = json_decode($recoveredData, true);}else{ $recoveredArray = ['author' => [], 'posts' => []];}

if(isset($_POST['new_post']))
{
  if(isset($_POST) && sizeof($_POST) > 0)
  {
    $data = [];
    foreach ($_POST as $key => $value)
    {
      if(strlen($value) > 0) $data[$key] = $value;
    }
    $data['likes'] = 0;
    $data['date'] = date("d-m-y H:i");
    if(sizeof($data) === 6) array_push($recoveredArray['posts'], $data);
  }
}
if(isset($_POST['remove_post']))
{
  if(!isset($_POST['index'])) header("location: /");
  unset($recoveredArray['posts'[(sizeof($recoveredArray) - 1) - $_POST['index']]]);
}


// $serializedData = serialize($recoveredArray);
// var_dump($serializedData);
// file_put_contents('static/php/data.txt', $serializedData);

$serializedData = json_encode($recoveredArray);
var_dump($serializedData);
file_put_contents('static/js/data.json', $serializedData);
header('Location: /Readthat');
?>

<a href="/Readthat">Go back</a>
