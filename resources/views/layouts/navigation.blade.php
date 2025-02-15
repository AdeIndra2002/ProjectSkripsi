<aside class="z-20 hidden w-64 overflow-y-auto bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-400" x-data="{ isMultiLevelMenuOpen: false, isPagesMenuOpen: false }">
        <a class="flex items-center ml-6 text-lg font-bold text-gray-200 dark:text-gray-200" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logokalsel.png') }}" alt="Logo Kalsel" width="50" height="50">
            <span class="ml-4">BAWASLU</span>
        </a>

        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-gray-400 dark:text-gray-400 dark:hover:text-purple-600">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </x-slot>
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>

            {{-- <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 dark:text-gray-400 dark:hover:text-purple-600">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </x-slot>
            {{ __('Users') }}
            </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('barang.index') }}" :active="request()->routeIs('barang.*')" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 dark:text-gray-400 dark:hover:text-purple-600">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </x-slot>
                    {{ __('Barang') }}
                </x-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('kategori.index') }}" :active="request()->routeIs('kategori.*')" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 dark:text-gray-400 dark:hover:text-purple-600">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </x-slot>
                    {{ __('Kategori') }}
                </x-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('divisi.index') }}" :active="request()->routeIs('divisi.*')" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 dark:text-gray-400 dark:hover:text-purple-600">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </x-slot>
                    {{ __('Divisi') }}
                </x-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('supplier.index') }}" :active="request()->routeIs('supplier.*')" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 dark:text-gray-400 dark:hover:text-purple-600">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </x-slot>
                    {{ __('supplier') }}
                </x-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 dark:text-gray-400 dark:hover:text-purple-600">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </x-slot>
                    {{ __('About us') }}
                </x-nav-link>
            </li> --}}

            <li class="relative px-6 py-3">
                <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600" @click="isMultiLevelMenuOpen = !isMultiLevelMenuOpen" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span class="ml-4">DATA MASTER</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isMultiLevelMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="{{ route('users.index') }}">User</a>
                        </li>
                        <li href="{{ route('barang.index') }}" :active="request()->routeIs('barang.index')" class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="{{ route('barang.index') }}">Barang</a>
                        </li>
                        <li href="{{ route('kategori.index') }}" :active="request()->routeIs('kategori.index')" class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="{{ route('kategori.index') }}">Katageori</a>
                        </li>
                        <li href="{{ route('divisi.index') }}" :active="request()->routeIs('divisi.index')" class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="{{ route('divisi.index') }}">Divisi</a>
                        </li>
                        <li href="{{ route('supplier.index') }}" :active="request()->routeIs('supplier.index')" class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="{{ route('supplier.index') }}">Supplier</a>
                        </li>

                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600" @click="isPagesMenuOpen = !isPagesMenuOpen" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                        <span class="ml-4">TRANSAKSI</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="{{ route('pengajuan.index') }}">
                                Pengajuan
                            </a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="{{ route('pembelians.index') }}">
                                Pembelian
                            </a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="pages/forgot-password.html">
                                Forgot password
                            </a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="pages/404.html">
                                404
                            </a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-purple-600">
                            <a class="w-full" href="pages/blank.html">
                                Blank
                            </a>
                        </li>
                    </ul>
                </template>
            </li>
        </ul>
    </div>
</aside>
