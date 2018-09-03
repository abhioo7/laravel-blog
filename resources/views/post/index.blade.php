@extends('main')
@section('title', '| All posts')
@section('content')
<style>
  a   {color: blue;}
</style>
  <div class="row">
    <div class"col-md-10">
      <h1>All posts</h1>
    </div>
    <div class="col-md-10">
      <a href="{{ route('post.create') }}" class="btn btn-md btn-primary" style="float: right"; >Create New post</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th></th>
          <th>Title</th>
          <th>Body</th>
          <th>Created At:</th>
          <th>Updated At:</th>
          <th></th>
        </thead>
        <tbody>
           @foreach ($post as $pos)
              <tr>
                 <th>{{ $pos->id }}</th>
                 <th>{{ $pos->title }}</th>
                 <td>{{ $pos->body }}</td>
                 <td>{{ $pos->created_at }}</td>
                 <td>{{ date('M j, Y',strtotime($pos->updated_at)) }}</td>
                 <td><a href="{{ route('post.show',$pos->id) }}" class="btn  btn-primary btn-sm">View</a> <a href="{{ route('post.edit',$pos->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
      <div class="text-center">
        {!! $post->links(); !!}
    </div>
  </div>
@endsection
