
<form class="form-horizontal" action="/dashboard/advertisements/" method='POST' enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="box-body">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Advertisement Name</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name='name' value='{{ old('name') }}' placeholder="Advertisement Name">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-sm-2 control-label">Approval</label>
            <div class="col-sm-10">
                <select class="form-control select2 select2-hidden-accessible" name='approve' style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value='0' >Disabled</option>
                    <option value='1' >Approved</option>
                </select>
                @if ($errors->has('approve'))
                    <span class="help-block">
                        <strong>{{ $errors->first('approve') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">URL</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputUrl" name='url' value='{{ old('url') }}' placeholder="URL">
                @if ($errors->has('url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Advertisement Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name='image'>
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif            
            </div>
        </div>
        
    </div>
    
    <div class="box-footer">
    <input type="submit" class="btn btn-default" value="Cancel">
    <button type="submit" class="btn btn-info pull-right"><i class='fa fa-plus-circle'></i> Add</button>
    </div>

</form>