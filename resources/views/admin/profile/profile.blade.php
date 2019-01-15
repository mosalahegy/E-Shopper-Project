@extends('admin.layout.layout')
@section('title')
    Profile
@endsection

@section('content')
    <br>
    <div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black" style="background: url({{asset('storage/storage/uploads/images/users/'.$user->backimage)}}) center center">
            <h3 class="widget-user-username">{{$user->name}}</h3>
            <h5 class="widget-user-desc">{{position()[$user->isAdmin]}}</h5>
        
        </div>
        <div class="widget-user-image">
            <img style='width:120px;border:1px solid #EEE' src="{{asset('storage/storage/uploads/images/users/' . $user->image)}}" alt="User Avatar">
        </div>
        <br>
        @if(Auth::user()->id == $user->id)
        <div class="col-md-12 col-md-offset-0" style="margin-top:60px;">
            <div class="col-md-6" style="margin-bottom:10px;">
                <div class="edit-image">
                    <form action='/dashboard/profile/{{$user->id}}/changeimage' method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}                        
                        <input type="hidden" name='_method' value="PATCH">
                        <div class="form-group">
                            <input type="file" name="profile-image" class='form-control btn btn-block btn-success' value="Edit Image">
                        </div>
                        <input type="submit" class='form-control btn btn-block btn-success' value="Change Profile image">
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="edit-image ">
                    <form action='/dashboard/profile/{{$user->id}}/change-background-image' method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name='_method' value="PATCH">
                        
                        <div class="form-group">
                            <input type="file" name="back-image" class='form-control btn btn-block btn-primary' value="Edit Image">
                        </div>
                        <input type="submit" class='btn btn-primary btn-block form-control' value="Change Background image">
                    </form>
                </div>        
            </div>
        </div>
        @endif
        <div class="box-footer" style="margin-top:10px;">
            <div class="row">
            <div class="col-md-4 border-right">
                <div class="description-block">
                <h5 class="description-header">3,200</h5>
                <span class="description-text">SALES</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
                <div class="description-block">
                <h5 class="description-header">13,000</h5>
                <span class="description-text">FOLLOWERS</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
                <div class="description-block">
                <h5 class="description-header">{{$user->products->count()}}</h5>
                <span class="description-text">PRODUCTS</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        </div>
        <!-- /.widget-user -->
    </div>

    <div class="col-md-12">
             
        <div style="padding-left:0;padding-right:0" class="col-md-12">
          <!-- USERS LIST -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title pull-left">Products Added</h3>

              <div class="pull-right">
                <span class="label label-danger">{{$user->products->count()}} </span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="col-md-12 text-center">
            <div class="box-body no-padding">
                    @if($products->count() == 0)
                        <p>No Products To Show</p>
                    @endif
                    @foreach($products as $product)
                        <div class="col-md-3" >
                        
                            <img src="{{asset('/storage/storage/uploads/images/products/' . $product->image)}}" alt="Product Image">
                                <a style='font-size:16px;' class="users-list-name" href="/dashboard/products/{{$product->id}}/edit">Get Data</a>
                                <span class="users-list-date">{{$product->name}}</span>
                            
                        </div>   
                    @endforeach
                    <div class="clearfix"></div>
                    {{$products->links()}}
              <!-- /.users-list -->
            </div>
        </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              
            </div>
            <!-- /.box-footer -->
          </div>
          <!--/.box -->
        </div>
    </div>
@endsection

@section('footer')

@endsection