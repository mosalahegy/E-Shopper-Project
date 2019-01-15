@extends('layouts.app')

@section('title')
Home
@endsection
@section('header')

@endsection

@section('content')
    @include('website.slider.slider')
	<section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        @include('website.sidebar.sidebar')
                    </div>
                    
                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">features products</h2>

                            @foreach($products as $product)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('storage/storage/uploads/images/products/' . $product->image)}}" alt="" />
                                                    <h2>${{$product->price}}</h2>
                                                    <p>{{$product->description}}</p>
                                                    <a href="/add-to-cart/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    <a href="/single/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>Check</a>
                                                    
                                                </div>
                                                <div class="product-overlay">
                                                    <div class="overlay-content">
                                                        <h2>${{$product->price}}</h2>
                                                        <p>{{$product->description}}</p>
                                                        <a href="/add-to-cart/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        <a href="/single/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>Check</a>
                                                    
                                                    </div>
                                                </div>
                                            @if($product->quantity == 0)
                                                <img src="{{asset('website/images/home/sale.png')}}" class="new" alt="" />                                            
                                            @elseif($product->status == 0)
                                                <img src="{{asset('website/images/home/new.png')}}" class="new" alt="" />                                            
                                            @endif
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="/add-to-wishlist/{{$product->id}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                               
                            @endforeach
                            <div class='clearfix'></div>
                            {{$products->links()}}
                        </div><!--features_items-->
                        
                        <div class="category-tab"><!--category-tab-->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <?php $i = 0; ?>
                                    @foreach($categories as $category)
                                        @if($category->products->count() >= 4)
                                            <li class="{{$i == 0 ? 'active':''}}"><a href="#{{$category->name}}" data-toggle="tab">{{$category->name}}</a></li>
                                        @endif
                                        <?php $i++; ?>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="tab-content">
                                <?php $i = 0; ?>                               
                                @foreach($categories as $category)
                                    <div class="tab-pane fade {{$i == 0 ? 'active in':''}}" id="{{$category->name}}" >
                                        <?php $i++;?>
                                        @if($category->products->count() >= 4)
                                            @foreach($category->products->take(4) as $product)
                                                <div class="col-sm-3">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <img style='height:170px;' src="{{asset('storage/storage/uploads/images/products/'.$product->image)}}" alt="" />
                                                                <h2>${{$product->price}}</h2>
                                                                <p>{{$product->description}}</p>
                                                                <a href="/add-to-cart/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                            </div> 
                                                            @if($product->quantity == 0)
                                                                <img src="{{asset('website/images/home/sale.png')}}" class="new" alt="" />                                            
                                                            @elseif($product->status == 0)
                                                                <img src="{{asset('website/images/home/new.png')}}" class="new" alt="" />                                            
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                               
                            </div>
                        </div>
                
                        @include('website.recommended.recommended')
                        
                    </div>
                </div>
            </div>
        </section>
        
@endsection