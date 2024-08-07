<!-- resources/views/pembelians/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Pembelian') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <!-- Tanggal Pembelian -->
            <div class="relative">
                <x-input-label for="tanggalPembelian" :value="__('Tanggal Pembelian')" />
                <x-text-input type="date" id="tanggalPembelian" name="tanggalPembelian" class="block w-full" value="{{ $pembelian->tanggal_pembelian ? $pembelian->tanggal_pembelian->format('Y-m-d') : '' }}" disabled />
            </div>

            <!-- Pilih Pengajuan -->
            <div class="mt-4 relative">
                <x-input-label for="pengajuanId" :value="__('Pengajuan')" />
                <x-text-input type="text" id="pengajuanId" name="pengajuanId" class="block w-full" value="{{ $pembelian->pengajuan->namaPengajuan }}" disabled />
            </div>

            <!-- Total Harga -->
            <div class="mt-4 relative">
                <x-input-label for="totalHarga" :value="__('Total Harga')" />
                <x-text-input type="number" id="totalHarga" name="totalHarga" class="block w-full" value="{{ $pembelian->total_harga }}" disabled />
            </div>

            <!-- Pilih Supplier -->
            <div class="mt-4 relative">
                <x-input-label for="supplierId" :value="__('Supplier')" />
                <x-text-input type="text" id="supplierId" name="supplierId" class="block w-full" value="{{ $pembelian->supplier->namaSupplier }}" disabled />
            </div>

            <!-- Existing Images -->
            <div class="mt-4 relative">
                <label class="block text-sm font-medium text-gray-900 dark:text-gray-500" for="existingImages">Gambar</label>
                <div class="mt-2 flex flex-wrap gap-4">
                    @forelse($pembelian->gambarPembelian as $gambar)
                    <div class="relative group">
                        <a href="{{ asset('storage/' . $gambar->path) }}" target="_blank">
                            <img src="{{ asset('storage/' . $gambar->path) }}" alt="Gambar" class="h-auto max-w-60 transition-all duration-300 group-hover:blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute inset-0 w-6 h-6 m-auto text-white group-hover:visible invisible">
                                <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Zm8.25-3.75a.75.75 0 0 1 .75.75v2.25h2.25a.75.75 0 0 1 0 1.5h-2.25v2.25a.75.75 0 0 1-1.5 0v-2.25H7.5a.75.75 0 0 1 0-1.5h2.25V7.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    @empty
                    <p class="text-gray-500">Tidak ada gambar.</p>
                    @endforelse
                </div>
            </div>

            <!-- Button Kembali -->
            <div class="mt-4">
                <a href="{{ route('pembelians.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Kembali</a>
            </div>

        </div>
    </div>

</x-app-layout>
