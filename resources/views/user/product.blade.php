@extends('user/layouts/app') @section('content')
<div class="w-full p-7 md:px-[3rem] font-primary">
    <div class="px-0">
        <div class="border-b border-gray-400">Home/Product</div>
    </div>
    <div
        class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-[30px] max-w-sm mx-auto md:max-w-none md:mx-0 mt-5"
    >
        @foreach($products as $product)
        <div>
            <div
                class="border shadow-md rounded-sm h-[200px] overflow-hidden mb-3 relative"
            >
                <a
                    href="{{route('user.productDetail', ['id' => $product->id])}}"
                    class="w-[170px] h-full flex justify-center items-center mx-auto group transition"
                >
                    <div
                        class="w-[130px] h-full flex justify-center items-center mx-auto"
                    >
                        <img
                            src="{{asset('storage/'.$product->image)}}"
                            class="max-w-[80px] group-hover:scale-110 duration-300"
                            alt=""
                        />
                    </div>
                </a>
            </div>
            <div>
                <a href="">{{$product->name}}</a>
                <div class="">{{$product->category}}</div>
                <div>{{$product->harga}}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
