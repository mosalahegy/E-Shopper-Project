@extends('admin.layout.layout')
@section('title')
    Home
@endsection
@section('header')
<style>
    h4{
        font-size: 15px;
    }
</style>
@endsection
@section('content')

  <!-- Content Wrapper. Contains page content --> 
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-home"></i>
            Dashboard            
          </h1>
          
        </section>
    
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            @include('admin.messages.messages') 
            <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
    
                <div class="info-box-content">
                        <h4>Users</h4>
                        <span class="info-box-number">{{$users->where('isAdmin',4)->count()}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-check-circle-o"></i></span>
    
                <div class="info-box-content">
                        <h4>Approved Products</h4>
                        <span class="info-box-number">{{$products->where('approve',1)->count()}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
    
            <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
                    <div class="info-box">
                      <span class="info-box-icon bg-fuchsia"><i class="fa fa-ban"></i></span>
          
                      <div class="info-box-content">
                              <h4>Disabled Products</h4>
                              <span class="info-box-number">{{$products->where('approve',0)->count()}}</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
    
            <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>
    
                <div class="info-box-content">
                        <h4>All Products</h4>
                        <span class="info-box-number">{{$products->count()}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>
    
                <div class="info-box-content">
                        <h4>Messages</h4>
                        <span class="info-box-number">{{$contacts->count()}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
             <!-- /.col -->
             <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-navy"><i class="fa fa-th-list"></i></span>
        
                    <div class="info-box-content">
                            <h4>Categories</h4>
                            <span class="info-box-number">{{$categories->where('approve',1)->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple"><i class="fa fa-bookmark"></i></span>
            
                        <div class="info-box-content">
                                <h4>Advertisements</h4>
                                <span class="info-box-number">{{$advertisements->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
          </div>
          <!-- /.row -->
    
        
    
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-4">
             
                <div style='padding-left:0;padding-right:0' class="col-md-12">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title pull-left">Latest Member</h3>
    
                      <div class="pull-right">
                        <span class="label label-danger">4 members</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-md-12">
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                          @foreach($users->where('isAdmin',4)->take(4) as $user)
                            <li>
                            <img src="{{asset('/storage/storage/uploads/images/users/' . $user->image)}}" alt="User Image">
                                <a style='font-size:16px' class="users-list-name" href="/dashboard/profile/{{$user->id}}">Profile</a>
                                <span class="users-list-date">{{$user->name}}</span>
                            </li>    
                          @endforeach 

                      </ul>
                      <!-- /.users-list -->
                    </div>
                </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="/adminpanel/users">All Users</a>
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!--/.box -->
                </div>
            </div>
            <div class="col-md-8">
                              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title pull-left">Unread Messages</h3>
        
                      <div class="pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table no-margin">
                          <thead>
                          <tr>
                            <th style="width:1%">#</th>
                            <th style="width:17%;">Owner</th>
                            <th style="width:15%;">Owner Email</th>
                            <th style="width:10%;">Subject</th>
                            <th style="width:30%;">Content</th>
                            <th style="width:22%;">Sent At</th>
                            <th style="width:10%;">Choices</th>
                           
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($contacts->where('seen',0)->where('to','https//:www.eshopper.com') as $contact)
                              <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{str_limit($contact->subject,20)}}</td>
                                <td>{{str_limit($contact->message,50)}}</td>
                                <td>{{$contact->created_at->diffForHumans()}}</td>
                                <td>
                                    <a style = 'margin-bottom:5px;' title='Reply' href="/dashboard/contacts/{{$contact->id}}/reply" class="btn btn-xs btn-info"><i class="fa fa-sign-in"></i></a>                                                                                        
                                    <a style = 'margin-bottom:5px;' title='Approve' href="/dashboard/contacts/{{$contact->id}}/approve" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i></a>                                            
                                    <a title='Disable' href="/dashboard/contacts/{{$contact->id}}/disable" class="btn btn-xs btn-warning"><i class="fa fa-ban"></i></a>                                                                                        
                                    <a title='Delete' href="/dashboard/contacts/{{$contact->id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                      <a href="adminpanel/contact" class="btn btn-info btn-flat pull-left">View All</a>
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!-- /.box -->
            </div>
            </div>
         
            <div class='row'>
                
                
              <!-- /.box -->
                <div class="col-md-12 ">
                    <!-- PRODUCT LIST -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title pull-left">Latest Products</h3>
            
                        <div class="pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            
                                @foreach($products->take(5) as $product)                     
                                  <li class="item">
                                  <div class="product-img">
                                      <img src="{{asset('storage/storage/uploads/images/products/'.$product->image)}}" alt="Product Image">
                                  </div>
                                  <div class="product-info">
                                      <a href="/dashboard/products/{{$product->id}}edit" style='margin-right:20px;' class="product-title">
                                      <span  class="label label-success pull-left">${{$product->price}}</span></a>
                                      
                                          <span class="product-description">
                                              {{$product->description}}
                                          </span>
                                    
                                  </div>
                                  </li>
                                  @endforeach
                                <!-- /.item -->
                            
                        </ul>
                        
                        </div>
                        
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                        <a href="/adminpanel/buildings" class="uppercase">All</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
              <!-- /.box -->
                </div>
            </div>  
                <!-- /.col -->
              
              <!-- /.row -->
            


 
          <!-- /.row -->
        </section>
        <!-- /.content -->
      

@endsection
@section('footer')

@endsection