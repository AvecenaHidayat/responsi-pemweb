<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        <div class="bg-green-100 text-green-800 p-4 rounded-xl shadow">
            <h3 class="text-lg font-semibold">Total Pemasukan</h3>
            <p class="text-2xl mt-2">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
        </div>
        <div class="bg-red-100 text-red-800 p-4 rounded-xl shadow">
            <h3 class="text-lg font-semibold">Total Pengeluaran</h3>
            <p class="text-2xl mt-2">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
        </div>
    </div>
    <div class="mt-6">
        <a href="{{ route('transaksi.index') }}"
        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Kelola Transaksi
        </a>
    </div>

</x-app-layout>
