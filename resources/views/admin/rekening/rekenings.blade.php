@extends('admin/layouts/index') @section('content')
<div class="w-full px-[1rem] md:px-[2rem] my-2">
    <div class="flex justify-between items-center font-semibold">
        <h1 class="uppercase">Rekening</h1>
        <a
            href="{{ route('admin.rekening.tambah') }}"
            class="w-[60px] h-[30px] bg-blue-500 hover:text-white duration-150 flex justify-center items-center mr-5 rounded-md"
            >Tambah</a
        >
    </div>

    <div class="relative overflow-x-auto border shadow-md sm:rounded-lg mt-3">
        <table class="w-full text-center text-[14px]">
            <thead class="border-b">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Bank</th>
                    <th class="px-6 py-3">Atas Nama</th>
                    <th class="px-6 py-3">Nomer Rekening</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="border-b">
                @php $no=1 @endphp @foreach($data as $datas)
                <tr>
                    <td class="px-6 py-3">
                        {{$no++}}
                    </td>
                    <td scope="row" class="px-6 py-3">
                        {{$datas->nama_bank}}
                    </td>
                    <td class="px-6 py-3">
                        {{$datas->atas_nama}}
                    </td>
                    <td class="px-6 py-3">
                        {{$datas->no_rek}}
                    </td>
                    <td class="px-6 py-3 flex items-center justify-center">
                        <div class="flex">
                            <a
                                href="{{route('admin.rekening.edit', ['id' => $datas->id])}}"
                                class="font-medium text-white hover:underline w-[45px] h-[25px] bg-yellow-300 rounded-sm mr-2 flex justify-center items-center"
                                >Edit</a
                            >
                            <a
                                href="{{route('admin.rekening.delete', ['id' => $datas->id])}}"
                                class="font-medium text-white hover:underline w-[45px] h-[25px] bg-red-500 rounded-sm flex justify-center items-center"
                                >Delete</a
                            >
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
