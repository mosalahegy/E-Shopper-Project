@if(Session::has('flash'))
    <div class="col-md-12">
        <div class='alert alert-info'>
            {{Session::get('flash')}}
        </div>
    </div>   
@endif
@if(Session::has('error'))
    <div class="col-md-12">
        <div class='alert alert-danger'>
            {{Session::get('error')}}
        </div>
    </div>   
@endif