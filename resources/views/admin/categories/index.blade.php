@extends('admin.layout.layout')
@section('title')
    Categories
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
                    <h3 class="box-title">Category Control Panel</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><span>#</span></th>                                                                      
                                <th><span>Name</span></th>
                                <th><span>Description</span></th>
                                <th><span>Products Quantity</span></th>
                                <th><span>Approvement</span></th>
                                <th><span>Allow Comment</span></th>
                                <th><span>Allow Advertisement</span></th>
                                <th><span>Added By</span></th>
                                <th><span>Created At</span></th>
                                <th><span>Choices</span></th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                    <tr class="text-center">
                                        <td><span>{{$category->id}}</span></td>                                                                      
                                        <td><span>{{$category->name}}</span></td>
                                        <td><span>{{str_limit($category->description,10)}}</span></td>
                                        <td><span>{{$category->quantity}}</span></td>
                                        <td><span>{{approvement()[$category->approve]}}</span></td>
                                        <td><span>{{allowment()[$category->allow_comment]}}</span></td>
                                        <td><span>{{allowment()[$category->allow_advertisement]}}</span></td>  
                                        <td><span>{{$category->user->name}}</span></td>                                                                                                             
                                        <td><span>{{$category->created_at->diffForHumans()}}</span></td>
                                        <td>
                                            @if(Auth::user()->isAdmin == 1)
                                                <a title='Edit' href="/dashboard/categories/{{$category->id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                                <a title='Delete' href="/dashboard/categories/{{$category->id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            @endif
                                            @if(Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2)
                                                <a title='Approve' href="/dashboard/categories/{{$category->id}}/approve" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i></a>                                            
                                                <a title='Disable' href="/dashboard/categories/{{$category->id}}/disable" class="btn btn-xs btn-warning"><i class="fa fa-ban"></i></a>                                                                                        
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
