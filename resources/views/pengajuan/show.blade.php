<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Pengajuan') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <!-- Nama Pengajuan -->
            <div class="relative">
                <x-input-label for="namaPengajuan" :value="__('Nama Pengajuan')" />
                <x-text-input type="text" id="namaPengajuan" name="namaPengajuan" class="block w-full" value="{{ $pengajuan->namaPengajuan }}" disabled />
            </div>

            <!-- Tanggal Pengajuan -->
            <div class="mt-4 relative">
                <x-input-label for="tanggalPengajuan" :value="__('Tanggal Pengajuan')" />
                <x-text-input type="date" id="tanggalPengajuan" name="tanggalPengajuan" class="block w-full" value="{{ $pengajuan->tanggalPengajuan }}" disabled />
            </div>

            <!-- Nama & Jumlah Barang -->
            <div class="mt-4 relative">
                <x-input-label for="barangId" :value="__('Nama & Jumlah Barang')" />
                @foreach($pengajuan->barangs as $index => $barang)
                <div class="flex space-x-2 mt-2 relative">
                    <!-- Nama Barang -->
                    <select class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-300 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-600 peer" disabled>
                        <option value="{{ $barang->id }}">{{ $barang->barang }}</option>
                    </select>
                    <!-- Jumlah -->
                    <div class="relative">
                        <x-text-input type="number" id="jumlah" name="jumlah[]" class="block w-full" value="{{ $barang->pivot->jumlah }}" disabled />
                        <label for="jumlah" class="absolute left-2 text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Jumlah</label>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Divisi Pengaju -->
            <div class="mt-4 relative">
                <x-input-label for="divisiId" :value="__('Divisi Pengaju')" />
                <x-text-input type="text" id="divisiId" name="divisiId" class="block w-full" value="{{ $pengajuan->divisi->divisi }} - {{ $pengajuan->divisi->kepalaDivisi }}" disabled />
            </div>

            <!-- Button Kembali dan Cetak Surat -->
            <div class="mt-4 card-footer flex space-x-4">
                <a href="{{ route('pengajuan.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Kembali</a>

                <!-- Button Cetak Surat -->
                <a href="{{ route('pengajuan.generate', $pengajuan->id) }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:shadow-outline-green flex items-center">
                    <!-- SVG Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9h6v6H6zM15 9h6v6h-6zM6 15h6v6H6zM15 15h6v6h-6zM3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                    </svg>
                    Cetak Surat
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
