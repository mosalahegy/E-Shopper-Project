@extends('admin.layout.layout')
@section('title')
    Sitesettings
@endsection
@section('content')
<section class="content">
    <div class="row">
        @include('admin.messages.messages')
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Sitesetting Control Panel</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><span>#</span></th>                                                                      
                                <th><span>Setting Name</span></th>
                                <th><span>Setting Type</span></th>
                                <th><span>Setting Value</span></th>
                                <th><span>Created At</span></th>
                                <th><span>Choices</span></th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(count($settings) > 0)
                                    @foreach($settings as $setting)
                                    <tr class="text-center">
                                        <td><span>{{$setting->id}}</span></td>                                                                      
                                        <td><span>{{$setting->setting_name}}</span></td>
                                        
                                        <td><span>{{settingType()[$setting->type]}}</span></td>
                                        @if(settingType()[$setting->type] == "File Upload")
                                            <td><img style='width:40px;border:1px solid #EEE;' src="{{asset('storage/storage/uploads/images/sitesettings/' . $setting->image)}}"</td>
                                        @else
                                            <td><span>{{str_limit($setting->setting_value,50)}} </span></td>
                                        @endif
                                        <td><span>{{$setting->created_at->diffForHumans()}}</span></td>
                                        <td>
                                            @if(Auth::user()->isAdmin == 1)
                                                <a title='Edit' href="/dashboard/settings/{{$setting->id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                                <a title='Delete' href="/dashboard/settings/{{$setting->id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            @endif
                                            @if(Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2)
                                                <a title='Approve' href="/dashboard/settings/{{$setting->id}}/approve" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i></a>                                            
                                                <a title='Disable' href="/dashboard/settings/{{$setting->id}}/disable" class="btn btn-xs btn-warning"><i class="fa fa-ban"></i></a>                                                                                        
                                            @endif</td>
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
