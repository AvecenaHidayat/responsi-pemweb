<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::where('user_id', Auth::id())->latest()->get();

        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'deskripsi' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
        ]);

        Transaksi::create([
            'user_id' => Auth::id(),
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'deskripsi' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $transaksi->update($request->only('tipe', 'deskripsi', 'jumlah'));

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
