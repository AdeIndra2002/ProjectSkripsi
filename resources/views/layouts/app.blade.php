<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BAWASLU | Pengadaan</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/logokalsel.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Scripts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" /> --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="{{ asset('assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('assets/js/charts-pie.js') }}" defer></script>
    <script src="{{ asset('assets/js/lightbox.js') }}" defer></script>
    <link href="{{ asset('assets/css/lightbox.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.0.6/dist/cdn.min.js" defer></script>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }

    </script>

    {{-- <script src="{{ asset('js/init-alpine.js') }}"></script> --}}
    <style>
        main::-webkit-scrollbar {
            display: none;
        }

        main {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

    </style>
    <script>
        // Ambil semua item menu
        const menuItems = document.querySelectorAll('.sidebar-menu-item');

        // Tambahkan event listener untuk setiap item menu
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                // Hapus kelas aktif dari semua item menu
                menuItems.forEach(menu => {
                    menu.classList.remove('active');
                });
                // Tambahkan kelas aktif ke item menu yang dipilih
                item.classList.add('active');
            });
        });

    </script>

</head>
<body>
    <div class="flex h-screen bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('layouts.navigation')
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        @include('layouts.navigation-mobile')
        <div class="flex flex-col flex-1 w-full">
            @include('layouts.top-menu')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    @if (isset($header))
                    <h2 class="my-6 text-2xl font-semibold text-gray-400">
                        {{ $header }}
                    </h2>
                    @endif

                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {

        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

    });

</script>
</html>
