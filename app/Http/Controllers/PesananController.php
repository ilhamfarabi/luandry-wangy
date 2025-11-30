<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $query = Pesanan::with('layanan','user');

        if (auth()->user()->role === 'user') {
            $query->where('user_id', auth()->id());
        }

        $pesanans = $query->get();

        return view('pesanan.index', compact('pesanans'));
    }

    public function create() {
        $layanans = Layanan::all();
        return view('pesanan.create',compact('layanans'));
    }

    public function store(Request $r) {
        $layanan = Layanan::findOrFail($r->layanan_id);

        Pesanan::create([
            'user_id'       => Auth::id(),
            'layanan_id'    => $layanan->id,
            'nama_pelanggan'=> $r->nama_pelanggan,
            'jumlah'        => $r->jumlah,
            'total_harga'   => $layanan->harga * $r->jumlah,
        ]);

        return redirect()
            ->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    public function edit(Pesanan $pesanan) {
        $layanans = Layanan::all();
        return view('pesanan.edit',compact('pesanan','layanans'));
    }

    public function update(Request $r, Pesanan $pesanan) {
        $layanan = Layanan::findOrFail($r->layanan_id);

        $pesanan->update([
            'nama_pelanggan'=> $r->nama_pelanggan,
            'jumlah'        => $r->jumlah,
            'layanan_id'    => $layanan->id,
            'total_harga'   => $layanan->harga * $r->jumlah,
            'status'        => $r->status ?? 'pending',
        ]);

        return redirect()
            ->route('pesanan.index')
            ->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy(Pesanan $pesanan) {
        $pesanan->delete();

        return back()->with('success', 'Pesanan berhasil dihapus!');
    }
}
