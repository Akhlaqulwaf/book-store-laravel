@extends('admin/layouts/index') @section('content')
<div class="w-full px-[1rem] md:px-[2rem] my-2">
    <div class="font-semibold">
        <h1 class="uppercase">Users</h1>
    </div>

    <div class="relative overflow-x-auto border shadow-md sm:rounded-lg mt-3">
        <table class="w-full text-center text-[14px]">
            <thead class="border-b">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Phone</th>
                </tr>
            </thead>
            <tbody class="border-b">
                @php $no=1; 
                @endphp 
                @foreach($data as $datas)
                <tr>
                    <td class="px-6 py-3">
                        {{$no++}}
                    </td>
                    <td scope="row" class="px-6 py-3">
                        {{$datas->name}}
                    </td>
                    <td class="px-6 py-3">
                        {{$datas->email}}
                    </td>
                    <td class="px-6 py-3">
                        {{$datas->phone}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
