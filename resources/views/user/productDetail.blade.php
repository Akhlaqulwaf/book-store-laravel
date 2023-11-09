@extends('user/layouts/app') @section('content')
<div class="w-full p-7 px-[2rem] md:px-[3rem] font-primary">
    <div class="">
        <div class="border-b border-gray-400">
            <a href="{{route('user.welcome')}}" class="hover:text-blue-500 hover:underline transition duration-500">Home</a><span>/Product Detail</span>
        </div>
    </div>
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-[30px] max-w-sm md:max-w-none mx-auto md:mx-0 mt-5"
    >
                <div
                    class="max-w-[180px] h-full flex justify-center items-center mx-auto"
                >
                    <img
                        src="{{asset('storage/'. $data->image)}}"
                        alt=""
                    />
                </div>
        <div class="leading-6 flex flex-col justify-center text-justify">
            <p class="pb-1 font-semibold">{{$data->name}}</p>
            <p class="pb-1">{{$data->category}}</p>
            <p class="pb-1 text-gray-700">{{$data->deskripsi}}</p>
            <p class="pb-1">Stok {{$data->stok}}</p>
            <p>Rp.{{$data->harga}}</p>
            <div>
                <form action="{{ route('user.cart.store') }}" method="post">
                    @csrf @if(Route::has('login')) @auth
                    <input
                        type="hidden"
                        name="user_id"
                        value="{{ Auth::user()->id }}"
                    />
                    @endauth @endif

                    <input
                        type="hidden"
                        name="product_id"
                        value="{{ $data->id }}"
                    />
                    <div class="mt-3 w-[11rem] flex justify-center items-center">
                        <button
                            type="button"
                            id="decrease"
                            class="py-[0.5px] w-10 leading-10 border shadow-md rounded-md text-gray-600 transition hover:opacity-75"
                        >
                            &minus;
                        </button>

                        <input
                            type="number"
                            id="qtyInput"
                            name="qty"
                            value="1"
                            class="py-2.5 w-20 border-gray-200 rounded-md shadow-md focus:border-gray-300 focus:ring-0 sm:text-sm text-center mx-auto [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        />

                        <button
                            type="button"
                            id="increase"
                            class="py-[0.5px] w-10 leading-10 border shadow-md rounded-md text-gray-600 transition hover:opacity-75"
                        >
                            &plus;
                        </button>
                    </div>
                    <button
                        class="w-[7rem] h-[2rem] bg-slate-400 mt-3 rounded-md"
                    >
                        Add To Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const qtyInput = document.getElementById("qtyInput");
        const increase = document.getElementById("increase");
        const decrease = document.getElementById("decrease");

        decrease.addEventListener("click", function (e) {
            e.preventDefault();
            let currentVal = parseInt(qtyInput.value);
            if (currentVal > 1) {
                qtyInput.value = currentVal - 1;
            }
        });
        increase.addEventListener("click", function (e) {
            e.preventDefault();
            let currentVal = parseInt(qtyInput.value);
            qtyInput.value = currentVal + 1;
        });
    });
</script>
@endsection
