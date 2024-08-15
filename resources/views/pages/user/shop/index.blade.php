<x-guest-layout>
    <div class="container-xl my-5">
        <div class="row about_h1 text-center mb-4">
            <div class="col-md-12">
                <h4 class="col_blue text-lg font-black">Our Product</h4>
                <h1 class="mt-3 mb-0">Best Seller Product</h1>
            </div>
        </div>
        <form class="max-w-md mx-auto my-3">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <input type="search" id="default-search" name="search" value="{{request()->search ?? ''}}"
                    class="block w-full p-4 ps-20 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search Products" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
        <div class="row list_2">
            @foreach ($products as $product)
                <div class="col-md-3 mt-2">
                    <div class="list_2im clearfix bg-white shadow_box position-relative">
                        <div class="list_2im1 clearfix">
                            <div class="grid clearfix">
                                <figure class="effect-jazz mb-0 w-[270px] h-[270px]">
                                    <a href="#"><img src="{{asset('storage/'. $product->image)}}" class="w-full object-cover"
                                            alt="abc"></a>
                                </figure>
                            </div>
                        </div>

                        <div class="list_2im2 clearfix p-3 text-center">
                            <h4>{{ $product->name }}</h4>
                            <span class="text-sm">Stock : {{$product->stock}}</span>
                            <h5>Rp.{{ $product->price }}</h5>
                            <h6 class="mb-0 mt-3 text-uppercase"><button @disabled($product->stock < 1 || $product->isActive == 0) class="button disabled:bg-slate-400 disabled:hover:bg-slate-400 border-none" id="{{ $product->id }}"
                                    onclick="addCart({{ $product->id }})"><i class="fa fa-shopping-cart me-1"></i> Add
                                    To Cart</button></h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $products->links() !!}
    </div>
    @push('js')
        <script>
            function addCart(id) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.add') }}',
                    data: {
                        'product_id': id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        Toast.fire({
                            icon: data.status,
                            title: data.message
                        })
                    }
                });


            }
        </script>
    @endpush
</x-guest-layout>
