@extends('admin.layout.layout')
@section('title')
    Products
@endsection

@section('title')

@endsection

@section('content')
<section class="content">
    <div class="row">
        @include('admin.messages.messages')
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Product Control Panel</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><span>#</span></th>                                                                      
                                <th><span>Name</span></th>
                                <th><span>Description</span></th>
                                <th><span>Price</span></th>
                                <th><span>Quantity</span></th>
                                <th><span>Approval</span></th>
                                <th><span>Status</span></th>
                                <th><span>Category</span></th>
                                <th><span>Brand</span></th>
                                <th><span>Country</span></th>
                                <th><span>Image</span></th>
                                <th><span>Created At</span></th>
                                <th><span>Choices</span></th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(count($products) > 0)
                                    @foreach($products as $product)
                                    <tr class="text-center">
                                        <td><span>{{$product->id}}</span></td>                                                                      
                                        <td><span>{{$product->name}}</span></td>
                                        <td><span>{{str_limit($product->description,10)}}</span></td>
                                        <td><span>{{$product->price}}</span></td>
                                        <td><span>{{$product->quantity}}</span></td>
                                        <td><span>{{approvement()[$product->approve]}}</span></td>
                                        <td><span>{{status()[$product->status]}}</span></td>
                                        <td><span>{{$product->category->name}}</span></td> 
                                        <td><span>{{$product->brand->name}}</span></td>  
                                        <td><span>{{$product->country}}</span></td>         
                                        <td><img style='width:40px;border:1px solid #EEE;' src="{{asset('storage/storage/uploads/images/products/' . $product->image)}}"</td>                                                                                               
                                        <td><span>{{$product->created_at->diffForHumans()}}</span></td>
                                        <td>
                                            @if(Auth::user()->isAdmin == 1)
                                                <a title='Edit' href="/dashboard/products/{{$product->id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                                <a title='Delete' href="/dashboard/products/{{$product->id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            @endif
                                            @if(Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2)
                                                <a title='Approve' href="/dashboard/products/{{$product->id}}/approve" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i></a>                                            
                                                <a title='Disable' href="/dashboard/products/{{$product->id}}/disable" class="btn btn-xs btn-warning"><i class="fa fa-ban"></i></a>                                                                                        
                                            @endif
                                                                                       
                                        </td>
                                    </tr>
                                    @endforeach  
                                @endif  
                                
                        </tbody>
                    
                    </table>
                </div>
            </div>   
        </div>
    </div>
</section>
@endsection

@section('footer')

<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          })
        })
      </script>
@endsection
