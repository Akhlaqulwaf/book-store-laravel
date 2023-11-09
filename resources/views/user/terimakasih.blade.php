@extends('user/layouts/app')
@section('content')
<div class="w-full px-[2rem] md:px-[8rem]">
    <div class="w-full h-screen flex justify-center items-center mx-auto">
        <div class="w-[100%] py-[5rem] flex justify-center items-center rounded-md">
            <div class="flex flex-col justify-center items-center gap-[0.5rem]">
                <p class="iconify text-green-500 text-[6rem]" data-icon="mdi-check-circle"></p>
                <h2 class="text-black font-semibold text-[1.2rem]">Thankyou for the order!</h2>
                <p class="leading-6 text-black text-[1rem]">Your order has been successfully created. Please confirm payment via the payment confirmation menu.</p>
                <p class="mt-3"><a href="{{route('user.order')}}" class="w-full p-2 h-[2rem] rounded-md bg-green-400 text-white">Payment</a></p>
            </div>
        </div>
    </div>
</div>
@endsection