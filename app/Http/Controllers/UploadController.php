<?php

namespace App\Http\Controllers;

use App\Models\upload;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = upload::all();

        return view('upload.tampil', [
            'image' => $image
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = upload::all();
        
        return view('upload.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'gambar' => 'required|image|max:10000'
        ]);

        $file = $request->file('gambar')->store('img');

        // return $file;
        upload::create([
            'gambar' => $file
        ]);

        return redirect('upload')->with('success', 'Data Berhasil Diupload');
        // dd($request);
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
        $data = upload::find($id);

        return view('upload.edit', [
            'image' => $data
        ]);
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
        $data = upload::find($id);

        if($request->file('gambar')){
            $validate = $request->validate([
                'gambar' => 'required|image|max:10000'
            ]);
            
            if(fileExists('storage/'. $request->namaGambar)){
                unlink('storage/'. $request->namaGambar);
            }

            $file = $request->file('gambar')->store('img');

            // return $file;
            $data->update([
                'gambar' => $file
            ]);
        }else{
            $data->update([
                'gambar' => $data->gambar
            ]);
        }

        return redirect('upload')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = upload::find($id);

        if(fileExists('storage/'. $data->gambar)){
            unlink('storage/'. $data->gambar);
        }

        $data->delete($data);

        return redirect('upload')->with('success', 'Data Berhasil Dihapus!');
    }
}
