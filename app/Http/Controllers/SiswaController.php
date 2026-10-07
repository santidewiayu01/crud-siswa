<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa; // panggil model

class SiswaController extends Controller
{
    public function __construct()
{
    // middleware auth = harus login dulu
    $this->middleware('auth');
}
    // MENAMPILKAN DATA
    public function index(Request $request)
{
    // ambil keyword dari input search
    $keyword = $request->keyword;

    // query data dengan kondisi pencarian
    $siswa = Siswa::when($keyword, function ($query) use ($keyword) {
        return $query->where('nama', 'like', "%$keyword%")
                     ->orWhere('kelas', 'like', "%$keyword%")
                     ->orWhere('alamat', 'like', "%$keyword%");
    })->paginate(5);

    $totalKelas = Siswa::distinct('kelas')->count('kelas');

    return view('siswa.index', compact('siswa', 'totalKelas', 'keyword'));
}

    // FORM TAMBAH DATA
    public function create()
    {
        return view('siswa.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
        ]);

        // simpan ke database
        Siswa::create($request->only(['nama', 'kelas', 'alamat', 'jenis_kelamin', 'tanggal_lahir']));

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('siswa.edit', compact('siswa'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
        ]);

        $siswa->update($request->only(['nama', 'kelas', 'alamat', 'jenis_kelamin', 'tanggal_lahir']));

        return redirect('/siswa')->with('success', 'Data berhasil diupdate');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }
}