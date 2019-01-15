@extends('layouts.app')
@section('title')
Products
@endsection
@section('header')

@endsection

@section('content')
    
    <section id="advertisement">
		<div class="container">
			<img src="{{asset('website/images/shop/advertisement.jpg')}}" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('website.sidebar.sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Products</h2>
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
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
					
						<div class="clearfix"></div>
                        {{$products->links()}}
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	

@endsection