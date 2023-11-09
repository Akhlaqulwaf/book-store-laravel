@extends('admin/layouts/index')
@section('content')

<div class="w-full px-[1rem] md:px-[2rem] my-3">
    <h1 class="uppercase font-semibold">Edit Product</h1>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.rekening.update', ['id' => $data->id]) }}" class="text-[14px]">
        @csrf
        <div class="mb-6 mt-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Bank</label>
            <input type="text" name="nama_bank" id="nama_bank" class="border w-full text-[14px] border-gray-400 bg-gray-200 rounded-md focus:ring-0 focus:border-gray-600" value="{{$data->nama_bank}}" required>
        </div> 
        <div class="mb-6">
            <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Atas Nama</label>
            <input type="text" name="atas_nama" id="atas_nama" class="border w-full text-[14px] border-gray-400 bg-gray-200 rounded-md focus:ring-0 focus:border-gray-600" value="{{$data->atas_nama}}"  required>
        </div> 
        <div class="mb-6">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Nomer Rekening</label>
            <input type="number" name="no_rek" id="no_rek" class="border w-full text-[14px] border-gray-400 bg-gray-200 rounded-md focus:ring-0 focus:border-gray-600" value="{{$data->no_rek}}"  required>
        </div> 
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</div>





@endsection