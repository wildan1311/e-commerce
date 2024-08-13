<x-guest-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <tr></tr>
                </table>
            </div>
        </div>
    </div> --}}
    <div class="container-xl">
        <div class="row about_h1 text-center mb-4">
            <div class="col-md-12">
                <h4 class="col_blue">Cart</h4>
                <h1 class="mt-3 mb-0">Best Seller Product</h1>
            </div>
        </div>

        <section id="cart_page" class="cart pt-4 pb-4">
            <div class="container-xl">
                <div class="cart_2 row">
                    <div class="col-md-6">
                        <h5>MY CART</h5>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-end text-uppercase"><a href="#">Continue Shopping</a></h5>
                    </div>
                </div>
                <div class="cart_3 row mt-3">
                    <div class="col-md-8">
                        <div class="cart_3l">
                            <h6>PRODUCT</h6>
                        </div>
                        @foreach ($carts as $cart)
                            <div class="cart_3l1 mt-3 row ms-0 me-0">
                                <div class="col-md-3 ps-0 col-3">
                                    <div class="cart_3l1i">
                                        <a href="#"><img src="img/9.jpg" alt="abc" class="w-100"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-9">
                                    <div class="cart_3l1i1">
                                        <h6 class="fw-normal font_12 mt-3">{{$cart['name']}}</h6>
                                        <h6 class="font_12 mt-3">Vendor</h6>
                                        <h5 class="col_yell mt-3">Rp.{{$cart['price']}}</h5>
                                        <h6 class="font_12 mt-3 mb-3">{{$cart['quantity']}}</h6>
                                    </div>
                                    <div class="cart_3l1i2">
                                        <input type="number" min="1" value="{{$cart['quantity']}}" class="form-control inline"
                                            placeholder="Qty" id="qty-{{$cart['id']}}">
                                        <h6><button class="button_1" onclick="deleteCart({{$cart['id']}})">REMOVE</button></h6>
                                        <h6><button class="button" onclick="addCart({{$cart['id']}})">UPDATE CART</button></h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <div class="cart_3r">
                            <h6 class="head_1">SUBTOTAL</h6>
                            <h5 class="text-center col_yell mt-3">{{collect($carts)->sum(function($cart){
                                return $cart['price'] * $cart['quantity'];
                            })}}</h5>
                            <hr>
                            <h6 class="text-center mt-3"><a class="button" href="{{route('cart.checkout')}}">PROCEED TO CHECKOUT</a>
                            </h6><br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('js')
        <script>
            function addCart(id) {
                // prevent
                let qty = document.getElementById('qty-' + id).value;
                console.log(id)
                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.add') }}',
                    data: {
                        'product_id': id,
                        'quantity' : qty,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        alert(data.message);
                        window.location.reload()
                    }
                });
            }

            function deleteCart(id){
                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.destroy') }}',
                    data: {
                        'product_id': id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        alert(data.message);
                        window.location.reload()
                    }
                });
            }
        </script>
    @endpush
</x-guest-layout>
