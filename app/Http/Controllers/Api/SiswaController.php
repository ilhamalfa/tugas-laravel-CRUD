<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();

        // return response([
        //     'response' => 'sukses',
        //     'data' =>$data
        // ], 200);

        $respon = [
            'response' => 'sukses',
            'data' =>$data
        ];

        return response($respon, 200);
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
        // Validasi
        $validate = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'required',
            'sekolah_id' => 'required'
        ]);

        // Memasukkan Data Yang Telah divalidasi
        $data = siswa::create($validate);

        $respon = [
            'response' => 'Data Berhasil Disimpan',
            'data' => $data
        ];

        return response($respon, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = siswa::find($id);

        if($data){
            $respon = [
                'response' => 'sukses',
                'data' =>$data
            ];

            $stcode = 200;
        }else{
            $respon = [
                'response' => 'tidak ditemukan'
            ];

            $stcode = 400;
        }

        return response($respon, $stcode);
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
        $data = siswa::find($id);

        $data->update($request->all());

        $respon = [
            'response' => 'Data Berhasil Diubah',
            'data' => $data
        ];

        return response($respon, 201);

        // Pada Thunderbird, jika update menggunakan 'method put' dan 'Form-encode (di dalam Body)'
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = siswa::find($id);

        $data->delete();

        $respon = [
            'response' => 'Data Berhasil Dihapus',
            'data' => $data
        ];

        return response($respon, 201);
    }
}
