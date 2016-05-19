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
                             <form class="form-horizontal">
                              <fieldset>
                                <legend>{!! Velin::buttonCreate() !!}</legend>
                                
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th width="80%">Role</th>
                                        <th width="20%">Action</th>
                                      </tr>
                                    </thead>
                                </table>

                              </fieldset>
                            </form>

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
@section('script')
  
  <script type="text/javascript">
    $(function() {
    $.fn.dataTable.ext.errMode = 'none';
    $('.table').DataTable({
        processing: true,
        serverSide: true,
        ajax : '{{ Velin::urlBackendAction("data") }}',
        columns: [
            { data: 'role', name: 'role' },
            { data: 'action', name: 'action',searchable : false,orderable:false, },
            
        ]
    });
  });
  </script>

  {!! Velin::flashSuccess(Session::get('success'))  !!}
  

@endsection