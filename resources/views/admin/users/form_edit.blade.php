
<form class="form-horizontal" action="/dashboard/users/{{$user->id}}" method='POST' enctype='multipart/form-data'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH" />
    <div class="box-body">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name='name' value="{{$user->name}}" placeholder="Full Name">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name='email' value="{{$user->email}}" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group">
            <label for="inputPassword1" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword1" name='password' value="{{$user->password}}"  placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword2" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword2" name='password-confirm' value="{{$user->password}}" placeholder="Confirm Password">
                @if ($errors->has('password-confirm'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password-confirm') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label">Position</label>
                <div class="col-sm-10">
                    <select class="form-control select2 select2-hidden-accessible" name='isAdmin'style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value='1' {{$user->isAdmin == 1 ? 'selected' : ''}}>Admin</option>
                    <option value='2' {{$user->isAdmin == 2 ? 'selected' : ''}}>Moderator</option>
                    <option value='3' {{$user->isAdmin == 3 ? 'selected' : ''}}>Editor</option>
                    <option value='4' {{$user->isAdmin == 4 ? 'selected' : ''}}>User</option>
                    </select>
                    @if ($errors->has('isAdmin'))
                        <span class="help-block">
                            <strong>{{ $errors->first('isAdmin') }}</strong>
                        </span>
                    @endif
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Approval</label>
            <div class="col-sm-10">
                <select class="form-control select2 select2-hidden-accessible" name='approve' style="width: 100%;" tabindex="-1" aria-hidden="true">
                <option value='1' {{$user->approve == 1 ? 'selected' : ''}}>Approve</option>
                <option value='0' {{$user->approve == 0 ? 'selected' : ''}}>Disable</option>
                </select>
                @if ($errors->has('approve'))
                    <span class="help-block">
                        <strong>{{ $errors->first('approve') }}</strong>
                    </span>
                @endif            
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">User Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name='image'>
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif      
                      
                <img style='width:100px;border:1px solid #EEE;margin-top:5px;' src="{{asset('storage/storage/uploads/images/users/' . $user->image)}}">
            </div>
            
        </div>
    </div>
    
    <div class="box-footer">
    <input type="submit" class="btn btn-default" value="Cancel">
    <button type="submit" class="btn btn-info pull-right"><i class='fa fa-edit'></i> Edit</button>
    </div>

</form>