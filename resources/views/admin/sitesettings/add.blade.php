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
            <h3 class="panel-title">Add New Setting <i class="fa fa-user-cog"></i></h3>
            </div>
            <div class="panel-body">
                    <div class="col-md-12">
                        @include('admin.sitesettings.form_add')
                    </div>
                        
            </div>
        </div>
    </div>

@endsection

@section('footer')
<script src="{{asset('admin/custom/custom.js')}}"></script>
@endsection