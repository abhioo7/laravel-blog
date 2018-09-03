@extends('main')
@section('title', '| Homepage')
@section('stylesheets')
  <link rel="stylesheet" type=text/css href="styles.css">
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
         <h1 class="display-4">Welcome to my blog!</h1>
         <p class="lead">Thanku for visiting this is my test website build using Laravel</p>
         <hr class="my-4">You love the information which we will provide you through this blog<hr>
         <a class="btn btn-primary btn-lg" href="#" role="button">Latest post</a>
       </div>
     </div>
   </div>

   <div class="row">
     <div class="col-md-8">
       @foreach( $post as $pos)
       <div class="post">
         <h1>{{ $pos->title }}</h1>
         <p {{substr($pos->body,0,300) }} {{ strlen($pos->body)>300? ".....":""}}</p>
       </div>
       <p><b> {{ $pos->body}} </p>
       <a  class="btn btn-primary btn-lg" href="{{ route('post.show',$pos->id) }}" role="button">Read More</a>
       @endforeach
    </div>
@endsection
