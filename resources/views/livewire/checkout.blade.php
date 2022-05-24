<div>
    <section class="product-area product-information-area">
        <div class="container">
            <div class="product-information">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="edit-checkout-head">
                            <div class="header-logo-area">
                                <a href="index.html">
                                    <img class="logo-main" src="assets/img/logo.png" alt="Logo">
                                </a>
                            </div>

                        </div>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="edit-checkout-information">
                            <h4 class="title">Contact information</h4>
                            <div class="edit-checkout-form">
                                <h4 class="title">Shipping address</h4>
                                <div class="row row-gutter-12">
                                    <form   method="post" action="{{ route('order.store') }}">
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="phone" placeholder="phone" >
                                                <label for="phone">Phone</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="email" placeholder="email" >
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="col-lg-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="address" placeholder="address" >
                                            <label for="address">Address</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <select class="form-select form-control" id="floatingInput6rid" aria-label="Floating label select example">
                                                <option selected></option>
                                                <option value="1">Afghanistan</option>
                                                <option value="2">Pakistan</option>
                                                <option value="3">Irac</option>
                                            </select>
                                            <div class="field-caret"></div>
                                            <label for="floatingInput6rid">Country/Region</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInput7Grid" placeholder="address" value="">
                                            <label for="floatingInput7Grid">Postal code</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="btn-box">
                                            <button type="button" class="btn-shipping" id="formSubmit">Buy</button>
                                            <a class="btn-return" href="/cart">Return to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="shipping-cart-subtotal-wrapper">
                            <div class="shipping-cart-subtotal">
                                @if(is_countable($cart) && count($cart) > 0)
                                @foreach($cart as $product)
                                    <div class="shipping-cart-item">
                                        <div class="thumb">
                                            <img src="{{$product['image']}}" alt="">
                                            <span class="quantity">{{$product['quantity']}}</span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">{{$product['title']}}</h4>
                                            <span class="price">{{$product['price']}}$</span>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                    <div class="shipping-cart-item">
                                        <div>
                                            <h1 class="title">Корзина пуста</h1>
                                        </div>
                                    </div>
                                @endif
                                <div class="shipping-subtotal">
                                    <p><span>Subtotal</span><span><strong></strong></span></p>
                                    <p><span>Shipping</span><span>Calculated at next step</span></p>
                                </div>
                                <div class="shipping-total">
                                    <p class="total">Total</p>
                                    <p class="price"><span class="usd">USD</span>${{$total}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
