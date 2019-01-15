@extends('admin.layout.layout')

@section('title')
    Adding Users
@endsection

@section('header')
@endsection

@section('content')
    <br>
    @include('admin.messages.messages')
    <div class='col-md-12 col-sm-12'>
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">Add New Category <i class="fa fa-th-list"></i></h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    @include('admin.categories.form_add')
                </div>   
            </div>
        </div>
    </div>

@endsection

@section('footer')
@endsection