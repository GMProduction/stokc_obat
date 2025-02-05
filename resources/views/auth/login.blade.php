<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/appstyle/genosstailwind.css') }}" type="text/css">

    {{-- <link rel="stylesheet"



    {{-- ICON --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="relative bg-slate-100" style="min-height: 100vh">


    {{-- BACKGROUND --}}
    <div class="ocean">
        <div class="wave" style=" background: url({{ asset('local/images/wave.svg') }})
        repeat-x;">
        </div>
        <div class="wave" style=" background: url({{ asset('local/images/wave.svg') }})
        repeat-x;"></div>
    </div>

    <section class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            @if (\Illuminate\Support\Facades\Session::has('failed'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    <span class="font-medium">Login Gagal!</span>
                    {{ \Illuminate\Support\Facades\Session::get('failed') }}
                </div>
            @endif

            <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-6xl xl:p-0  ">
                <div class="   grid md:grid-cols-2 grid-cols-1">

                    <div class="p-16">
                        <a href="#"
                            class="flex items-center mb-6 text-2xl font-semibold text-gray-900 justify-center ">

                            PUSKESMAS --------
                        </a>

                        <div class="border w-full text-black bg-black"></div>
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl mt-5">
                            Login
                        </h1>
                        <p class="text-sm">Masukan Username dan Password</p>
                        <form class="mt-6" method="post">
                            @csrf
                            <div>
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                                <input type="text" name="username" id="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  {{ $errors->has('username') ? 'border-red-500' : '' }}   "
                                    placeholder="username" required>
                                @if ($errors->has('username'))
                                    <p class="text-red-500" style="font-size: 0.8em">
                                        {{ $errors->first('username') }}
                                    </p>
                                @endif
                            </div>

                            <div class="mt-3">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5   {{ $errors->has('password') ? 'border-red-500' : '' }} "
                                    required>
                                @if ($errors->has('password'))
                                    <p class="text-red-500" style="font-size: 0.8em">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                            </div>

                            <button type="submit"
                                class="w-full mt-6 text-white bg-secondary hover: hover:bg-primarylight transition duration-300 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-5 text-center ">
                                Sign
                                in
                            </button>
                            <p class="text-xs mt-3 text-black/60">Jika terjadi kesalahan sistem mohon hubungi
                                administrator.</p>

                        </form>
                    </div>

                    <div class="mt-0 rounded-r-lg bg-primary hidden md:block">

                        <img src="{{ asset('/local/images/boxmedic.png') }}" class="mx-auto mt-0" />
                        <p class="text-center pt-4 text-2xl text-white p-0 m-0 font-bold">Aplikasi stock obat</p>
                        <p class="text-center text-sm text-white/80 p-0 m-0">Aplikasi managemen stock obat di puskesmas
                            ---------------</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('/js/flowbite.js') }}"></script>
    <script src="{{ asset('/js/nav.js') }}"></script>

    @yield('morejs')
</body>

</html>
