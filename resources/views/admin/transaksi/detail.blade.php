@extends('admin/layouts/index') @section('content')
<div class="w-full px-[1rem] md:px-[2rem] my-2">
    <div class="font-semibold">
        <h1 class="">Detail Pesanan</h1>
    </div>

    <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-3 mb-4"
    >
        <table class="w-full text-[14px] text-left text-gray-700">
            <tr>
                <td class="py-1 w-[30%] px-4">Invoice</td>
                <td class="py-1">:</td>
                <td class="py-1">{{$order->invoice}}</td>
            </tr>
            <tr>
                <td class="py-1 w-[30%] px-4">Metode Pembayaran</td>
                <td class="py-1">:</td>
                <td class="py-1">{{$order->metode_pembayaran}}</td>
            </tr>
            <tr>
                <td class="py-1 w-[30%] px-4">Status Pesanan</td>
                <td class="py-1">:</td>
                <td class="py-1">{{$order->statusName}}</td>
            </tr>
            <tr>
                <td class="py-1 w-[30%] px-4">Total</td>
                <td class="py-1">:</td>
                <td class="py-1">
                    {{number_format($order->subtotal,2,',','.')}}
                </td>
            </tr>
            <tr>
                <td class="py-1 w-[30%] px-4">Phone</td>
                <td class="py-1">:</td>
                <td class="py-1">{{$order->phone}}</td>
            </tr>
            @if($order->pesan != null)
            <tr>
                <td class="py-1 w-[30%] px-4">Message</td>
                <td class="py-1">:</td>
                <td class="py-1">{{$order->pesan}}</td>
            </tr>
            @endif @if($order->bukti_bayar != null)
            <tr>
                <td class="py-1 w-[30%] px-4">Bukti Pembayaran</td>
                <td class="py-1">:</td>
                <td class="py-1">
                    <img
                        src="{{asset('storage/'.$order->bukti_bayar)}}"
                        class="max-w-[5rem]"
                        alt=""
                    />
                </td>
            </tr>
            @endif @if($order->status_order_id == 2)
            <tr>
                <td class="py-2 px-[1rem]">
                    <a
                        href="{{route('admin.transaksi.tolak', ['id' => $order->id])}}"
                        class="py-3 px-5 bg-pink-500"
                    >
                        tolak</a
                    >
                    <a
                        href="{{route('admin.transaksi.konfirmasi', ['id' => $order->id])}}"
                        class="py-3 px-5 bg-pink-500"
                        >konfirm</a
                    >
                </td>
            </tr>
            @endif
        </table>
    </div>
    <div class="font-semibold mt-5">
        <h1 class="">Detail Pesanan Product</h1>
    </div>

    <div class="relative overflow-x-auto border shadow-md sm:rounded-lg mt-3">
        <table class="w-full text-center text-[14px]">
            <thead class="border-b">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Gambar</th>
                    <th class="px-6 py-3">Nama Produk</th>
                    <th class="px-6 py-3">Qty</th>
                    <th class="px-6 py-3">Total</th>
                </tr>
            </thead>
            <tbody class="border-b">
                @php $nos=1 @endphp @foreach($detailOrder as $datas)
                <tr>
                    <td class="px-6 py-4">
                        {{$nos++}}
                    </td>
                    <td class="px-6 py-4">
                        <img
                            src="{{asset('storage/'. $datas->image)}}"
                            class="max-w-[50px] mx-auto"
                            alt=""
                        />
                    </td>
                    <td class="px-6 py-4">
                        {{$datas->productName}}
                    </td>
                    <td class="px-6 py-4">
                        {{$datas->qty}}
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($datas->qty * $datas->harga,2,',','.')}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
