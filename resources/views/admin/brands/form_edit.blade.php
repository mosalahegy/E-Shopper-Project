
<form class="form-horizontal" action="/dashboard/brands/{{$brand->id}}" method='POST'>
    {{csrf_field()}}
    <input type='hidden' name='_method' value="PATCH" />
    <div class="box-body">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Brand Name</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name='name' value='{{$brand->name}}' placeholder="Category Name">
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
                <textarea class="form-control" id="inputDescription" name='description' value='' placeholder="Description">{{$brand->description}}</textarea>
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
                    <option value='0' {{$brand->approve == 0 ? 'selected' : ''}}>Disabled</option>
                    <option value='1' {{$brand->approve == 1 ? 'selected' : ''}}>Approved</option>
                </select>
                @if ($errors->has('approve'))
                    <span class="help-block">
                        <strong>{{ $errors->first('approve') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
                <select class="form-control select2 select2-hidden-accessible" name='category_id' style="width: 100%;" tabindex="-1" aria-hidden="true">
                    @foreach($categories as $category)
                        <option value='{{$category->id}}' {{$category->id == $brand->category_id ? 'selected':''}}>{{$category->name}}</option>
                    @endforeach  
                </select>
                @if ($errors->has('approve'))
                    <span class="help-block">
                        <strong>{{ $errors->first('approve') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
    </div>
    
    <div class="box-footer">
    <input type="submit" class="btn btn-default" value="Cancel">
    <button type="submit" class="btn btn-info pull-right"><i class='fa fa-edit'></i> Edit</button>
    </div>

</form>