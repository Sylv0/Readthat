<?php

declare(strict_types=1);

$recoveredData = file_get_contents('static/php/data.txt');
if($recoveredData)
{
  $recoveredArray = unserialize($recoveredData);
}else
{
  $recoveredArray = [];
}
if(isset($_POST) && sizeof($_POST) > 0)
{
  $data = [];
  foreach ($_POST as $key => $value)
  {
    if(strlen($value) > 0) $data[$key] = $value;
  }
  $data['likes'] = 0;
  $data['date'] = date("d-m-y H:i");
  if(sizeof($data) === 5)array_push($recoveredArray['posts'], $data);
}

if(sizeof($recoveredArray) > 0)
$serializedData = serialize($recoveredArray);
if(isset($serializedData))
file_put_contents('static/php/data.txt', $serializedData);

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Readthat</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="static/css/master.css">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="/Readthat/">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/Readthat/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Readthat/links.php">Link</a>
        </li>
      </ul>
    </div>
  </nav>
  <hr>
  <main class="container">
    <form method="post">
      <div class="form-group row">
        <input type="text" class="form-control col-sm-12 col-md-6" id="title" placeholder="Title" name="title">
        <input type="text" class="form-control col-sm-12 col-md-6" id="author" placeholder="Author" name="author">
      </div>
      <div class="form-group row">
        <textarea class="form-control col-12" id="post" rows="3" placeholder="Post" name="text"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <section class="container">
      <div class="row">
        <?php if(sizeof($recoveredArray) === 0): ?>
          <div class="col-12">
            <p>No data - Start posting!</p>
          </div>
        <?php else:
          foreach (array_reverse($recoveredArray) as $key => $data): ?>
          <div class="card col-sm-12 col-md-6">
            <div class="card-body row align-items-center">
              <div class="card-title col-sm-12 col-md-6"><?php echo $data['title']; ?></div>
              <div class="col-sm-12 col-md-6 row justify-content-end">by <?php echo $data['author']; ?></div>
              <div class="card-text col-12 bg-info" style="height: 200px; overflow: scroll;"><?php echo $data['text']; ?></div>
              <div class="col-2"><?php echo $data['likes']; ?><a class="btn btn-primary btn-sm" href="#">&#x25B2;</a></div>
              <div class="col-9 row justify-content-end"><?php echo $data['date']; ?></div>
              <div class="col-1"><a class="btn btn-warning btn-sm" href="removepost.php?index=<?php echo $key; ?>">x</a></div>
            </div>
          </div>
        <?php endforeach;
      endif; ?>
    </div>
  </section>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</html>
