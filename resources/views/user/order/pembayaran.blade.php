@extends('user/layouts/app')
@section('content')
<div class="px-[2rem] md:px-[5rem]">
    <div class="py-[10rem]">
        <p class="text-center pb-5">Silahkan lakukan pembayaran</p>
        <div class="flex">
            <div class="mr-3 w-[15rem] py-2 rounded-sm bg-green-400">
                <div class="flex flex-col justify-center items-center text-white">
                    @foreach($rekening as $rek)
                    <p class="w-full py-1 text-center border-b border-gray-500">{{$rek->nama_bank}}</p>
                    <p class="py-1">{{$rek->atas_nama}}</p>
                    <p class="py-1">{{$rek->no_rek}}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <p class="text-center pt-5">Transfer sebesar Rp.{{number_format($order->subtotal,2,',','.')}}</p>
        <div class="flex justify-center items-center pt-3">
            <form action="{{route('user.order.buktiBayar', ['id' => $order->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="bukti_bayar" class="block text-sm text-gray-500">Upload bukti pembayaran</label>
                <input type="file" name="bukti_bayar" class="mt-2 rounded-md border border-gray-200 p-2.5" required>
                <div class="flex justify-end items-end mt-2">
                    <button type="submit" class="w-[5rem] py-2 bg-purple-400 rounded-md">upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection