@extends('layouts.app')
@section('title')
    Cart    
@endsection
@section('header')

@endsection

@section('content')
            
    <section id="cart_items">
        <div class="container">
            
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                            <?php
                                $product = $products->find($cart->product_id);
                            ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{asset('storage/storage/uploads/images/products/' . $product->image)}}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$product->name}}</a></h4>
                                    <p>Web ID: {{$product->user->id}}</p>
                                </td>
                                <td class="cart_price">
                                    <p id='price'>${{$product->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        
                                    <input style='width:60px;' id = 'increase' type='number' class="cart_quantity_input" type="text" name="quantity" min="1" max="{{$product->quantity}}" autocomplete="off" size="2">
                                        
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">${{$product->price}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="cart/{{$cart->id}}/delete"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                           
                    </tbody>
                    
                </table>
                {{$carts->links()}}
            </div>
        </div>
    </section> <!--/#cart_items-->

@endsection
@section('footer')
<script src='{{asset('custom/custom.js')}}'></script>
@endsection 