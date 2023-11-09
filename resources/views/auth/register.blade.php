<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{asset('img')}}/book-logo.png" type="image/gif" sizes="16x16" class="">
        @vite(['resources/css/admin/app.css','resources/js/admin/app.js'])
        <title>Register</title>
    </head>
    <body>
        <div class="w-full flex flex-col justify-center items-center">
            <div
                class="w-[65vw] md:w-[35vw] px-[2rem] py-[1rem] shadow-md border font-primary absolute top-[3%]"
            >
                <div class="flex justify-center items-center">
                    <p
                        class="iconify text-[5rem] mr-2 cursor-pointer"
                        data-icon="mdi-book-open-variant"
                    ></p>
                </div>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="block pb-1">name</label>
                        <input
                            type="text"
                            name="name"
                            value="{{old('name')}}"
                            class="w-full border-gray-400 rounded-md focus:border-gray-300 focus:ring-0"
                        />
                        @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="block pb-1">phone</label>
                        <input
                            type="number"
                            name="phone"
                            value="{{old('phone')}}"
                            class="w-full border-gray-400 rounded-md focus:border-gray-300 focus:ring-0"
                        />
                        @error('phone')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="block pb-1">E-mail</label>
                        <input
                            type="email"
                            name="email"
                            value="{{old('email')}}"
                            class="w-full border-gray-400 rounded-md focus:border-gray-300 focus:ring-0"
                        />
                        @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="block pb-1"
                            >Password</label
                        >
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="w-full border-gray-400 rounded-md focus:border-gray-300 focus:ring-0"
                        />
                        @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="block pb-1"
                            >Confirm Password</label
                        >
                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full border-gray-400 rounded-md focus:border-gray-300 focus:ring-0"
                        />
                        @error('password_confirmation')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="w-full py-2 bg-gray-400 rounded-md">
                        Login
                    </button>
                    <div class="flex justify-end items-end py-2 text-[13px]">
                        <p class="mr-1">Sudah Punya akun?</p>
                        <a href="{{route('login')}}" class="hover:underline hover:text-blue-400">Login</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
    </body>
</html>
