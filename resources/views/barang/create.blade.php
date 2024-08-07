<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Barang') }}
    </x-slot>


    <div class="container px-6 mx-auto grid">
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="relative">
                    <x-text-input placeholder=" " type="text" id="barang" name="barang" class="block w-full" value="{{ old('barang') }}" required autofocus />
                    <x-input-label for="barang" :value="__('Naman Barang')" />

                    <x-input-error :messages="$errors->get('barang')" class="mt-2" />
                </div>
                <div class="mt-4 relative">
                    <x-text-input placeholder=" " type="text" id="stok" name="stok" class="block w-full" value="{{ old('stok') }}" required autofocus />
                    <x-input-label for="stok" :value="__('Jumlah Stok')" />

                    <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                </div>
                <div class="mt-4 card-footer">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Tambah Data</button>
                    <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <a href="{{ route('barang.index') }}" type="button">Kembali</a>
                    </button>
                </div>

            </div>


        </form>
    </div>

</x-app-layout>
