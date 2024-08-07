<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Supplier') }}
    </x-slot>


    <div class="container px-6 mx-auto grid">
        <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="relative">
                    <x-text-input placeholder=" " type="text" id="namaSupplier" name="namaSupplier" class="block w-full" value="{{ old('namaSupplier') }}" required autofocus />
                    <x-input-label for="namaSupplier" :value="__('Nama Supplier')" />

                    <x-input-error :messages="$errors->get('namaSupplier')" class="mt-2" />
                </div>
                <div class="mt-4 relative">
                    <x-text-input placeholder=" " type="text" id="nomorHp" name="nomorHp" class="block w-full" value="{{ old('nomorHp') }}" required autofocus />
                    <x-input-label for="nomorHp" :value="__('Nomor HP/WA')" />

                    <x-input-error :messages="$errors->get('nomorHp')" class="mt-2" />
                </div>
                <div class="mt-1">
                    <label for="alamat" class="text-gray-700 dark:text-gray-400">Alamat</label>
                    <textarea class="block w-full mt-1  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Masukan Alamat Supplier." type="text" id="alamat" name="alamat" class="block w-full" value="{{ old('alamat') }}" required autofocus /></textarea>

                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                </div>
                <div class="mt-4 card-footer">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Tambah Data</button>
                    <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <a href="{{ route('supplier.index') }}" type="button">Kembali</a>
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
