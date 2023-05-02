<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Mahasiswa_MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if(strlen($search)){
            $mahasiswas = Mahasiswa::where('nama', 'LIKE', "%$search%") -> paginate(5);
        }
        else{
            $mahasiswas = Mahasiswa::paginate(5);
        }
        return view('mahasiswas.index', ['paginate'=>$mahasiswas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'tanggalLahir' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            $mahasiswas = new Mahasiswa;
            $mahasiswas->nim=$request->get('nim');
            $mahasiswas->nama=$request->get('nama');
            $mahasiswas->email=$request->get('email');
            $mahasiswas->tanggalLahir=$request->get('tanggalLahir');
            $mahasiswas->jurusan=$request->get('jurusan');
            $mahasiswas->no_handphone=$request->get('no_handphone');

            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');

            $mahasiswas->kelas()->associate($kelas);
            $mahasiswas->save();
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $Mahasiswa = Mahasiswa::find($nim);
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'tanggalLahir' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            ]);
        //    //fungsi eloquent untuk mengupdate data inputan kita
        $mahasiswas = Mahasiswa::with('kelas')->where('nim', $nim)->first();
            $mahasiswas->nim=$request->get('nim');
            $mahasiswas->nama=$request->get('nama');
            $mahasiswas->email=$request->get('email');
            $mahasiswas->tanggalLahir=$request->get('tanggalLahir');
            $mahasiswas->jurusan=$request->get('jurusan');
            $mahasiswas->no_handphone=$request->get('no_handphone');

            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');

            $mahasiswas->kelas()->associate($kelas);
            $mahasiswas->save();
        //    //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        //
        // fungsi eloquent untuk menghapus data
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function khs($nim)
    {
        $Mahasiswa = Mahasiswa::find($nim);

        return view('mahasiswas.khs', compact('Mahasiswa'));
    }
}
