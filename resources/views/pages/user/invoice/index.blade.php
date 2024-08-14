<x-guest-layout :header="false">
    <div class="container my-auto">
        <div class="card">
            <div class="card-header text-2xl">
                Transaction
            </div>
            <div class="card-body">
                <p class="text-xl my-1 border-t border-b py-3">User Information</p>
                <table>
                    <tr>
                        <td>
                            Nama
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $transaksi->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $transaksi->user->email }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ID Transaksi
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $transaksi->id }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Status :
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $transaksi->status }}
                        </td>
                    </tr>
                </table>
                <p class="text-xl my-1 border-t border-b py-3">Details Transaction</p>
                <table class=" mt-3 w-full text-center text-md rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 h-16 font-extrabold">
                        <tr>
                            <td>No</td>
                            <td>Product Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi->transaksiDetail as $transaksiDetail)
                            <tr class="bg-white border-b h-16">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $transaksiDetail->product->name }}</td>
                                <td>{{ $transaksiDetail->quantity }}</td>
                                <td>{{ $transaksiDetail->price }}</td>
                                <td>{{ $transaksiDetail->sub_total }}</td>
                            </tr>
                        @endforeach
                        <tr class="font-black">
                            <td colspan="4" class="text-right">Total</td>
                            <td>{{ $transaksi->total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a class="button float-end" href="/">Back To Home</a>
            </div>
        </div>
    </div>
</x-guest-layout>
