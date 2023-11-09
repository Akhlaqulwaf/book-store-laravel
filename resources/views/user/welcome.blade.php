@extends('user/layouts/app') @section('content')
<div
    class="w-full h-[30rem] bg-[url('../../../public/img/library.webp')] bg-cover bg-no-repeat bg-center"
></div>
<div class="w-full p-7 md:px-[3rem] font-primary">
    <div class="flex justify-center items-center">
        <div class="flex-grow h-px bg-gray-400"></div>
        <span class="uppercase font-semibold text-gray-500 mx-2"
            >Recently added books to our store</span
        >
        <div class="flex-grow h-px bg-gray-400"></div>
    </div>
    <div class="w-full">
        <div
            class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-[30px] max-w-sm mx-auto md:max-w-none md:mx-0 mt-3"
        >
            @foreach($data as $product)
            <div>
                <div
                    class="border shadow-md rounded-sm h-[200px] mb-3 overflow-hidden relative group transition"
                >
                    <div
                        class="w-[170px] h-full flex justify-center items-center mx-auto"
                    >
                        <a
                            href="{{route('user.productDetail', ['id' => $product->id])}}"
                            class="w-[130px] h-full flex justify-center items-center mx-auto"
                        >
                            <img
                                src="{{ asset('storage/'.$product->image) }}"
                                alt=""
                                class="max-w-[80px] group-hover:scale-110 duration-300"
                            />
                        </a>
                    </div>
                </div>
                <div>
                    <a href="">{{$product->name}}</a>
                    <div class="">{{$product->category}}</div>
                    <div>{{$product->harga}}</div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center items-center py-[2rem]">
            <a
                href="{{ route('user.product') }}"
                class="w-[5rem] h-[2rem] bg-gray-400 rounded-sm flex justify-center items-center"
                >View All</a
            >
        </div>
    </div>
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-[30px] max-w-sm mx-auto md:max-w-none md:mx-0 mt-4"
    >
        <div>
            <img src="{{ asset('img/book-library.jpg') }}" alt="" class="rounded-sm"/>
        </div>
        <div
            class="w-full h-full flex justify-center items-center mx-auto my-auto"
        >
            <div class="w-full flex-row justify-center items-center mx-auto">
                <h1 class="uppercase font-semibold text-1xl md:text-2xl">
                    about book store
                </h1>
                <p class="text-justify pt-2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Voluptas vitae, odit in sint deleniti ea quos blanditiis,
                    molestias autem animi illum. Aliquam, ea facilis
                    reprehenderit id odio explicabo eius et.<br />
                    <span
                        >Debitis nulla nostrum, facere voluptatem amet quas
                        explicabo excepturi magnam necessitatibus a ex error
                        autem voluptates tenetur suscipit enim recusandae dicta
                        sint optio unde sequi. Optio harum temporibus ut
                        omnis.</span
                    >
                </p>
                <div class="mt-4">
                    <button
                        class="w-[100px] h-[30px] bg-gray-400 text-black rounded-sm"
                    >
                    <a href="{{route('user.product')}}">Shop Books</a>
                        
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
