@extends('admin.layout.layout')
@section('title')
    Brands
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
                    <h3 class="box-title">Brand Control Panel</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><span>#</span></th>                                                                      
                                <th><span>Name</span></th>
                                <th><span>Description</span></th>
                                <th><span>Category</span></th>
                                <th><span>Approvement</span></th>
                                <th><span>Created At</span></th>
                                <th><span>Choices</span></th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(count($brands) > 0)
                                    @foreach($brands as $brand)
                                    <tr class="text-center">
                                        <td><span>{{$brand->id}}</span></td>                                                                      
                                        <td><span>{{$brand->name}}</span></td>
                                        <td><span>{{str_limit($brand->description,10)}}</span></td>
                                        <td><span>{{$brand->category->name}}</span></td>                                        
                                        <td><span>{{approvement()[$brand->approve]}}</span></td>                                                                                                           
                                        <td><span>{{$brand->created_at->diffForHumans()}}</span></td>
                                        <td>
                                            @if(Auth::user()->isAdmin == 1)
                                                <a title='Edit' href="/dashboard/brands/{{$brand->id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                                <a title='Delete' href="/dashboard/brands/{{$brand->id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            @endif
                                            @if(Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2)
                                                <a title='Approve' href="/dashboard/brands/{{$brand->id}}/approve" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i></a>                                            
                                                <a title='Disable' href="/dashboard/brands/{{$brand->id}}/disable" class="btn btn-xs btn-warning"><i class="fa fa-ban"></i></a>                                                                                        
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
