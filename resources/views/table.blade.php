@extends('layouts/layout-template')

@section('main')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{ url('siswa/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
        {{-- Pake Route --}}
        {{-- <a href="{{ route('siswa.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Pake Route</a> --}}
        </div>
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <table class="table table-light" id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Sekolah</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->sekolah->nama_sekolah }}</td>
                    <td>
                        {{-- Menggunakan URL --}}
                        {{-- <a href="{{ url('siswa/'. $item->id .'/edit') }}" class="btn btn-warning">Edit</a>  --}}
                        {{-- Menggunakan Route --}}
                        <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a> 
                    </td>
                    <td>
                        {{-- Menggunakan route resource --}}
                        <form action="{{ url('siswa/'. $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $data->links() }}

@endsection