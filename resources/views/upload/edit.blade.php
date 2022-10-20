@extends('layouts.layout-template')

@section('main')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Upload Image</h1>
    </div>

    <img src="{{ asset('storage/'.$image->gambar) }}" class="img img-thumbnail" style="height: 200px" alt="">

    <form action="{{ url('upload/'. $image->id) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="text" value="{{ $image->gambar }}" name="namaGambar" hidden>
        <div class="mb-3">
            <input class="form-control" type="file" id="formFile" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

@endsection