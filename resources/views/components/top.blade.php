<section id="top" class="bg_light pt-3 pb-3">
    <div class="container-xl">
        <div class="row top_1">
            <div class="col-md-3 my-auto">
                <div class="top_1l pt-1">
                    <h2 class="mb-0"><a href="index.html"><i class="fa fa-recycle col_blue align-middle"></i>
                            EZECT <br> <span class="font_14 text-muted fw-normal">Electric Store</span></a></h2>
                </div>
            </div>
            <div class="col-md-9">
                <div class="top_1r text-end">
                    <ul class="mb-0 flex items-center justify-end">
                        @auth
                            <li class=" dropdown  d-inline-block mx-3">
                                <a class="dropdown-toggle  nav_hide" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-shopping-bag fs-4 col_blue"></i>
                                </a>
                                <ul class="dropdown-menu drop_cart" aria-labelledby="navbarDropdown" style="">
                                    <li>
                                        <div class="drop_1i row">
                                            <div class="col-md-6 col-6">
                                                <div class="drop_1il">
                                                    <h5>{{ count($carts) }} ITEMS</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($carts as $cart)
                                            <div class="drop_1i1 row">
                                                <div class="col-md-6 col-6">
                                                    <div class="drop_1i1l">
                                                        <h6><a href="#">{{ $cart['name'] }}</a> <br> <span
                                                                class="fw-normal d-inline-block mt-1">{{ $cart['quantity'] }}x
                                                                - Rp.{{ $cart['price'] }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <div class="drop_1i1r w-10 h-10"><a href="#"><img src="{{asset('storage/'. @$cart['image'])}}"
                                                                class="w-100" class="object-cover" alt="abc"></a></div>
                                                </div>
                                                <div class="col-md-2 col-2" onclick="deleteCart({{$cart['id']}})">
                                                    <div class="drop_1i1l text-end">
                                                        <h6> <span><i class="fa fa-trash"></i></span></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if (count($carts) > 0)
                                            <div class="drop_1i3 text-center row">
                                                <div class="col-md-12 col-12">
                                                    <h6><a class="button_1 d-block" href="{{ route('cart') }}">SHOPPING
                                                            CART</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        @endauth
                        <li>
                            @if (Route::has('login'))
                                <div class="p-6 flex items-center">
                                    @auth()
                                        @if (auth()->user()->role == 'admin')
                                            <a href="{{ url('/dashboard') }}"
                                                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-yellow-500">Dashboard</a>
                                        @endif
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-yellow-500">Log
                                            in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-yellow-500">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
