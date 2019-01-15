<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended products</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $i = 0;?>
            @foreach($categories as $category)
                 @if($category->products->count() >= 3)
                    <div class="item {{$i == 0 ? 'active':''}}">
                        <?php $i++;?>                                            
                        @foreach($category->products->where('rating','>=','8')->take(3) as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img style='height:268px;' src="{{asset('storage/storage/uploads/images/products/' . $product->image)}}" alt="" />
                                            <h2>${{$product->price}}</h2>
                                            <p>{{$product->description}}</p>
                                            <a href="/add-to-cart/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            <a href="/single/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>Check</a>

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items-->