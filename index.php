<?php
declare(strict_types=1);

require __DIR__.'/static/php/functions.php';

// Path to with data
$pathToFile = __DIR__.'/static/js/data.json';

// Only load from file if it exists
if(file_exists($pathToFile))
{
  $recoveredData = file_get_contents($pathToFile);
}

// Decode JSON if there's data, else create array
if(isset($recoveredData) && $recoveredData)
{
  $recoveredArray = json_decode($recoveredData, true);
}else
{
  $recoveredArray = ['author' => [], 'posts' => []];
}

// Create the file if it doesn't exist
if(!file_exists($pathToFile))
{
  $serializedData = json_encode($recoveredArray);
  file_put_contents($pathToFile, $serializedData);
}
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
  <!-- Navbar. Not used, only looks good  -->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="/Readthat/">Readthat</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/Readthat/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a id="link-btn" class="nav-link" href="/Readthat/links.php" onclick="">Link</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="container">
    <form method="post" action="posts.php">
      <div class="form-group row">
        <input type="text" class="form-control col-sm-12 col-md-6" id="title" placeholder="Title" name="title">
        <input list="authors" name="author" placeholder="Author">
        <datalist id="authors">
          <?php foreach ($recoveredArray['author'] as $value): ?>
            <option value="<?php echo $value ?>"></option>
          <?php endforeach; ?>
        </datalist>
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="submit" name="add_author">+</button>
        </span>
      </div>
      <div class="form-group row">
        <textarea class="form-control col-12" id="post" rows="3" placeholder="Post" name="text"></textarea>
      </div>
      <button name="new_post" value="true" type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>

    <section class="container">
      <div class="row">
        <?php if(sizeof($recoveredArray['posts']) === 0): ?>
          <div class="col-12">
            <p>No data - Start posting!</p>
          </div>
          <?php
        else:
          foreach (array_reverse($recoveredArray['posts']) as $key => $data): ?>
          <div class="card col-sm-12 col-md-6">
            <div class="card-body row align-items-center">
              <div class="card-title col-es-12 col-md-6"><?php echo $data['title']; ?></div>
              <div class="col-es-12 col-md-6 row justify-content-end">
                by <?php if(isset($recoveredArray['author'][strToKey($data['author'])]))echo $recoveredArray['author'][strToKey($data['author'])];
                else echo $data['author'].'(Guest)' ?>
              </div>
              <div class="card-text col-12 bg-info" style="height: 300px; overflow: scroll;">
                <div style="overflow: hidden;">
                  <?php
                  // If title contains the words 'lorem' and 'ipsum', gif.
                  if(strpos($data['title'], "lorem") !== false && strpos($data['title'], "ipsum") !== false)
                  {
                    require 'static/html/secret.html';
                    // Else, regular text.
                  }else{
                    echo $data['text'];
                  } ?>
                </div>
              </div>
              <div class="col-2"><a class="btn btn-primary btn-sm like_post" href="#"><?php echo $data['likes']; ?></a></div>
              <div class="col-9 row justify-content-end"><?php echo $data['date']; ?></div>
              <div class="col-1">
                <form method="post" action="posts.php">
                  <input type="number" name="index" value="<?php echo sizeof($recoveredArray['posts']) - $key - 1; ?>" hidden>
                  <button type="submit" name="remove_post" class="btn btn-warning btn-sm">x</button>
                </form>
              </div>
            </div>
          </div>
          <?php
        endforeach;
      endif; ?>
    </div>
  </section>
  <div class="card" id="not-droids">
    <div class="card-body">
      <div class="card-text">
        <p>These aren't the links you're looking for</p>
      </div>
    </div>
  </div>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="static/js/main.js"></script>
</html>
