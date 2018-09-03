@extends('main')
@section('title', '| View Post')
@section('content')
 <div class="row">
   <div class="col-md-8">
     <h1> {{ $post->title }}</h1>
     <p class="lead"> {{ $post->body }}</p>
     <hr>
     <p class="lead">posted In: {{ $post->category->name}}</p>
      <div class="tags">
       @foreach( $post->tags as $tag)
          <span class="label">Tagged In:{{ $tag->name }}</span>
       @endforeach
     </div>
   </div>
   <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Created At:</dt>
        <dd>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Updated At:</dt>
        <dd>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          <a href="{{ route('post.edit',$post->id) }}"class="btn btn-primary btn-block">Edit</a>
        </div>
        <div class="col-sm-6">
          {!! Form::open(['route' => ['post.destroy',$post->id],'method' =>'DELETE']) !!}
          {!! Form::submit('Delete',['class' => 'btn btn-danger btn-block']) !!}
          {!! Form::close() !!}
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          <a href="{{ route('post.index') }}" class="btn  btn-primary btn-sm">See All Post</a>
          <hr>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
 <table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Comment</th>
   </tr>
 </thead>
 <tbody>
   @foreach ($post->comments as $comment )
   <tr>
     <td> {{ $comment->name }}</td>
     <td> {{ $comment->email }}</td>
     <td> {{ $comment->comment }}</td>
     <td>
       <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
       <a href="{{ route('comments.delete', $comment->id)}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
     </td>
   </tr>
   @endforeach
 </tbody>
</table>
<div class="row">
    {!! Form::open([ 'route' => ['comments.store',$post->id],'method' =>'post']) !!}
     <div class="row">
      <div class="col-md-12">
       <div class="form-group">
       <label name="name">Name:</label>
       <input id="name" name="name" class="form-control">
       </div>
       <div class="form-group">
       <label name="email">Email:</label>
       <input id="email" name="email" class="form-control">
       </div>
       <div class="form-group">
       <label name="comment">Comment </label>
       <textarea id="comment" name="comment" class="form-control">Type your Comment here</textarea>
       </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Add Comment" class="btn btn-success">
      </div>
    </div>
 </div>
     {!! Form::close() !!}
 </div>
@endsection
