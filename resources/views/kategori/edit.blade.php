<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Kategori') }}
    </x-slot>

    <div class="container grid px-6 mx-auto">
        <!-- form start -->
        <form action="{{ route('kategori.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div>
                    <div class="relative">
                        <x-text-input placeholder=" " id="kategori" name="kategori" type="text" class="mt-1 block w-full" :value="old('kategori', $data->kategori)" />

                        <x-input-label for="kategori" :value="__('Kategori')" />
                        <x-input-error class="mt-2" :messages="$errors->get('kategori')" />
                    </div>
                    <div class="mt-4 card-footer">
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Submit</button>
                        <a href="{{ route('kategori.index') }}" type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Kembali</a>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->

        </form>
    </div>
</x-app-layout>
