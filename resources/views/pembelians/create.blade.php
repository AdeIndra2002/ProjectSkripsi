<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Pembelian') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <form action="{{ route('pembelians.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <!-- Tanggal Pembelian -->
                <div class="relative">
                    <x-text-input type="date" id="tanggalPembelian" name="tanggalPembelian" class="block w-full" value="{{ old('tanggalPembelian') }}" required autofocus />
                    <x-input-label for="tanggalPembelian" :value="__('Tanggal Pembelian')" />
                    <x-input-error :messages="$errors->get('tanggalPembelian')" class="mt-2" />
                </div>

                <!-- Pilih Pengajuan -->
                <div class="mt-4 relative">
                    <x-input-label for="pengajuanId" :value="__('Pilih Pengajuan')" />
                    <select name="pengajuanId" id="pengajuanId" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-300 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-600 peer" required>
                        <option value="">Pilih Pengajuan</option>
                        @foreach($pengajuans as $pengajuan)
                        <option value="{{ $pengajuan->id }}">{{ $pengajuan->namaPengajuan }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('pengajuanId')" class="mt-2" />
                </div>

                <!-- Total Harga -->
                <div class="mt-4 relative">
                    <x-text-input placeholder="" type="text" step="0.01" id="totalHarga" name="totalHarga" class="block w-full" value="{{ old('totalHarga') }}" required />
                    <x-input-label for="totalHarga" :value="__('Total Harga')" />
                    <x-input-error :messages="$errors->get('totalHarga')" class="mt-2" />
                </div>

                <!-- Pilih Supplier -->
                <div class="mt-4 relative">
                    <x-input-label for="supplierId" :value="__('Pilih Supplier')" />
                    <select name="supplierId" id="supplierId" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-300 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-600 peer" required>
                        <option value="">Pilih Supplier</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->namaSupplier }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('supplierId')" class="mt-2" />
                </div>

                <!-- Upload Gambar -->
                <div class="mt-2 relative">
                    <label class="block mb-1 mt-3 ml-1 text-sm font-medium text-gray-900 dark:text-gray-400" for="gambar">Upload Gambar</label>
                    <input class="block w-full text-lg text-gray-900 border border-gray-700 rounded-lg cursor-pointer bg-gray-600 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="gambar[]" id="gambar" type="file" multiple />
                    <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                </div>

                <!-- Button Simpan -->
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Simpan Pembelian
                    </button>
                    <a href="{{ route('pembelians.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
