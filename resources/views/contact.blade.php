<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IF-edge">
    <meta name="viewport" content="width=device-width" initial-scale=1>
    <title> laravel blog Contact US </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Default bootstrap Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Laravel Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item-active">
          <a class="nav-link" href="/contact">Contact</a>
      </li>
      <li class="nav-item-active">
          <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
      </li>
      <li class="nav-item-active">
          <a class="nav-link" href="{{ route('tags.index') }}">Tags</a>
      </li>
      <li class="nav-item-active">
          <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <hr>
    <form action="{{ url('contact') }}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label name="email">Email:</label>
        <input id="email" name="email" class="form-control">
      </div>
      <div class="form-group">
      <label name="subject">Subject:</label>
      <input id="subject" name="subject" class="form-control">
      </div>
      <div class="form-group">
      <label name="message">Message</label>
      <textarea id="message" name="message" class="form-control">Type your message here</textarea>
      </div>
      <input type="submit" value="send message" class="btn btn-success">
  </form>
  </div>
</div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
