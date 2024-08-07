<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Penerimaan') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <form action="{{ route('penerimaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="relative">
                    <x-text-input placeholder=" " type="date" id="tanggalPenerimaan" name="tanggalPenerimaan" class="block w-full" value="{{ old('tanggalPenerimaan') }}" required autofocus />
                    <x-input-label for="tanggalPenerimaan" :value="__('Tanggal Penerimaan')" />
                    <x-input-error :messages="$errors->get('tanggalPenerimaan')" class="mt-2" />
                </div>
                <div class="mt-4 relative">
                    <x-text-input placeholder=" " type="text" id="penerima" name="penerima" class="block w-full" value="{{ old('penerima') }}" required autofocus />
                    <x-input-label for="penerima" :value="__('Penerima')" />
                    <x-input-error :messages="$errors->get('penerima')" class="mt-2" />
                </div>
                <div class="mt-4 relative" id="barang-container">
                    <x-input-label for="barangId" :value="__('Nama & Jumlah Barang')" />
                    <div class="flex space-x-2 mt-2 relative">
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
                    </div>
                    <x-input-error :messages="$errors->get('barangId')" class="mt-2" />
                </div>
                <button type="button" class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" onclick="addBarangSelect()">Tambah Barang</button>
                <div class="mt-4 card-footer">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Tambah Data</button>
                    <a href="{{ route('penerimaan.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Kembali</a>
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
