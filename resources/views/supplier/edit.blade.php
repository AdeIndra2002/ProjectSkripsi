<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Supplier') }}
    </x-slot>

    <div class="container grid px-6 mx-auto">
        <!-- form start -->
        <form action="{{ route('supplier.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div>
                    <div class="relative">
                        <x-text-input placeholder=" " id="namaSupplier" name="namaSupplier" type="text" class="mt-1 block w-full" :value="old('namaSupplier', $data->namaSupplier)" />
                        <x-input-label for="namaSupplier" :value="__('Nama Supplier')" />
                        <x-input-error class="mt-2" :messages="$errors->get('namaSupplier')" />
                    </div>
                    <div class="mt-4 relative">
                        <x-text-input placeholder=" " id="nomorHp" name="nomorHp" type="text" class="mt-1 block w-full" :value="old('nomorHp', $data->nomorHp)" />
                        <x-input-label for="nomorHp" :value="__('Nomor HP/WA')" />
                        <x-input-error class="mt-2" :messages="$errors->get('nomorHp')" />
                    </div>
                    <div class="mt-1 relative">
                        <label for="alamat" class="text-gray-700 dark:text-gray-400">Alamat</label>
                        <textarea class="block w-full mt-1  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" id="alamat" name="alamat" type="text" :value="old('alamat', $data->alamat)" />{{ $data->alamat }}</textarea>

                        <x-input-error class="mt-2" :messages="$errors->get('alamat')" />

                    </div>

                    <div class="mt-4 card-footer">
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Submit</button>
                        <a href="{{ route('supplier.index') }}" type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Kembali</a>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->

        </form>
    </div>
</x-app-layout>
