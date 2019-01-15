@extends('admin.layout.layout')
@section('title')
    Messages
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
                    <h3 class="box-title">Message Control Panel</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><span>#</span></th>                                                                      
                                <th><span>Message Owner</span></th>
                                <th><span>Owner's Email</span></th>                                
                                <th><span>Subject</span></th>
                                <th><span>Message Content</span></th>
                                <th><span>Approvement</span></th>
                                <th><span>Sent At</span></th>
                                <th><span>Choices</span></th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(count($contacts) > 0)
                                    @foreach($contacts as $contact)
                                    <tr class="text-center">
                                                         
                                        <td><span>{{$contact->id}}</span></td>
                                        <td><span>{{$contact->name}}</span></td>
                                        <td><span>{{$contact->email}}</span></td>
                                        <td><span>{{$contact->subject}}</span></td>
                                        <td><span>{{$contact->message}}</span></td>     
                                        <td><span>{{approvement()[$contact->approve]}}</span></td>                                                                                                     
                                        <td><span>{{$contact->created_at->diffForHumans()}}</span></td>
                                        <td>
                                            <a title='Reply' href="/dashboard/contacts/{{$contact->id}}" class="btn btn-xs btn-info"><i class="fa fa-sign-in"></i></a>                                                                                        
                                            <a title='Approve' href="/dashboard/contacts/{{$contact->id}}/approve" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i></a>                                            
                                            <a title='Disable' href="/dashboard/contacts/{{$contact->id}}/disable" class="btn btn-xs btn-warning"><i class="fa fa-ban"></i></a>                                                                                        
                                            <a title='Delete' href="/dashboard/contacts/{{$contact->id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                                            
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
