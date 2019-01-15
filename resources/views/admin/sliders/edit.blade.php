@extends('admin.layout.layout')

@section('title')
    Edit Sliders
@endsection

@section('header')
@endsection

@section('content')
    <br>
    @include('admin.messages.messages')
    <div class='col-md-12 col-sm-12'>
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">Edit Slider With Name : </h3>
            </div>
            <div class="panel-body">
                    
                    <div class="col-md-12">
                        @include('admin.sliders.form_edit')
                    </div>
                        
            </div>
        </div>
    </div>

@endsection

@section('footer')
@endsection