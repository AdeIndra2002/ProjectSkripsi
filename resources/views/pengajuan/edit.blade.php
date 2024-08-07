<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Pengajuan') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <!-- Nama Pengaju -->
                <div class="relative">
                    <x-text-input placeholder=" " type="text" id="namaPengajuan" name="namaPengajuan" class="block w-full" value="{{ old('namaPengajuan', $pengajuan->namaPengajuan) }}" required autofocus />
                    <x-input-label for="namaPengajuan" :value="__('Nama Pengaju')" />
                    <x-input-error :messages="$errors->get('namaPengajuan')" class="mt-2" />
                </div>

                <!-- Tanggal Pengajuan -->
                <div class="mt-4 relative">
                    <x-text-input placeholder=" " type="date" id="tanggalPengajuan" name="tanggalPengajuan" class="block w-full" value="{{ old('tanggalPengajuan', $pengajuan->tanggalPengajuan) }}" required autofocus />
                    <x-input-label for="tanggalPengajuan" :value="__('Tanggal Pengajuan')" />
                    <x-input-error :messages="$errors->get('tanggalPengajuan')" class="mt-2" />
                </div>

                <!-- Nama & Jumlah Barang -->
                <div class="mt-4 relative" id="barang-container">
                    <x-input-label for="barangId" :value="__('Nama & Jumlah Barang')" />
                    @foreach($pengajuan->barangs as $index => $barang)
                    <div class="flex space-x-2 mt-2 relative">
                        <!-- Select Barang -->
                        <select name="barangId[]" id="barangId" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-300 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-600 peer" required>
                            <option value="">Pilih Barang</option>
                            @foreach($barangs as $barangItem)
                            <option value="{{ $barangItem->id }}" {{ $barangItem->id == $barang->id ? 'selected' : '' }}>{{ $barangItem->barang }}</option>
                            @endforeach
                        </select>
                        <!-- Input Jumlah -->
                        <div class="relative">
                            <x-text-input type="number" id="jumlah" name="jumlah[]" placeholder=" " class="block w-full" value="{{ old('jumlah.'.$index, $barang->pivot->jumlah) }}" required />
                            <label for="jumlah" class="absolute left-2 text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Jumlah</label>
                        </div>
                    </div>
                    @endforeach
                    <x-input-error :messages="$errors->get('barangId')" class="mt-2" />
                </div>

                <!-- Button Tambah Barang -->
                <button type="button" class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" onclick="addBarangSelect()">Tambah Barang</button>

                <!-- Pilih Divisi Pengaju -->
                <div class="mt-4 relative">
                    <x-input-label for="divisiId" :value="__('Pilih Divisi Pengaju')" />
                    <select name="divisiId" id="divisiId" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-300 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-600 peer" required autofocus>
                        <option value="">Pilih Divisi</option>
                        @foreach($divisis as $divisi)
                        <option value="{{ $divisi->id }}" {{ $divisi->id == $pengajuan->divisiId ? 'selected' : '' }}>{{ $divisi->divisi }} - {{ $divisi->kepalaDivisi }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('divisiId')" class="mt-2" />
                </div>

                <!-- Button Update dan Kembali -->
                <div class="mt-4 card-footer">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Perbarui Data</button>
                    <a href="{{ route('pengajuan.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Kembali</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        function addBarangSelect() {
            const container = document.getElementById('barang-container');
            const div = document.createElement('div');
            div.classList.add('flex', 'space-x-2', 'mt-2');
            div.innerHTML = `
                 <select name="barangId[]" id="barangId" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-300 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-600 peer" required>
                     <option value="">Pilih Barang</option>
                     @foreach($barangs as $barang)
                     <option value="{{ $barang->id }}">{{ $barang->barang }}</option>
                     @endforeach
                 </select>
                 <div class="relative">
                     <x-text-input type="number" id="jumlah" name="jumlah[]" class="block w-full" placeholder=" " required />
                     <label for="jumlah" class="absolute left-2 text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Jumlah</label>
                 </div>
            `;
            container.appendChild(div);
        }

    </script>
</x-app-layout>
