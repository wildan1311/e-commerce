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
                <h4 class="col_blue">Our Product</h4>
                <h1 class="mt-3 mb-0">Best Seller Product</h1>
            </div>
        </div>
        <div class="row list_2">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="list_2im clearfix bg-white shadow_box position-relative">
                        <div class="list_2im1 clearfix">
                            <div class="grid clearfix">
                                <figure class="effect-jazz mb-0 w-[270px] h-[270px]">
                                    <a href="detail.html"><img src="img/6.jpg" class="w-full object-cover"
                                            alt="abc"></a>
                                </figure>
                            </div>
                        </div>

                        <div class="list_2im2 clearfix p-3 text-center">
                            <h4>{{ $product->name }}</h4>
                            <h5>Rp.{{ $product->price }}</h5>
                            <h6 class="mb-0 mt-3 text-uppercase"><button class="button" id="{{ $product->id }}"
                                    onclick="addCart({{ $product->id }})"><i class="fa fa-shopping-cart me-1"></i> Add
                                    To Cart</button></h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @push('js')
        <script>
            function addCart(id) {
                // prevent
                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.add') }}',
                    data: {
                        'product_id': id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        alert(data.message);
                        window.location.reload();
                    }
                });


            }
        </script>
    @endpush
</x-guest-layout>
