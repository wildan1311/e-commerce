<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('products.create')}}" class="rounded-2xl px-5 bg-lime-500 text-md text-white p-3">Tambah</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-10">
                <table class="w-full text-center text-md rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Active</td>
                            <td>Stock</td>
                            <td>Price</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="bg-white border-b h-16">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $product->name }}</td>
                                <td>{{ $product->isActive }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->price }}</td>
                                <td class="gap-3 w-56">
                                    <a href="{{ route('products.edit', $product->id) }}" class="rounded-2xl px-5 bg-blue-500 text-md text-white p-2 inline">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="rounded-2xl px-5 bg-red-500 text-md text-white p-2 inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
