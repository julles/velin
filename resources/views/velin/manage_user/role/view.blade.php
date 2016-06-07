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
                        <div class="muted pull-left">{{ Velin::labelAction() }}</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                             {!! Form::model($model,['class'=>'form-horizontal']) !!}
                              <fieldset>
                                <div class="control-group">
                                  <label class="control-label" for="focusedInput">Role</label>
                                  <div class="controls">
                                    {!! Form::text('role',null,['class' => 'input-xxlarge','readonly' => true]) !!}
                                  </div>
                                </div>
                                <div class="control-group">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                          <th width="50%">Menu</th>
                                          <th width="50%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @php($no = 0)
                                    @foreach($menus as $parent)
                                    @php($no++)  
                                      <tr>
                                        <td colspan="2">{{ $parent->title }}</td>
                                      </tr>
                                        @foreach(injectModel('Menu')->whereParentId($parent->id)->get() as $child)
                                            <tr>
                                              <td colspan="2" style = 'padding-left:20px;'>{{ $child->title }}</td>
                                            </tr> 
                                             @foreach($child->actions as $action) 
                                              <tr>
                                                <td style="padding-left:60px;">{{ $action->title }}</td>
                                                <td><input {{ $cek($action->pivot->id) }} type = 'checkbox' name = 'menu_action_id[]' value = '{{ $action->pivot->id }}' /></td>
                                              </tr>
                                             @endforeach
                                        @endforeach

                                    @endforeach
                                    </tbody>
                                  </table>
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