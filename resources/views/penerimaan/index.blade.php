<x-app-layout>
    <x-slot name="header">
        {{ __('Daftar Penerimaan') }}
    </x-slot>

    <div class="p-4 bg-gray-800 rounded-lg shadow-xs">
        <div class="space-y-6 px-6 mx-auto">
            <div>
                <!-- Form Filter -->
                <div class="max-w-screen-xl p-6 px-6 mx-auto lg:px-1 w-full">
                    <div class="relative bg-white shadow-md dark:bg-gray-700 sm:rounded-lg">
                        <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <div class="w-full md:w-1/2">
                                <form action="{{ route('penerimaan.index') }}" method="GET" class="max-w-sm pt-1">
                                    <div class="flex items-center space-x-4">
                                        <!-- Input Label dan Select -->
                                        <div class="flex-1">
                                            <label for="division" class="absolute p-5 text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Pilih Tanggal</label>

                                            <select class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-100 bg-gray-50 dark:bg-gray-800 border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" id="division" name="division">
                                                <option value="">Semua Tanggal</option>
                                            </select>
                                        </div>

                                        <!-- Button -->
                                        <div>
                                            <button type="submit" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path d="M11.625 16.5a1.875 1.875 0 1 0 0-3.75 1.875 1.875 0 0 0 0 3.75Z" />
                                                    <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 0 0 1.06-1.06l-1.047-1.048A3.375 3.375 0 1 0 11.625 18Z" clip-rule="evenodd" />
                                                    <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                <button type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    <a href="{{ route('penerimaan.create') }}" type="button"><i class=" "></i> Tambah Data</a>
                                </button>
                                <div class="flex items-center w-full space-x-3 md:w-auto">
                                    <!-- Dropdown Sortir Button -->
                                    <button id="sortDropdownButton" data-dropdown-toggle="sortDropdown" class="w-full px-4 py-2 text-sm font-medium text-gray-400 dark:hover:text-white bg-gray-100 hover:bg-gray-700  rounded-lg text-center inline-flex items-center border-2 border-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 " type="button">
                                        Sortir
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 ms-3 ">
                                            <path d="M14 2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v2.172a2 2 0 0 0 .586 1.414l2.828 2.828A2 2 0 0 1 6 9.828v4.363a.5.5 0 0 0 .724.447l2.17-1.085A2 2 0 0 0 10 11.763V9.829a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 0 14 4.172V2Z" />
                                        </svg>

                                    </button>

                                    <!-- Dropdown menu -->
                                    <div id="sortDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-600">

                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="sortDropdownButton">

                                            <li>
                                                <a href="{{ route('penerimaan.index', ['sort' => 'price_asc']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">Harga dari Kecil ke Besar</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('penerimaan.index', ['sort' => 'price_desc']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">Harga dari Besar ke Kecil</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('penerimaan.index', ['sort' => 'date_asc']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">Tanggal dari Terlama ke Terbaru</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('penerimaan.index', ['sort' => 'date_desc']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">Tanggal dari Terbaru ke Terlama</a>
                                            </li>
                                        </ul>
                                    </div>



                                    <!-- Filter Dropdown -->
                                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                        <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                        Filter
                                    </button>
                                    <div id="filterDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="filterDropdownButton">
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Data penerimaan -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <table class="whitespace-no-wrap w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr class=" text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-900">
                                    <th class=" px-4 py-3">No</th>
                                    <th class=" px-4 py-3">Tanggal Penerimaan</th>
                                    <th class=" px-4 py-3">Jumlah Penerimaan</th>
                                    <th class=" px-4 py-3">Nama Pengaju</th>
                                    <th class=" px-4 py-3">Divisi Pengaju</th>
                                    <th class=" px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($penerimaans as $index => $penerimaan)
                                <tr class=" text-gray-400 text-center">
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3">
                                        {{ $penerimaan->tanggal_penerimaan ? $penerimaan->tanggal_penerimaan->format('d-m-Y') : 'Tanggal tidak tersedia' }}
                                    </td>
                                    <td class="px-4 py-3">{{ $penerimaan->jumlah_penerimaan }}</td>
                                    <td class="px-4 py-3">{{ $penerimaan->pengajuan->namaPengajuan ?? 'Nama tidak tersedia' }}</td>
                                    <td class="px-4 py-3">{{ $penerimaan->pengajuan->divisi->divisi ?? 'Divisi tidak tersedia' }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex justify-center space-x-1">
                                            <a href="{{ route('penerimaan.show', $penerimaan->id) }}" class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-800 bg-white-300 rounded-lg dark:text-gray-500 hover:dark:text-green-300 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path d="M11.625 16.5a1.875 1.875 0 1 0 0-3.75 1.875 1.875 0 0 0 0 3.75Z" />
                                                    <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 0 0 1.06-1.06l-1.047-1.048A3.375 3.375 0 1 0 11.625 18Z" clip-rule="evenodd" />
                                                    <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('penerimaan.edit', $penerimaan->id) }}" class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-800 bg-white-300 rounded-lg dark:text-gray-500 hover:dark:text-yellow-300 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                <svg class="w-5 h-5 tr" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </a>
                                            <!-- Modal Trigger -->
                                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-penerimaan-deletion-{{ $penerimaan->id }}')" class="flex items-center px-2 py-2 text-sm font-medium text-red-700 bg-white-700 rounded-lg dark:text-gray-500 hover:dark:text-red-700 focus:outline-none focus:shadow-outline-gray">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <!-- Modal -->
                                            <x-modal name="confirm-penerimaan-deletion-{{ $penerimaan->id }}" focusable>
                                                <form method="post" action="{{ route('penerimaan.destroy', $penerimaan->id) }}" class="p-6">
                                                    @csrf
                                                    @method('delete')
                                                    <h2 class="text-lg font-medium text-gray-400">
                                                        {{ __('Apakah anda yakin ingin menghapus data penerimaan ini?') }}
                                                    </h2>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        {{ __('Sekali anda menghapusnya, maka data akan tehapus secara permanen. Silahkan klik tombol hapus untuk melanjutkan penghapusan data secara permanen.') }}
                                                    </p>
                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Kembali') }}
                                                        </x-secondary-button>
                                                        <x-danger-button class="ms-3">
                                                            {{ __('Hapus') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sortButton = document.getElementById('sortDropdownButton');
            const sortDropdown = document.getElementById('sortDropdown');

            sortButton.addEventListener('click', function() {
                sortDropdown.classList.toggle('hidden');
            });

            // Close the dropdown if clicked outside
            document.addEventListener('click', function(event) {
                if (!sortButton.contains(event.target) && !sortDropdown.contains(event.target)) {
                    sortDropdown.classList.add('hidden');
                }
            });
        });

    </script>


</x-app-layout>
