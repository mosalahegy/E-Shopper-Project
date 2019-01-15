@extends('admin.layout.layout')
@section('title')
    Messages
@endsection

@section('content')
<section class="content">
    <div class="row">
        @include('admin.messages.messages')
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Message Control Panel</h3>
                </div><br>
            <!-- /.box-header -->
            <div class="row">  	
                    <div class="col-sm-10 col-md-offset-1">
                        <div class="contact-form">
                            <div class="status alert alert-success" style="display: none"></div>
                            <form action='/contact' id="main-contact-form" class="contact-form row" name="contact-form" method="POST">
                               {{csrf_field()}}
                                
                                <label for="name" class="col-sm-2 control-label">From</label>                                    
                                <div class="form-group col-md-10">
                                    <input type="text" id='name' name="name" class="form-control" required="required" value="{{$contact->name}}" placeholder="Name">
                                </div>

                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="form-group col-md-10">
                                    <input type="email" id='email' name="email" class="form-control" required="required" value="{{$contact->email}}" placeholder="Email">
                                </div>
                                <label for="subject" class="col-sm-2 control-label">Subject</label>
                                <div class="form-group col-md-10">
                                    <input type="text" id='subject' name="subject" class="form-control" required="required" value="{{$contact->subject}}" placeholder="Subject">
                                </div>
                                <label for="message" class="col-sm-2 control-label">Content</label>
                                <div class="form-group col-md-10">
                                    <textarea name="message" id='message' id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here">{{$contact->message}}</textarea>
                                </div>
                            </form>
                        </div>

                        <div class="reply-form">
                    
                                <form action='/dashboard/contacts/reply' id="main-contact-form" class="contact-form row" method="POST">
                                   {{csrf_field()}}
                                    
                                    <input type="hidden" name='name' value='Eshopper .inc'>
                                    <input type="hidden" name='email' value='eshopper@gmail.com'>
                                    <input type="hidden" name='subject' value='Reply'>
                                    <input type="hidden" name='to' value='{{$contact->email}}'>
                                    <input type="hidden" name='approve' value='1'>
                                    <label for="reply" class="col-sm-2 control-label">Reply</label>
                                    <div class="form-group col-md-10">
                                        <textarea name="message" id="reply" required="required" class="form-control" rows="8" placeholder="Your Reply Here"></textarea>
                                    </div>
                                    <div class="form-group col-sm-2 col-sm-offset-2">
                                    <input type="submit" class="btn btn-info" value="Reply">
                                    </div>
                                </form>
                        </div>
                    </div>
                  			
                </div>
                         
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
