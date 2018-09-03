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
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <br>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
        <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="route("post.show")">post</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="route("logout")">Logout</a>
         </div>
        </li>
      @endif
    </ul>
    </div>
</nav>
