@extends('velin.layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12" id="content">
              <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Update Profile</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                             {!! Form::model($model,['class'=>'form-horizontal']) !!}
                              <fieldset>
                                <div class="control-group">
                                  <label class="control-label" for="focusedInput">Username</label>
                                  <div class="controls">
                                    {!! Form::text('username',null,['class' => 'input-xxlarge']) !!}
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label" for="focusedInput">Email</label>
                                  <div class="controls">
                                    {!! Form::text('email',null,['class' => 'input-xxlarge']) !!}
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label" for="focusedInput">Name</label>
                                  <div class="controls">
                                    {!! Form::text('name',null,['class' => 'input-xxlarge']) !!}
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label" for="focusedInput">Password</label>
                                  <div class="controls">
                                    {!! Form::password('password',['class' => 'input-xxlarge']) !!}
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label" for="focusedInput">Verify Password</label>
                                  <div class="controls">
                                    {!! Form::password('verify_password',['class' => 'input-xxlarge']) !!}
                                  </div>
                                </div>
                                <div class="form-actions">
                                  <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Create' }}</button>
                                  <button type="reset" class="btn">Cancel</button>
                                </div>
                              </fieldset>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>
    <hr>
    <footer>
        <p>{{ Velin::config('footer') }}</p>
    </footer>
</div>
@endsection
@include('velin.common.validation')
@section('script')
{!! Velin::flashSuccess(Session::get('success'))  !!}
@endsection