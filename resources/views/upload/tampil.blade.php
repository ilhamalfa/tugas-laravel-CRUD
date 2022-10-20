@extends('layouts.layout-template')

@section('main')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tampil Image</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($image as $img)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/'. $img->gambar) }}" alt="" class="img img-thumbnail" style="height: 300px;"></td>
                <td>
                    <a href="{{ url('upload/'. $img->id. '/edit') }}" class="btn btn-warning">Edit</a>
                        <form action="{{ url('upload/'. $img->id) }}" method="POST">
                            @method('delete')
                            @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection