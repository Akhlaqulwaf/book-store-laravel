@extends('user/layouts/app') @section('content')
<div class="w-full px-[2rem] md:px-[3rem] font-primary">
    <div class="px-0 mt-3">
        <div class="border-b border-gray-400">Home/Checkout</div>
        <h2 class="mt-3 ml-[2rem] md:ml-[5rem]">Your Order</h2>
        <div class="mt-2 px-[5rem] md:px-[10rem]">
            <div class="shadow-md bg-gray-100 rounded-md my-4 py-4">
                <form action="{{route('user.order.simpan')}}" method="post">
                    @csrf
                    <table class="w-full md:w-[80%] md:mx-[5rem] text-sm">
                        <thead class="border-b text-left border-gray-300">
                            <th class="px-6 py-3">Product</th>
                            <th class="px-6 py-3">Total</th>
                        </thead>
                        <tbody class="border-b border-gray-300">
                            <?php $total=0; ?>
                            @foreach($cart as $cart)
                            <?php 
                            $total += $cart->qty * $cart->harga; ?>
                            <tr class="border-b border-gray-300">
                                <td class="px-6 py-3">
                                    {{$cart->nameProduct}} <span>x</span
                                    >{{$cart->qty}}
                                </td>
                                <td class="px-6 py-3">
                                    Rp.{{number_format($cart->qty * $cart->harga,2,',','.')}}
                                </td>
                            </tr>
                            @endforeach

                            <tr>
                                <td class="px-6 py-3 font-semibold">
                                    Total
                                </td>
                                <td class="px-6 py-3 font-semibold">
                                    Rp.{{ number_format($total, 2, ",", ".") }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="px-[1.5rem] md:px-[6.5rem] text-sm">
                        <input type="hidden" name="invoice" id="" value="{{$invoice}}">
                        <input type="hidden" name="subtotal" id="" value="{{$total}}">
                        <div class="py-2">
                            <label for="">Note</label>
                            <textarea name="pesan" class="w-full border-gray-300 rounded-md focus:ring-0 focus:border-white text-sm"></textarea>
                        </div>
                        <div class="py-2">
                            <label for="">Phone</label>
                            <input type="number" name="no_telp" value="{{$cart->phone}}" id="" class="w-full border-gray-300 focus:border-white rounded-md focus:ring-0" readonly>
                        </div>
                        <div class="py-2">
                            <label for="">Payment</label>
                            <input type="text" name="metode_pembayaran" value="Transfer" id="" class="w-full border-gray-300 focus:border-white rounded-md focus:ring-0" readonly>
                        </div>
                        <div class="py-2">
                            <button class="w-full h-[2rem] bg-slate-400 flex justify-center items-center rounded-md">Checkout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
