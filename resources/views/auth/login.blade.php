@extends('main')
@section('title', '| Login')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {!! Form::open() !!}
          {{ Form::label('email','Email:')}}
          {{ Form::email('email',null, ['class' => 'form-control']) }}
          {{ Form::label('password',"Password:") }}
          {{ Form::password('password' ,['class' => 'form-control']) }}
          <br>
          {{ Form::checkbox('remember') }} {{ Form::label('remember',"Remember Me") }}
          <br>
          {{ Form::Submit('Login',['class' => 'btn btn-primary ']) }}
          @if ($errors->any())
         <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
         </div>
         @endif
          <p><a href=" {{ url('password/reset') }}">FORGOT Password</a>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
