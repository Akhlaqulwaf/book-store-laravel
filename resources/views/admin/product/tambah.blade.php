@extends('admin/layouts/index') @section('content')

<div class="w-full px-[1rem] md:px-[2rem] my-3 text-[14px]">
    <h1 class="uppercase font-semibold">Tambah Product</h1>
    <form
        method="POST"
        enctype="multipart/form-data"
        action="{{ route('admin.product.store') }}"
    >
        @csrf
        <div class="mb-6 mt-5">
            <label
                for="nama"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Nama Product</label
            >
            <input
                type="text"
                spellcheck="false"
                name="name"
                id="nama"
                class="border w-full placeholder-gray-700 placeholder:text-[13px] border-gray-400 bg-gray-200 rounded-md focus:ring-0 focus:border-gray-600"
                placeholder="Nama Product"
            />
            @error('name')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="kategori"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Kategori</label
            >
            <input
                type="text"
                name="category"
                spellcheck="false"
                id="kategori"
                class="border w-full placeholder-gray-700 border-gray-400 bg-gray-200 rounded-md focus:ring-0 focus:border-gray-600"
                placeholder="Kategori"
            />
            @error('category')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="deskripsi"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Deskripsi</label
            >
            <textarea
                name="deskripsi"
                id="deskripsi"
                cols="2"
                rows="2"
                spellcheck="false"
                class="border w-full placeholder-gray-700 border-gray-400 bg-gray-200 rounded-md focus:ring-0 focus:border-gray-600"
                placeholder="Description"
            ></textarea>
            @error('deskripsi')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="stok"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Stok</label
            >
            <input
                type="number"
                spellcheck="false"
                name="stok"
                id="stok"
                class="border w-full placeholder-gray-700 border-gray-400 bg-gray-200 rounded-md focus:ring-0 focus:border-gray-600"
                placeholder="Stok"
            />
            @error('stok')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="harga"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Harga</label
            >
            <input
                type="number"
                spellcheck="false"
                name="harga"
                id="harga"
                class="border w-full placeholder-gray-700 border-gray-400 bg-gray-200 rounded-md focus:ring-0 focus:border-gray-600"
                placeholder="Harga"
            />
            @error('harga')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="gambar"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Gambar</label
            >
            <input
                type="file"
                id="gambar"
                name="image"
                class="border w-full placeholder-gray-700 border-gray-400 bg-gray-200 rounded-md focus:ring-0 focus:border-gray-600"
            />
        </div>
        <button
            type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
            Submit
        </button>
    </form>
</div>

@endsection
