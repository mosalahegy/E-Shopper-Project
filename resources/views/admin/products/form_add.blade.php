
<form class="form-horizontal" action="/dashboard/products/" method='POST' enctype='multipart/form-data'>
    {{csrf_field()}}
    <div class="box-body">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Product Name</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name='name' value='{{ old('name') }}' placeholder="Product Name">
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
                <textarea class="form-control" id="inputDescription" name='description' placeholder="Description">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="inputPrice" class="col-sm-2 control-label">Price</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPrice" name='price' value='{{ old('price') }}' placeholder="Price">
                @if ($errors->has('price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="inputQuantity" class="col-sm-2 control-label">Quantity </label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputQuantity" name='quantity' value='{{ old('quantity') }}' placeholder="quantity">
                @if ($errors->has('country'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">In Category</label>
            <div class="col-sm-10">
                <select class="form-control select2 select2-hidden-accessible" name='category_id' style="width: 100%;" tabindex="-1" aria-hidden="true">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Brand</label>
            <div class="col-sm-10">
                <select class="form-control select2 select2-hidden-accessible" name='brand_id' style="width: 100%;" tabindex="-1" aria-hidden="true">
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('brand_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('brand_id') }}</strong>
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
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                <select class="form-control select2 select2-hidden-accessible" name='status' style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value='0' selected="selected">New [ Less than 1 Month]</option>
                    <option value='1' >Medium [ 1 Month to 5 Months]</option>
                    <option value='2' >Old [ More than 5 Months]</option>
                </select>
                @if ($errors->has('status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif            
            </div>
        </div>
    
        <div class="form-group">
            <label for="inputRating" class="col-sm-2 control-label">Rating</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="Rating" name='rating' value='{{ old('rating') }}' placeholder="Rating">
                @if ($errors->has('rating'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rating') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group">
            <label for="inputCountry" class="col-sm-2 control-label">Made In </label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCountry" name='country' value='{{ old('country') }}' placeholder="Country">
                @if ($errors->has('country'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Product Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name='productImage'>
                @if ($errors->has('productImage'))
                    <span class="help-block">
                        <strong>{{ $errors->first('productImage') }}</strong>
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