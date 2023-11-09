@extends('admin/layouts/index') @section('content')

<div class="w-full px-[1rem] md:px-[2rem] my-2">
    <div class="flex justify-between items-center font-semibold">
        <h1 class="uppercase">New Order</h1>
    </div>

    <div class="relative overflow-x-auto border shadow-md sm:rounded-lg mt-3">
        <table class="w-full border text-[14px]">
            <thead class="border-b">
                <tr>
                    <th class="px-3 py-3">No</th>
                    <th class="px-3 py-3">Invoice</th>
                    <th class="px-3 py-3">Pemesan</th>
                    <th class="px-3 py-3">Subtotal</th>
                    <th class="px-3 py-3">Metode Pembayaran</th>
                    <th class="px-3 py-3">Status Pesanan</th>
                    <th class="px-3 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="border-b">
                @php $no=1 @endphp @foreach($order as $datas)
                <tr>
                    <td class="px-3 py-3">
                        {{$no++}}
                    </td>
                    <th class="px-3 py-3">
                        {{$datas->invoice}}
                    </th>
                    <td class="px-3 py-3">
                        {{$datas->userName}}
                    </td>
                    <td class="px-3 py-3">
                        {{$datas->subtotal}}
                    </td>
                    <td class="px-3 py-3">
                        {{$datas->metode_pembayaran}}
                    </td>
                    <td class="px-3 py-3">
                        {{$datas->statusName}}
                    </td>
                    <td class="px-3 py-3">
                        <a
                            href="{{route('admin.transaksi.detail', ['id' => $datas->id])}}"
                            class="font-medium text-white hover:underline w-[45px] h-[25px] bg-yellow-300 rounded-sm mr-2 flex justify-center items-center"
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
