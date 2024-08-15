<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-10 p-10">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-label> Name </x-label>
                    <x-input name="name" type="text" class="mb-3"> </x-input>
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <x-label> Price </x-label>
                    <x-input name="price" type="number" class="mb-3"></x-input>
                    @error('price')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <x-label> Stock </x-label>
                    <x-input name="stock" type="number" class="mb-3"></x-input>
                    @error('stock')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <x-label> Active </x-label>
                    <select name="isActive"
                        class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option disabled>Select ones</option>
                        <option value="1" selected>Active</option>
                        <option value="2">Inactive</option>
                    </select>
                    @error('isActive')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <x-label> Image </x-label>
                    <x-input name="image" type="file" class="mb-3"></x-input>
                    @error('image')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <x-button class="bg-blue-500 float-end m-5">Tambah</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
