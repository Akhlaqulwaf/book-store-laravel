@extends('user/layouts/app') @section('content')
<div class="w-full p-7 px-[2rem] md:px-[3rem] font-primary">
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-[2rem] max-w-sm mx-auto md:max-w-none md:mx-0 mt-3 mb-[5rem]"
    >
        <div class="flex flex-col justify-center h-[50vh] px-[3rem]">
            <h1 class="pb-4 text-[25px]">Contact Us</h1>
            <p class="leading-[1.5rem] text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                in, ab facere voluptas blanditiis harum vel expedita! Molestias
                qui id quam tempora, molestiae nesciunt doloremque corrupti.
                Odit ducimus sed repellendus.
            </p>
        </div>
        <div class="flex flex-col justify-center h-[50vh]">
            <div class="w-full border rounded-md shadow-md relative top-[5rem]">
                <form action="">
                    <div class="flex flex-col md:flex-row justify-center items-center md:items-baseline mx-auto p-3">
                        <div class="md:mr-3">
                            <label for="firstName" class="block">First Name</label>
                            <input type="text" spellcheck="false" class="rounded-md bg-gray-200 border-gray-200 focus:border-gray-400 focus:ring-0"/>
                        </div>
                        <div>
                            <label for="" class="block">Last Name</label>
                            <input type="text" spellcheck="false" class="rounded-md bg-gray-200 border-gray-200 focus:border-gray-400 focus:ring-0"/>
                        </div>
                    </div>
                    <div class="px-[5.1rem] md:px-[5rem]">
                        <label for="" class="block">Last Name</label>
                        <input type="text" spellcheck="false" class="w-full  rounded-md bg-gray-200 border-gray-200 focus:border-gray-400 focus:ring-0"/>
                    </div>
                    <div class="px-[5.1rem] md:px-[5rem] pt-3 pb-4">
                        <label for="" class="block">Last Name</label>
                        <input type="text" spellcheck="false" class="w-full  rounded-md bg-gray-200 border-gray-200 focus:border-gray-400 focus:ring-0"/>
                    </div>
                    <div class="w-full px-[5.1rem] md:px-[5rem] pb-4">
                        <button class="w-[6rem] py-2 bg-gray-400 text-white hover:text-gray-900 rounded-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
