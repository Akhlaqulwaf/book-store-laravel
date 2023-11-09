@extends('admin/layouts/index') @section('content')
<div class="w-full md:px-[2rem] my-2">
    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[2rem] max-w-sm mx-auto md:max-w-none md:mx-0"
    >
        <div
            class="w-full border shadow-md rounded-md py-[3rem] px-[2rem] bg-gray-500 bg-[url('../../../public/img/circle.svg')] bg-no-repeat bg-right"
        >
            <div class="flex flex-col justify-center items-center">
                <p>In Order</p>
                @if($orderMasuk != null)
                <p>{{$orderMasuk->orderIn}}</p>
                @else
                <p>0</p>
                @endif
            </div>
        </div>
        <div
            class="w-full border shadow-md rounded-md py-[3rem] px-[2rem] bg-yellow-400 bg-[url('../../../public/img/circle.svg')] bg-no-repeat bg-right"
        >
            <div class="flex flex-col justify-center items-center">
                <p>New Order</p>
                @if($orderBaru != null)
                <p>{{$orderBaru->orderNew}}</p>
                @else
                <p>0</p>
                @endif
            </div>
        </div>
        <div
            class="w-full border shadow-md rounded-md py-[3rem] px-[2rem] bg-red-400 bg-[url('../../../public/img/circle.svg')] bg-no-repeat bg-right"
        >
            <div class="flex flex-col justify-center items-center">
                <p>Cancel Order</p>
                @if($orderBatal != null)
                <p>{{$orderBatal->orderCancel}}</p>
                @else
                <p>0</p>
                @endif
            </div>
        </div>
        <div
            class="w-full border shadow-md rounded-md py-[3rem] px-[2rem] bg-green-400 bg-[url('../../../public/img/circle.svg')] bg-no-repeat bg-right"
        >
            <div class="flex flex-col justify-center items-center">
                <p>Done Order</p>
                @if($orderSelesai != null)
                <p>{{$orderSelesai->orderDone}}</p>
                @else
                <p>0</p>
                @endif
            </div>
        </div>
    </div>
    <div class="mt-[2rem] w-full border shadow-md">
        <table class="w-full border-b border-gray-400 rounded-md table-fixed text-left ">
            <thead class="border-b px-[2rem]">
                <tr>
                    <th class="py-2 px-3">No</th>
                    <th class="py-2 px-3">Name</th>
                    <th class="py-2 px-3">Phone</th>
                    <th class="py-2 px-3">E-mail</th>
                </tr>
            </thead>
            <tbody class="border-b px-[2rem]">
                <?php $no=1;
            ?>
                @foreach($user as $user)
                <tr class="border-b">
                    <td class="py-2 px-3">{{$no++}}</td>
                    <td class="py-2 px-3">{{$user->name}}</td>
                    <td class="py-2 px-3">{{$user->phone}}</td>
                    <td class="py-2 px-3">{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
