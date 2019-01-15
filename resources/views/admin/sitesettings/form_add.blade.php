
<form class="form-horizontal" action="/dashboard/users/" method='POST' enctype='multipart/form-data'>
    {{csrf_field()}}
    <div class="box-body">
        <div class="form-group">
            <label for="setting_name" class="col-sm-2 control-label">Setting Name</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="setting_name" name='setting_name' placeholder="Setting Name">
                @if ($errors->has('setting_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('setting_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="slug" class="col-sm-2 control-label">Slug</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="slug" name='slug' placeholder="Slug">
                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>
        </div>
       
        <div class="form-group">
                <label class="col-sm-2 control-label">Setting Type</label>
                <div class="col-sm-10">
                    <select class="set-type form-control select2 select2-hidden-accessible select-type" name='type'style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected">--</option>
                        <option class='opt1' value='1' data-value="1">Short Text</option>
                        <option class='opt2' value='2' data-value="2" >Long Text</option>
                        <option class='opt3' value='3' data-value="3" >File Upload</option>
                    </select>
                    @if ($errors->has('type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                </div>
        </div>
        <div class="form-group set_short" style="display:none;">
            <label for="set_value" class="col-sm-2 control-label">Setting Value</label>

            <div class="col-sm-10 set_shor">
                <textarea  class="form-control" id="set_value" name='set_value' placeholder="Setting Value"></textarea>
                @if ($errors->has('set_value'))
                    <span class="help-block">
                        <strong>{{ $errors->first('set_value') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group set_long" style="display:none;">
            <label for="set_value" class="col-sm-2 control-label">Setting Value</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="set_value" name='set_value' placeholder="Setting Value">
                @if ($errors->has('set_value'))
                    <span class="help-block">
                        <strong>{{ $errors->first('set_value') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group set_image" style="display:none;">
            <label for="image" class="col-sm-2 control-label">Setting Image</label>
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