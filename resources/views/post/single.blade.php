@extends('main')
<? php $titleTag = htmlspecialchars($post->title); ?>
@section('title',"|$titleTag")
@section('content')
 <div class="row">
   <div class="col-md-8 col-md-offset-2">
     <h1>{{ $post->title }}</h1>
      <p>{{ $post->body }}</p>
      <hr>
      <p>posted IN: {{ $post->category->name}}</p>
   </div>
 </div>
 <div class="row">
   <div id="comment-form">
     {{ Form::open{{ 'route => ['comments.store',$post->id],'method' =>'POST'}} }}
      <div class="row">
        <div class="col-md-6">
          {{ Form::label('name',"Name:") }}
          {{ Form::text('name',null,['class' =>'form-control']) }}
        </div>
        <div class="col-md-6">
          {{ Form::label('email', 'Email:') }}
          {{ Form::text('email',null, ['class =>'form-control']) }}
        </div>
      </div>
      <div class="col-md-12">
        {{ Form::label('comment',"Comment:") }}
        {{ Form::textarea('comment',null.['class'=>'form-control']) }}
        (( Form::submit('Add Comment',['class'=> 'form-control btn btn-block btn-success'])))
      </div>
    </div>
  </div>
@endsection
