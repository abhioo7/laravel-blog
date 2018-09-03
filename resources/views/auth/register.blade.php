@extends('main')
@section('title','|Register')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {!! Form::open() !!}
        {{ Form::label('name',"Name:") }}
        {{ Form::text('name',null,['class' => 'form-control']) }}
        {{ Form::label('email',"Email:") }}
        {{ Form::email('email',null,['class' => 'form-control']) }}
        {{ Form::label('password',"Password:") }}
        {{ Form::password('password' ,['class' => 'form-control']) }}
        {{ Form::label('password_confirmation','Confirm Password:') }}
        {{ Form::password('password_confirmation',['class' =>'form-control']) }}
        {{ Form::Submit('Register',['class' =>'btn btn-success']) }}
        @if ($errors->any())
        <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
        </div>
        @endif
      </div>
    </div>
      {!! Form::close() !!}
@endsection
