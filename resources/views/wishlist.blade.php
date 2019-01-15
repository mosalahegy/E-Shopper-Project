@extends('layouts.app')
@section('title')
    Wishlist    
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
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wishlists as $wishlist)
                            <?php
                                $product = $products->find($wishlist->product_id);
                            ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{asset('storage/storage/uploads/images/products/' . $product->image)}}" alt=""></a>
                                </td>
                                <td style="width:50%" class="cart_description">
                                    <h4><a href="">{{$product->name}}</a></h4>
                                    <p>Web ID: {{$product->user->id}}</p>
                                </td>
                                <td class="cart_price">
                                    <p id='price'>${{$product->price}}</p>
                                </td>
                               
                                
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="wishlist/{{$wishlist->id}}/delete"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                           
                    </tbody>
                    
                </table>
                {{$wishlists->links()}}
            </div>
        </div>
    </section> <!--/#cart_items-->

@endsection
@section('footer')
<script src='{{asset('custom/custom.js')}}'></script>
@endsection 