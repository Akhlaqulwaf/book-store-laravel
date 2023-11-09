@extends('user/layouts/app') @section('content')
<div class="w-full px-[2rem] md:px-[5rem] py-[2rem]">
    <div>
        <div class="w-[5rem] py-1 bg-gray-400 rounded-md">
            <h1 class="text-center">Payment</h1>
        </div>
        <table class="w-full mt-3 text-left text-sm font-thin table-fixed">
            <thead class="border-b border-gray-300">
                <tr>
                    <th class="py-3">Invoice</th>
                    <th class="py-3">Total</th>
                    <th class="py-3">Status</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <tbody class="border-b border-gray-300 text-[14px] pt-4">
                @foreach($order as $order)
                <tr>
                    <td class="py-3">{{$order->invoice}}</td>
                    <td class="py-3">{{$order->subtotal}}</td>
                    <td class="py-3">{{$order->name}}</td>
                    <td class="py-3 text-left">
                        <div class="flex">
                            <a
                                href="{{route('user.order.batal', ['id' => $order->id])}}"
                                class="font-medium text-white hover:underline w-[5rem] py-1 bg-red-400 rounded-sm mr-2 flex justify-center items-center"
                                >Cancel</a
                            >
                            <a
                                href="{{route('user.order.bayar', ['id' => $order->id])}}"
                                class="font-medium text-white hover:underline w-[5rem] py-1 bg-green-300 rounded-sm mr-2 flex justify-center items-center"
                                >Payment</a
                            >
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-7">
        @if($orderCondition->status_order_id == 2)
        <div class="w-[10rem] py-1 bg-gray-400 rounded-md">
            <h1 class="text-center">Process Check</h1>
        </div>
        @endif @if($orderCondition->status_order_id == 3)
        <div class="w-[7rem] py-1 bg-pink-300 rounded-md">
            <h1 class="text-center">Done</h1>
        </div>
        @endif
        <table class="w-full text-left mt-3 text-sm font-thin table-fixed">
            @if($orderCondition->status_order_id == 2)
            <thead class="border-b border-gray-300">
                <tr>
                    <th class="py-3">Invoice</th>
                    <th class="py-3">Total</th>
                    <th class="py-3">Status</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <tbody class="border-b border-gray-300">
                @foreach($cek_order as $cekOrder)
                <tr>
                    <td class="py-3">{{$cekOrder->invoice}}</td>
                    <td class="py-3">{{$cekOrder->subtotal}}</td>
                    <td class="py-3">{{$cekOrder->name}}</td>
                    <td class="py-3">
                        <a
                            href="{{route('user.order.detail', ['id' => $cekOrder->id])}}"
                            class="font-medium text-white hover:underline w-[45px] h-[25px] bg-green-300 rounded-sm mr-2 flex justify-center items-center"
                            >Detail</a
                        >
                    </td>
                </tr>
                @endforeach
            </tbody>
            @endif @if($orderCondition->status_order_id == 3)
            <thead class="border-b border-gray-300">
                <tr>
                    <th class="py-3">Invoice</th>
                    <th class="py-3">Total</th>
                    <th class="py-3">Status</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <tbody class="border-b border-gray-300">
                @foreach($dibayar as $orderSelesai)
                <tr>
                    <td class="py-3">{{$orderSelesai->invoice}}</td>
                    <td class="py-3">{{$orderSelesai->subtotal}}</td>
                    <td class="py-3">{{$orderSelesai->name}}</td>
                    <td class="py-3">
                        <a
                            href="{{route('user.order.selesai', ['id' => $orderSelesai->id])}}"
                            class="font-medium text-white hover:underline w-[45px] h-[25px] bg-green-300 rounded-sm mr-2 flex justify-center items-center"
                            >Done</a
                        >
                    </td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
    <div class="mt-7">
        <div class="w-[4rem] py-1 bg-gray-400 rounded-md">
            <h1 class="text-center">Histori</h1>
        </div>
        <table class="w-full mt-3 text-left text-sm font-thin table-fixed">
            <thead class="border-b border-gray-300">
                <tr>
                    <th class="py-3">Invoice</th>
                    <th class="py-3">Total</th>
                    <th class="py-3">Status</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <tbody class="border-b border-gray-300 text-[14px] pt-4">
                @foreach($histori as $orderHistori)
                <tr>
                    <td class="py-3">{{$orderHistori->invoice}}</td>
                    <td class="py-3">{{$orderHistori->subtotal}}</td>
                    <td class="py-3">{{$orderHistori->name}}</td>
                    <td class="py-3 text-left">
                        <div class="flex">
                            <a
                                href="{{route('user.order.detail', ['id' => $orderHistori->id])}}"
                                class="font-medium text-white hover:underline w-[45px] h-[25px] bg-green-300 rounded-sm mr-2 flex justify-center items-center"
                                >Detail</a
                            >
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
