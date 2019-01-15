@extends('admin.layout.layout')
@section('title')
    Advertisements
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
                    <h3 class="box-title">Advertisement Control Panel</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><span>#</span></th>                                                                      
                                <th><span>Name</span></th>
                                <th><span>Approvement</span></th>
                                <th><span>URL</span></th>
                                <th><span>Image</span></th>
                                <th><span>Created At</span></th>
                                <th><span>Choices</span></th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(count($advertisements) > 0)
                                    @foreach($advertisements as $advertisement)
                                    <tr class="text-center">
                                        <td><span>{{$advertisement->id}}</span></td>                                                                      
                                        <td><span>{{$advertisement->name}}</span></td>
                                        <td><span>{{approvement()[$advertisement->approve]}}</span></td>
                                        <td><span>{{$advertisement->url}}</span></td>   
                                        <td><img style='width:40px;border:1px solid #EEE;' src="{{asset('storage/storage/uploads/images/advertisements/' . $advertisement->image)}}"</td>                                                                                                               
                                        <td><span>{{$advertisement->created_at->diffForHumans()}}</span></td>
                                        <td>
                                            @if(Auth::user()->isAdmin == 1)
                                                <a title='Edit' href="/dashboard/advertisements/{{$advertisement->id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                                <a title='Delete' href="/dashboard/advertisements/{{$advertisement->id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            @endif
                                            @if(Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2)
                                                <a title='Approve' href="/dashboard/advertisements/{{$advertisement->id}}/approve" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i></a>                                            
                                                <a title='Disable' href="/dashboard/advertisements/{{$advertisement->id}}/disable" class="btn btn-xs btn-warning"><i class="fa fa-ban"></i></a>                                                                                        
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
