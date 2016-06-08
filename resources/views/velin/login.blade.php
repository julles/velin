@extends('velin.layouts.auth')
@section('content')
<div class="container">

  {!! Form::open(['class' => 'form-signin']) !!}
    <h2 class="form-signin-heading">Please sign in</h2>
    {!! Form::text('username',null,['class' => 'input-block-level' ,'placeholder' => 'Username']) !!}
    {!! Form::password('password',['class' => 'input-block-level' ,'placeholder' => 'Password']) !!}
    <button class="btn btn-large btn-primary" type="submit">Sign in</button>
  {!! Form::close() !!}

</div>

@endsection
@section('script')
{!! Velin::flashInfo(Session::get('info'))  !!}
@endsection
@include('velin.common.validation')
