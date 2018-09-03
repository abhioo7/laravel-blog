@extends('main')
@section('title','|All Categories')
@section('content')

<div class="row">
  <div class="col-md-8">
    <h1>Category</h1>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <th>{{ $category->id}}</th>
          <td>{{ $category->name }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-md-3">
    <div class="panel panel-default">
      {!! Form::open(['route' => 'categories.store','method' =>'POST']) !!}
      <h2>New Category</h2>
      {{ Form::label('name', 'Name:') }}
      {{ Form::text('name',null,['class' =>'form-control']) }}
      <hr>
      {{ Form::submit('create new category',['class' => 'btn btn-success btn-block']) }}
      {!! Form::close() !!}
    </div>
 </div>
</div>
@endsection
