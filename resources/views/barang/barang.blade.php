<x-app-layout>
    <x-slot name="header">
        {{ __('Halaman Utama Table Barang') }}
    </x-slot>

    <div class="p-4 bg-gray-800 rounded-lg shadow-xs">

        {{ __('') }}

        <div class="space-y-6 px-6 mx-auto">
            <div>
                <div class="p-4 dark:bg-dark-800">
                    <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                        <a href="{{ route('barang.create') }}" type="button"><i class="fas fa-plus"></i> Tambah Data</a>
                    </button>
                </div>


                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="whitespace-no-wrap w-full">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-900">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Kode Barang</th>
                                    <th class="px-4 py-3">Barang</th>
                                    <th class="px-4 py-3">Stok</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @if ($barangs->count() > 0)
                                @foreach ($barangs as $data)
                                <tr class="text-gray-400 text-center">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">KB-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-4 py-3">{{ $data->barang }}</td>
                                    <td class="px-4 py-3">{{ $data->stok }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex justify-center space-x-1">
                                            <a href="{{ route('barang.edit', $data->id) }}" class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-800 bg-white-300 rounded-lg dark:text-gray-500 hover:dark:text-yellow-300 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </a>
                                            <!-- Modal Trigger -->
                                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-barang-deletion-{{ $data->id }}')" class="flex items-center px-2 py-2 text-sm font-medium text-red-700 bg-white-700 rounded-lg dark:text-gray-500 hover:dark:text-red-700 focus:outline-none focus:shadow-outline-gray">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <!-- Modal -->
                                            <x-modal name="confirm-barang-deletion-{{ $data->id }}" focusable>
                                                <form method="post" action="{{ route('barang.destroy', $data->id) }}" class="p-6">

                                                    @csrf
                                                    @method('delete')

                                                    <h2 class="text-lg font-medium text-gray-400">
                                                        {{ __('Apakah anda yakin ingin menghapus data barang ini?') }}
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
                                @endforeach
                                @else
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="text-center" colspan="8">DATA NOT FOUND</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
