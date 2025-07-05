<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Transaksi
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('transaksi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Transaksi</a>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Tipe</th>
                        <th class="px-4 py-2">Deskripsi</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $t)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $t->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-2 capitalize">{{ $t->tipe }}</td>
                            <td class="px-4 py-2">{{ $t->deskripsi }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('transaksi.edit', $t->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                                <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-2 text-center text-gray-500">Belum ada transaksi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
