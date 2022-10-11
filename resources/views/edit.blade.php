@extends('layouts/layout-template')

@section('main')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Siswa Baru</h1>
    </div>
    
    {{-- 1. Menggunakan Route --}}
    {{-- <form action="{{ route('siswa.store') }}" method="POST"> --}}

    {{-- 2. Menggunakan URL --}}
    <form action="{{ url('siswa/'. $data_siswa->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nomor Induk Siswa</label>
            <input type="number" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" placeholder="Nomor Induk Siswa" value="{{ $data_siswa->nis }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Siswa</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Siswa" value="{{ $data_siswa->nama }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat Siswa</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat Siswa" value="{{ $data_siswa->alamat }}">
        </div>
        <div class="form-group">
            <label>Sekolah</label>
            <select id="sekolah_id" name="sekolah_id" class="form-control @error('sekolah_id') is-invalid @enderror">
                <option value="">Pilih Sekolah</option>
                @foreach ($data_sekolah as $sekolah)
                    <option value="{{ $sekolah->id }}" @selected($data_siswa->sekolah_id == $sekolah->id)>{{ $sekolah->nama_sekolah }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Input Data Siswa</button>
    </form>

@endsection