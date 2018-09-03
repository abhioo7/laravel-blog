@extends('main')

@section('title', '| Create New Post')
@section('stylesheets')
{!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')

    <div class="row">
	  <div class="col-md-8 col-md-offset-2">
	     <h1>Create New Post</h1>
		 <hr>
          <div class="container">
            <div class="row">
            <div class="col-md-12">
          <hr>
         <form action="/store" method="post" enctype="multipart/form-data">
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
             <select class="form-control " name="category_id">
              @foreach($categories as $category)
               <option value='{{ $category->id }}'>{{ $category->name }}</option>
              @endforeach
             </select>
           </div>
          <div class="form-group">
            <label name="tags">Tags:</label>
            <select multiple class="form-control" name="tags">
             @foreach($tags as $tag)
              <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
             @endforeach
            </select>
         </div>
         {{ Form::label('featured_image','Upload featured Image')}}
         {{ Form::file('featured_image') }}<br>
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="submit" value="Upload post" class="btn btn-success">
        </form>
          </div>
        </div>
        </div>
	  </div>
	</div>
@endsection
@section('scripts')
{!! Html::script('js/select2.min.js')!!}
<script type="text/javascript">
   $('.select2-multi').select2();
</script>
@endsection
