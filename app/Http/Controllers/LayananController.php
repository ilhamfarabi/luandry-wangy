<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LayananExport;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $query = Layanan::query();

        // SEARCH
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama_layanan', 'like', '%' . $search . '%');
        }

        // SORTING
        $sort_by  = $request->get('sort_by', 'id');
        $sort_dir = $request->get('sort_dir', 'asc');

        if (in_array($sort_by, ['id', 'nama_layanan', 'harga']) &&
            in_array($sort_dir, ['asc', 'desc'])) 
        {
            $query->orderBy($sort_by, $sort_dir);
        }

        // PAGINATION
        $layanans = $query->paginate(5)->appends($request->all());

        return view('layanan.index', compact('layanans'));
    }

    public function exportExcel()
    {
        return Excel::download(new LayananExport, 'data_layanan.xlsx');
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $r)
    {
        Layanan::create($r->all());

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $r, Layanan $layanan)
    {
        $layanan->update($r->all());

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return back()->with('success', 'Layanan berhasil dihapus!');
    }
}
