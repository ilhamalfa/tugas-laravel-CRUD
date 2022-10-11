<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Http\Requests\StoresiswaRequest;
use App\Http\Requests\UpdatesiswaRequest;
use App\Models\sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan Data Dari Database

        // 1. Nampilin Semua
        // $data = DB::select('select * from siswa');

        // 2. Nampilin Semua Data
        // $data2 = DB::table('siswa')->get();

        // 3. Nampilin Kolom Tertentu
        // $data3 = DB::table('siswa')->select('id', 'nama')->get();

        // 4. Nampilin Semua Data Pada Table
        $data4 = siswa::all();

        // 5. Join Table
        // $data5 = siswa::select('siswa.id', 'siswa.nis', 'siswa.nama', 'siswa.alamat', 'sekolah.nama_sekolah')->join('sekolah', 'siswa.sekolah_id', '=', 'sekolah.id')->get();

        // dd($data5);

        // return view('table', compact('data4'));
        return view('table', [
            'data' => $data4
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = sekolah::all();

        return view('tampil', [
            'data' => $sekolah
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // Cara 1 Memasukkan Data ke Database
        // DB::insert('insert into siswa (nis, nama, alamat, sekolah_id) values (?, ?, ?, ?)', [$request->nis, $request->nama, $request->alamat, $request->sekolah_id]);

        // Cara 2 Memasukkan Data ke Database
        // DB::table('siswa')->insert([
        //     'nis' => $request->nis,
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'sekolah_id' => $request->sekolah_id
        // ]);

        // Cara 3 Memasukkan Data ke Database
        // siswa::create($request->all());

        // Cara 4 Memasukkan Data ke Database
        // siswa::create([
        //     'nis' => $request->nis,
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'sekolah_id' => $request->sekolah_id
        // ]);

        // Validasi
        $validate = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'required',
            'sekolah_id' => 'required'
        ]);

        // Memasukkan Data Yang Telah divalidasi
        siswa::create($validate);

        return redirect('siswa')->with('success', 'Data '. $request->nama .' Berhasil Diinputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa)
    {
        $sekolah = sekolah::all();

        // \dd($siswa);
        return view('edit', [
            'data_siswa' => $siswa,
            'data_sekolah' => $sekolah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesiswaRequest  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siswa $siswa)
    {
        // \dd($siswa);

        // Validasi
        $validate = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'required',
            'sekolah_id' => 'required'
        ]);

        // Memasukkan Data Yang Telah divalidasi
        DB::table('siswa')->where('id', $siswa->id)
            ->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'sekolah_id' => $request->sekolah_id,
            ]);

            return redirect('siswa')->with('success', 'Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        // \dd($siswa);

        DB::table('siswa')->where('id', $siswa->id)->delete();

        return redirect('siswa')->with('success', 'Data Berhasil Dihapus!');
    }
}
