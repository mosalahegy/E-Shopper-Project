
<form class="form-horizontal" action="/dashboard/sliders/{{$slider->id}}" method='POST' enctype='multipart/form-data'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH" />
    <div class="box-body">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name='name' value="{{$slider->name}}" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="inputDescription" class="col-sm-2 control-label">Description</label>

            <div class="col-sm-10">
                <textarea class="form-control" id="inputDescription" name='description' value='' placeholder="Description">{{$slider->description}}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Approval</label>
            <div class="col-sm-10">
                <select class="form-control select2 select2-hidden-accessible" name='approve' style="width: 100%;" tabindex="-1" aria-hidden="true">
                <option value='1' {{ $slider->approve == '1' ? 'selected' : '' }} >Approve</option>
                <option value='0' {{ $slider->approve == '0' ? 'selected' : '' }} >Disable</option>
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
                      
                <img style='width:100px;border:1px solid #EEE;margin-top:5px;' src="{{asset('storage/storage/uploads/images/sliders/' . $slider->image)}}">
            </div>
            
        </div>
    </div>
    
    <div class="box-footer">
    <input type="submit" class="btn btn-default" value="Cancel">
    <button type="submit" class="btn btn-info pull-right"><i class='fa fa-edit'></i> Edit</button>
    </div>

</form>