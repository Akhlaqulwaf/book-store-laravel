@extends('user/layouts/app') @section('content')
<div class="w-full my-4 px-[2rem] md:px-[3rem]">
        <div class="flex justify-between items-center font-semibold">
            <h1 class="uppercase">Detail Pesanan</h1>
        </div>

        <div
            class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-5 mb-4"
        >
            <table
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
            >
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
                @endif
            </table>
            <div class="px-[3rem] mb-3"></div>
        </div>
        <div class="flex justify-between items-center font-semibold mt-5">
            <h1 class="uppercase">Detail Pesanan Product</h1>
        </div>
        <table class="w-full mt-3 text-left text-sm font-thin table-fixed">
            <thead class="border-b border-gray-300">
                <tr>
                    <th class="px-3 py-3">No</th>
                    <th class="px-3 py-3">Image</th>
                    <th class="px-3 py-3">Product Name</th>
                    <th class="px-3 py-3">Qty</th>
                    <th class="px-3 py-3">Total</th>
                </tr>
            </thead>
            <tbody class="border-b border-gray-300 text-[14px] pt-4">
                <?php $no=1 ?> @foreach($detail_order as $order)
                <tr>
                    <td class="px-3 py-3">{{$no++}}</td>
                    <td class="px-3 py-3">
                        <img
                        src="{{asset('storage/'. $order->image)}}"
                        class="max-w-[40px]"
                        alt=""
                    /></td>
                    <td class="px-3 py-3">{{$order->productName}}</td>
                    <td class="px-3 py-3">{{$order->qty}}</td>
                    <td class="px-3 py-3">{{$order->subtotal}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
