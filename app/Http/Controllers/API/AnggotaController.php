<?php

namespace App\Http\Controllers\API;

use App\Models\Anggota;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (request('search')) {
        //     return Wilayah::join('anggotas', 'anggotas.id_cabang', '=', 'wilayahs.id')->where('nama_anggota', 'like', '%' . request('search') . '%')
        //         ->orderBy('anggotas.id', 'Desc')->paginate(2);
        // } else {
        //     return Wilayah::join('anggotas', 'anggotas.id_cabang', '=', 'wilayahs.id')->orderBy('anggotas.id', 'Desc')->paginate(2);
        // }

        // $data = Wilayah::join('anggotas', 'anggotas.id_cabang', '=', 'wilayahs.id')->query();
        // if (request('search')) {
        //     return $data->where('nama_anggota', 'like', '%' . request('search') . '%')
        //         ->orderBy('anggotas.id', 'Desc')->paginate(2);
        // } else {
        //     return $data->orderBy('anggotas.id', 'Desc')->paginate(2);
        // }
        $data = Wilayah::join('anggotas', 'anggotas.id_cabang', '=', 'wilayahs.id');
        return $data->when(request('search'), function ($query) {
            $query->where(request('searchField'), 'like', '%' . request('search') . '%');
        })->orderBy('anggotas.id', 'Desc')->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:100',
            'nama_anggota' => 'required|max:100',
            'jenis_kelamin' => 'required|max:100',
            'alamat' => 'required|max:100',
            'kelompok' => 'required|max:100',
            'petugas' => 'required|max:100',
            'id_cabang' => 'required|max:100',
        ]);
        return Anggota::create([
            'username' => $request->username,
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'kelompok' => $request->kelompok,
            'petugas' => $request->petugas,
            'id_cabang' => $request->id_cabang,
        ]);
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|max:100',
            'nama_anggota' => 'required|max:100',
            'jenis_kelamin' => 'required|max:100',
            'alamat' => 'required|max:100',
            'kelompok' => 'required|max:100',
            'petugas' => 'required|max:100',
            'id_cabang' => 'required|max:100',
        ]);

        $dtAnggota = [
            'username' => $request->username,
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'kelompok' => $request->kelompok,
            'petugas' => $request->petugas,
            'id_cabang' => $request->id_cabang,
        ];

        $ubahdata = Anggota::findOrFail($id);
        $ubahdata->update($dtAnggota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Anggota::findOrFail($id);
        $hapus->delete();
    }
}
