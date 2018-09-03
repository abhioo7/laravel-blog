@extends('main')
@section('title','|edit blog post')
@section('stylesheets')
{!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
<div class="row form-spacing-top">
{!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PUT','files' => true]) !!}
  <div class="col-md-12">
    <dl class="dl-horizontal">
      <dt>Created At:</dt>
      <dd>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>Updated At:</dt>
      <dd>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>
    </dl>
  </div>
</div>
  <div class="col-md-10 form-spacing-top">
    <div class="form-group">
    <label name="title">Title:</label>
    <input id="title" name="title" class="form-control">
    </div>
    <div class="form-group">
    <label name="body">Post Body </label>
    <textarea id="body" name="body" class="form-control">Type your post here</textarea>
    </div>
   <div class="form-group">
     <label name="category">Category:</label>
     <select class="form-control" name="category_id">
      @foreach($categories as $category)
       <option value='{{ $category->id }}'>{{ $category->name }}</option>
      @endforeach
     </select>
   </div>
     <div class="form-group">
       <label name="tag">Tag:</label>
       <select class="form-control" name="tags">
        @foreach($tags as $tag)
         <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
        @endforeach
       </select>
    </div>
    {{ Form::label('featured_image', 'Update Featured Image:')}}
    {{ Form::file('featured_image')}}
 <div class="col-md-10">
   <div class="well">
     <div class="row">
       <div class="col-sm-6">
         <br>
         <a href="{{ route('post.show',$post->id) }}" class="btn btn-primary btn-block">Cancel</a>
       </div>
       <div class="col-sm-6">
         <br>
         {{ Form::submit('Save Changes',['class' => 'btn btn-success btn-block'])}}

       </div>
     </div>
   </div>
 {!! Form::close() !!}
 </div>
</div>
@endsection
@section('scripts')
{!! Html::script('js/select2.min.js')!!}
@endsection
