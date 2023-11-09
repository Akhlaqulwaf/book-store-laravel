<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{asset('img')}}/book-logo.png" type="image/gif" sizes="16x16" class="">
        @vite(['public/css/admin/app.css','public/js/admin/app.js'])
        <title>Book Store</title>
    </head>
    <body>
        <div class="relative min-h-screen">
        <!-- navbar -->
            <nav class="w-full py-2 shadow-md  font-primary">
                <div
                    class="px-[2rem] md:px-[3rem] flex flex-wrap items-center justify-between"
                >
                    <div class="flex items-center -ml-[1.3rem]">
                        <a href="{{route('user.welcome')}}">
                            <img src="{{asset('img')}}/book-store-logo.png" alt="" class="w-[6rem] h-[4rem]">
                        </a>
                    </div>
                    <button
                        data-collapse-toggle="mobile-menu"
                        type="button"
                        class="md:hidden ml-3 text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-0 focus:ring-white rounded-lg inline-flex items-center justify-center"
                        aria-controls="mobile-menu-2"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <svg
                            class="hidden w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                    <div
                        class="hidden z-40 md:block w-full md:w-auto"
                        id="mobile-menu"
                    >
                        <ul
                            class="flex flex-col bg-white md:flex-row mt-4 md:mt-0 md:text-sm md:font-medium"
                        >
                            <li class="mr-3">
                                <a href="{{ route('user.welcome') }}">Home</a>
                            </li>
                            <li class="mr-3">
                                <a href="{{ route('user.product') }}">Product</a>
                            </li>
                            <li class="mr-3">
                                <a href="{{route('user.about')}}">About</a>
                            </li>
                            <li class="">
                                <a href="{{route('user.contact')}}">Contact</a>
                            </li>
                            @if(Route::has('login'))
                            @auth
                            <li class="ml-3">
                                <?php
                                    $user_id = \Auth::user()->id;
                                    $total_keranjang = \DB::table('cart')
                                    ->select(DB::raw('count(id) as jumlah'))
                                    ->where('user_id',$user_id)
                                    ->first();
                                ?>
                                <a href="{{route('user.cart')}}" class="relative"> 
                                    <span class="iconify text-[1.4rem]" data-icon="mdi-shopping"></span>
                                    <span class="w-[15px] h-[15px] bg-red-500 text-white absolute left-3 -bottom-2 rounded-full flex justify-center items-center ">{{$total_keranjang->jumlah}}</span>
                                </a>
                            </li>
                            <li class="ml-3">
                                <?php
                                    $user_id = \Auth::user()->id;
                                    $total = \DB::table('order')
                                    ->select(DB::raw('count(id) as jumlah'))
                                    ->where('user_id',$user_id)
                                    ->where('status_order_id','!=','4')
                                    ->where('status_order_id','!=','6')
                                    ->first();
                                ?>
                                <a href="{{route('user.order')}}" class="relative"> 
                                    <span class="iconify text-[1.4rem]" data-icon="mdi-basket-fill"></span>
                                    <span class="w-[15px] h-[15px] bg-red-500 text-white absolute left-3 -bottom-2 rounded-full flex justify-center items-center ">{{$total->jumlah}}</span>
                                </a>
                            </li>
                            <li class="pt-3 md:pt-0">
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black w-[70px] h-5 focus:ring-0 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center type="button">
                                    <span class="iconify text-2xl" data-icon="mdi-account"></span>
                                    <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                  </svg>
                                </button>

                                
                                <div id="dropdown" class="z-10 hidden bg-slate-50 border divide-y  rounded-lg shadow-xl w-[7rem]">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                      <li>
                                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-black hover:bg-gray-400 hover:rounded-md" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    </ul>
                                </div>
                            </li>
                            @else
                            <li>
                                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black sm:text-left w-fit h-4 focus:ring-0 focus:outline-none font-medium rounded-lg text-sm md:pl-3 py-2.5 md:text-center inline-flex items-center type="button">
                                        <span class="iconify text-2xl" data-icon="mdi-account"></span>
                                        <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                    </button>

                                <div id="dropdown" class="z-10 hidden bg-slate-50 border divide-y  rounded-lg shadow-xl w-[7rem]">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                      <li>
                                        <a href="{{ route('login') }}" class="block px-4 py-2 text-black hover:bg-gray-400 hover:rounded-md">Login</a>
                                      </li>
                                      <li>
                                        <a href="{{ route('register') }}" class="block px-4 py-2 text-black hover:bg-gray-400 hover:rounded-md">Register</a>
                                      </li>
                                    </ul>
                                </div>
                            </li>
                            @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- endNavbar -->

            <!-- content -->
            <div class=" pb-[14rem] md:pb-[10rem]">@yield('content')</div>
            <!-- endContent -->

            <!-- footer -->
            <footer
                class="w-full h-[198px] md:h-[130px] py-4 shadow-md absolute bottom-0 font-primary"
            >
                <div
                    class="px-[2rem] md:px-[3rem] grid grid-cols-1 md:grid-cols-2"
                >
                    <div class="w-full">
                        <p class="border-b w-full border-black">How To Order</p>
                        <p class="border-b w-full border-black">About</p>
                        <p class="border-b w-full border-black">Contact</p>
                        <p class=" w-full border-black">Copyright &copy; 2023</p>
                    </div>
                    <div class="w-full pt-3 md:pt-0">
                        <p class="text-center md:text-right uppercase text-[20px]">book store</p>
                        <div class="text-center md:text-right">
                            <p class="uppercase text-[13px] pt-1">finds on</p>
                            <div
                                class="flex justify-center items-center md:justify-end py-1"
                            >
                                <p class="iconify mr-2 text-[20px]" data-icon="mdi-instagram"></p>
                                <p class="iconify mr-2 text-[20px]" data-icon="mdi-whatsapp"></p>
                                <p class="iconify mr-2 text-[20px]" data-icon="mdi-facebook"></p>
                                <p class="iconify text-[20px]" data-icon="mdi-twitter"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- endFooter -->
        <script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </body>
</html>
