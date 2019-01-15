
<form class="form-horizontal" action="/dashboard/products/{{$product->id}}" method='POST' enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH" />
    <div class="box-body">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Product Name</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name='name' value='{{ $product->name }}' placeholder="Product Name">
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
                <textarea class="form-control" id="inputDescription" name='description' placeholder="Description">{{ $product->description }}</textarea>
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
                <input type="text" class="form-control" id="inputPrice" name='price' value='{{ $product->price }}' placeholder="Price">
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
                <input type="text" class="form-control" id="inputQuantity" name='quantity' value='{{ $product->quantity }}' placeholder="quantity">
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
                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
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
                        <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
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
                    <option value='0' {{ $product->approve == 0 ? 'selected' : '' }}>Disabled</option>
                    <option value='1' {{ $product->approve == 1 ? 'selected' : '' }}>Approved</option>
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
                    <option value='0' {{ $product->status == 0 ? 'selected' : '' }}>New [ Less than 1 Month]</option>
                    <option value='1' {{ $product->status == 1 ? 'selected' : '' }}>Medium [ 1 Month to 5 Months]</option>
                    <option value='2' {{ $product->status == 2 ? 'selected' : '' }}>Old [ More than 5 Months]</option>
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
                <input type="text" class="form-control" id="Rating" name='rating' value='{{ $product->rating }}' placeholder="Rating">
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
                <input type="text" class="form-control" id="inputCountry" name='country' value='{{ $product->country }}' placeholder="Country">
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
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif

                <img style='width:100px;border:1px solid #EEE;margin-top:5px;' src="{{asset('storage/storage/uploads/images/products/' . $product->image)}}">
            
            </div>
        </div>
    
    </div>
    
    <div class="box-footer">
        @if(Auth::user()->id == $product->user->id)
            <input type="submit" class="btn btn-default" value="Cancel">
            <button type="submit" class="btn btn-info pull-right"><i class='fa fa-edit'></i> Edit</button>
        @endif
    </div>

</form>