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
                        <div class="muted pull-left">&nbsp;</div>
                    </div>
                    <div class="block-content collapse in">
                      <div class="span12">
                        <div class="well">
                          <h1>Hello Artisan !!</h1>
                          <p>Welcome To Velin Admin Panel</p>
                        </div>

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