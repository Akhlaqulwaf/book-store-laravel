@extends('user/layouts/app') @section('content')
<div class="w-full py-4 px-[2rem] md:px-[3rem] font-primary">
    <div class="">
        <div class="border-b border-gray-400">Home/Cart</div>
    </div>
    <div class="relative overflow-x-auto shadow-md rounded-md">
        
        <form method="post" action="{{route('user.cart.update')}}" enctype="multipart/form-data" id="cart-form">
            @csrf
            <table class="w-full mt-3 text-sm font-thin bg-gray-50">
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-200 rounded-md"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">Image</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Category</th>
                        <th scope="col" class="px-6 py-3">Qty</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $total=0 ?>
                    @forelse($cart as $cart)
                    <?php $total +=  $cart->harga * $cart->qty?>
                    <tr class="border-b bg-white">
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            <img
                                src="{{asset('storage/'. $cart->image)}}"
                                class="max-w-[50px] mx-auto"
                                alt=""
                            />
                        </th>
                        <td class="px-6 py-4">
                            {{$cart->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$cart->category}}
                        </td>
                        <td class="px-6 py-4 w-[4rem]">
                            <?php $val = $cart->qty ?>
                                <div class="flex ">
                                    <button
                                    id="decrease"
                                    class="decrease border shadow-md mr-2 rounded-md  h-10 w-10 text-gray-600 transition hover:opacity-75"
                                    >
                                    &minus;
                                </button>
                                <input type="hidden" name="id[]" value="{{ $cart->id }}">

                                    <input
                                        id="qtyInput"
                                        name="qty[]"
                                        value="{{$cart->qty}}"
                                        class="h-10 w-20 rounded-md shadow-md border-gray-200 focus:border-gray-300 focus:ring-0 sm:text-sm text-center mx-auto [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                    />
                                        
                                    <button
                                        id="increase"
                                        class="increase h-10 w-10 border shadow-md ml-2 rounded-md text-gray-600 transition hover:opacity-75"
                                    >
                                        &plus;
                                    </button>
                                </div>
                        </td>
                        <td class="px-6 py-4">
                            Rp.{{number_format($cart->harga,2,',','.')}}
                        </td>
                        <td class="px-6 py-4">
                            Rp.{{number_format($cart->harga * $cart->qty,2,',','.')}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center">
                                <a href="{{route('user.cart.delete', ['id' => $cart->id])}}" class="w-[2rem] h-[2rem] rounded-md bg-red-500 text-white hover:text-black font-semibold flex justify-center items-center">X</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-4">No Data Available</td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </form>
        <div class="flex flex-col justify-end items-end mt-5">
            <div class="w-[50vw] md:w-[20vw] flex flex-col justify-center items-center pl-[4rem]">
                <h1 class="mx-auto">total belanja</h1>
                <div class="flex mt-5">
                    <p class="mr-[5rem]">total</p>
                    <p>Rp.{{number_format($total,2,',','.')}}</p>
                </div>
                <a href="{{route('user.checkout')}}" class="w-full py-[0.5rem] mt-2 rounded-md bg-slate-400 flex justify-center items-center">Checkout</a>
            </div>
        </div>
    <div class="flex mt-3 justify-end items-end">
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const form = document.getElementById('cart-form');
        const increaseButtons = document.querySelectorAll('.increase');
        const decreaseButtons = document.querySelectorAll('.decrease');
        const quantityInputs = document.querySelectorAll('input[name="qty[]"]');

        increaseButtons.forEach((button, index) => {
            button.addEventListener('click', function() {
                quantityInputs[index].value = parseInt(quantityInputs[index].value) + 1;
            });
        });

        decreaseButtons.forEach((button, index) => {
            button.addEventListener('click', function() {
                const currentValue = parseInt(quantityInputs[index].value);
                if (currentValue > 1) {
                    quantityInputs[index].value = currentValue - 1;
                }
            });
        });
    })
</script>
@endsection
