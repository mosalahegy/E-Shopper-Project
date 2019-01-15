@extends('layouts.app')
@section('title')
Product Details
@endsection
@section('header')

@endsection

@section('content')
    	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('website.sidebar.sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset('storage/storage/uploads/images/products/' . $product->image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
                                        <?php $i=0;?>
                                        <div class="item {{$i == 0 ? 'active' : ''}}">
                                        @foreach($products as $key => $prod)
                                            @if($key % 3 == 0 && $key != 0)
                                                </div>
                                                <div class="item">
                                            @endif
                                            @if($product->id != $prod->id)
                                                <a href="/single/{{$prod->id}}"><img style='width:85px;height:85px;' src="{{asset('storage/storage/uploads/images/products/' . $prod->image)}}" alt=""></a>
                                                <?php $i++;?>
                                            @endif
                                            
                                        @endforeach
                                    </div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                @if($product->status == 0)
                                    <img src="{{asset('website/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                                @endif
								<h2>{{$product->name}}</h2>
								<p>Web ID: {{$product->user->id}}</p>
								<img src="{{asset('website/images/product-details/rating.png')}}" alt="" />
								<span>
									<span>${{$product->price}}</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                                <p><b>Condition:</b> {{status()[$product->status]}}</p>
								<p><b>Brand:</b> {{$product->brand->name}}</p>
								<a href=""><img src="{{asset('website/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					@include('website.recommended.recommended')

				</div>
			</div>
		</div>
	</section>
	

@endsection