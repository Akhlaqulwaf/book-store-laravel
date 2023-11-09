@extends('admin.layouts.index') @section('content')
<div class="w-full px-[1rem] md:px-[2rem] my-2">
    <div class="font-semibold">
        <h1>Done Order</h1>
    </div>
    <div class="relative overflow-x-auto border shadow-md sm:rounded-lg mt-3">
        <table class="w-full text-[14px] text-left rounded-md">
            <thead class="border-b">
                <tr>
                    <th class="px-3 py-1">No</th>
                    <th class="px-3 py-1">Invoice</th>
                    <th class="px-3 py-1">Pemesanan</th>
                    <th class="px-3 py-1">Subtotal</th>
                    <th class="px-3 py-1">Payment Method</th>
                    <th class="px-3 py-1">Status Order</th>
                    <th class="px-3 py-1">Action</th>
                </tr>
            </thead>
            <tbody class="border-b">
                <?php $no=1 ?>
                @foreach($orderDone as $orderDone)
                <tr>
                    <td class="px-3 py-2">{{$no++}}</td>
                    <td class="px-3 py-2">{{$orderDone->invoice}}</td>
                    <td class="px-3 py-2">{{$orderDone->name}}</td>
                    <td class="px-3 py-2">{{$orderDone->subtotal}}</td>
                    <td class="px-3 py-2">{{$orderDone->metode_pembayaran}}</td>
                    <td class="px-3 py-2">{{$orderDone->statusName}}</td>
                    <td class="px-3">
                        <a
                            href="{{route('admin.transaksi.detail', ['id' => $orderDone->id])}}"
                            class="font-medium text-white hover:underline px-2 py-1 bg-yellow-300 rounded-sm mr-2"
                            >Detail</a
                        >
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
