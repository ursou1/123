<div>
    <section class="product-area shopping-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shopping-cart-wrap">
                        <div class="cart-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="indecor-product-remove">Remove</th>
                                    <th class="indecor-product-thumbnail">Image</th>
                                    <th class="indecor-product-name">Product</th>
                                    <th class="indecor-product-price">Price</th>
                                    <th class="indecor-product-quantity">Quantity</th>
                                    <th class="indecor-product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(is_countable($cart) && count($cart) > 0)
                                    @foreach($cart as $product)
                                        <tr>
                                            <td class="indecor-product-remove">
                                                <a wire:click="remove({{ $product['id'] }})"><i class="fa fa-times"></i></a>
                                            </td>
                                            <td class="indecor-product-thumbnail">
                                                <a href="#/"><img src="{{$product['image']}}" alt="Image-HasTech"></a>
                                            </td>
                                            <td class="indecor-product-name">
                                                <h4 class="title"><a href="single-product.html">{{$product['title']}}</a></h4>
                                            </td>
                                            <td class="indecor-product-price"><span class="price">{{$product['price']}} $</span></td>
                                            <td class="indecor-product-quantity" >
                                                <div class="btn-group">
                                                    <button wire:click="decrement({{ $product['id'] }})">-</button>
                                                    <input type="text" id="quantity" title="Quantity" disabled class="w-50" value="{{$product['quantity']}}">
                                                    <button wire:click="increment({{ $product['id'] }})">+</button>
                                                </div>

                                            </td>
                                            <td class="product-subtotal"><span class="price"></span></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div>
                                        <h3>Корзина пуста</h3>
                                    </div>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-7 col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <a class="button" href="/">Continue Shopping</a>
                                        <a class="button" wire:click="clearCart">Clear Cart</a>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-lg-5 col-12">
                                <div class="cart-page-total">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li>Total <span class="money">{{$total}}</span></li>
                                    </ul>
                                    <a class="proceed-to-checkout-btn" href="/checkout">Proceed to Checkout</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Buy
                                    </button>
                                    <wire:modal/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
