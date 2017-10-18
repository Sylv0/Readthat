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

  <main class="container">
    <form>
      <div class="form-group row">
        <input type="text" class="form-control col-sm-12 col-md-6" id="title" placeholder="Title">
          <input type="text" class="form-control col-sm-12 col-md-6" id="author" placeholder="Author">
      </div>
      <div class="form-group row">
        <textarea class="form-control col-12" id="post" rows="3" placeholder="Post"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <section class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6 row bg-primary">
          <div class="col-sm-12 col-md-6">((title))</div>
          <div class="col-sm-12 col-md-6 row justify-content-end">by ((author))</div>
          <div class="col-12 bg-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
          <div class="col-11 row justify-content-end">((date))</div>
        </div>
      </div>
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript" src="static/js/main.js"></script>
</html>
