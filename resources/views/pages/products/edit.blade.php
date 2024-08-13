<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-10">
                <form action="{{route('products.update', $product->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <x-label> Name </x-label>
                    <x-input name="name" type="text" value="{{$product->name}}"> </x-input>
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <x-label> Price </x-label>
                    <x-input name="price" type="number"  value="{{$product->price}}"></x-input>
                    @error('price')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <x-label> Stock </x-label>
                    <x-input name="stock" type="number"  value="{{$product->stock}}"></x-input>
                    @error('stock')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <x-label> Active </x-label>
                    <select name="isActive" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected disabled>Select ones</option>
                        <option value="1" {{$product->isActive == 1 ? 'selected' : ''}}>Active</option>
                        <option value="0" {{$product->isActive != 1? 'selected' : ''}}>Inactive</option>
                      </select>
                      @error('isActive')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <x-button class="bg-blue-500 float-end m-5">Edit</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
