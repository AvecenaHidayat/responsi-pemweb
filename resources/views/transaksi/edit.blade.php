<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Transaksi
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Tipe Transaksi</label>
                    <select name="tipe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                        <option value="pemasukan" {{ $transaksi->tipe === 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                        <option value="pengeluaran" {{ $transaksi->tipe === 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <input type="text" name="deskripsi" value="{{ $transaksi->deskripsi }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Jumlah (Rp)</label>
                    <input type="number" name="jumlah" value="{{ $transaksi->jumlah }}" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('transaksi.index') }}" class="text-sm text-blue-500 hover:underline">← Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
