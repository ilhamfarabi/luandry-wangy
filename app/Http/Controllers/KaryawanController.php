<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
// use App\Exports\KaryawanExport;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // 🔍 SEARCH
        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('role', 'like', "%$search%");
            });
        }

        // 🔽 SORTING
        $sort_by  = $request->get('sort_by', 'id');
        $sort_dir = $request->get('sort_dir', 'asc');

        if (in_array($sort_by, ['id','name','email','role','created_at']) &&
            in_array($sort_dir, ['asc','desc'])) {
            $query->orderBy($sort_by, $sort_dir);
        }

        // 📄 PAGINATION
        $karyawans = $query->paginate(5)->appends($request->all());

        return view('karyawan.index', compact('karyawans'));
    }

    public function exportExcel()
    {
        // Sesuaikan sendiri kalau mau export users
        // return Excel::download(new UserExport, 'data_user.xlsx');
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role'     => 'required|string|max:50', // bisa diganti in:admin,user kalau mau fix
        ]);

        User::create($data); // password otomatis di-hash dari casts()

        return redirect()->route('karyawan.index')
            ->with('success', 'User berhasil ditambah');
    }

    public function edit(User $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $r, User $karyawan)
    {
        $data = $r->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $karyawan->id,
            'password' => 'nullable|string|min:8',
            'role'     => 'required|string|max:50',
        ]);

        if (empty($data['password'])) {
            unset($data['password']); // jangan update password kalau kosong
        }

        $karyawan->update($data);

        return redirect()->route('karyawan.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $karyawan)
    {
        $karyawan->delete();
        return back()->with('success', 'User berhasil dihapus');
    }
}
