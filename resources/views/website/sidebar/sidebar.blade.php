<div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="/products/search?category_id={{$category->id}}">
                                {{$category->name}}
                            </a>
                            @if($category->brands->count() > 0)
                            <a data-toggle="collapse" data-parent="#accordian" href="#{{$category->name}}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            </a>
                            @endif
                            {{$category->name}}
                        </a>
                    </h4>
                </div>
                @if($category->brands->count() > 0)
                    <div id="{{$category->name}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($category->brands as $brand)
                                    <li><a href="/products/search?category_id={{$category->id}}&brand_id={{$brand->id}}">{{$brand->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
        </div><!--/category-products-->
    
        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                   
                    @foreach($brands->groupBy('name') as $brand)
                        <li><a href="/products/search?brand_id={{$brand[0]->id}}"> <span class="pull-right"><span class="badge">{{$brand[0]->products->count()}}</span></span>{{$brand[0]->name}}</a></li>
                    @endforeach    
                </ul>
            </div>
        </div><!--/brands_products-->
        
        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
            
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="{{maxPrice()}}" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                <b style='margin-bottom:20px' class="pull-left">$ 0</b> <b class="pull-right">$ {{maxPrice()}}</b>
                <input type="submit" class="btn btn-block btn-warning" value="Find">
                
            </div>
        </div><!--/price-range-->
        @foreach($advertisements as $advertisement)
            <div class="shipping text-center"><!--shipping-->
                <a href='{{$advertisement->url}}' target="_blank"><img src="{{asset('storage/storage/uploads/images/advertisements/' . $advertisement->image)}}" alt="" /></a>
            </div><!--/shipping-->
        @endforeach
    </div>