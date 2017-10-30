<?php
declare(strict_types=1);

// Path to with data.
$pathToFile = __DIR__.'/static/js/data.json';

// Try to read and decode data or create empty array.
$recoveredData = file_get_contents($pathToFile);
if($recoveredData){ $recoveredArray = json_decode($recoveredData, true);}
else{ $recoveredArray = ['author' => [], 'posts' => []];}

// If adding new author
if(isset($_POST['add_author']))
{
  // Remove certain characters for the key.
  $authorKey = str_replace([" ", " ", "."], "", strtolower($_POST['author']));

  // Check if key already exist, add it if not.
  if(!isset($recoveredArray['author'][$authorKey]));
  {
    $recoveredArray['author'][$authorKey] = ucwords(filter_var($_POST['author'], FILTER_SANITIZE_STRING));
  }
}

// Adding new post
if(isset($_POST['new_post']))
{
  // Put all data in array after filtering out bad stuff.
  $data = [];
  foreach ($_POST as $key => $value)
  {
    $data[$key] = filter_var($value, FILTER_SANITIZE_STRING);
  }

  // Check if author is in the array of saved ones, if so change the author to key.
  if(in_array($data['author'], $recoveredArray['author']))
  {
    $data['author'] = array_search($data['author'], $recoveredArray['author'], true);
  }

  // Fixing values that need special attention
  $data['likes'] = rand(0, 1000);
  $data['date'] = date("d-m-y H:i");

  // Only push data to array if number of indexes are correct.
  if(sizeof($data) === 6) array_push($recoveredArray['posts'], $data);
}

// If removing a post, unset correct index and readd all values to array.
if(isset($_POST['remove_post']))
{
  unset($recoveredArray['posts'][$_POST['index']]);
  $recoveredArray['posts'] = array_values($recoveredArray['posts']);
}

// Encode array to JSON and put in datafile before going back to index.
$serializedData = json_encode($recoveredArray);
file_put_contents($pathToFile, $serializedData);
header("Location:.");
