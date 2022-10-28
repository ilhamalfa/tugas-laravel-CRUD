@extends('layouts.layout-template')

@section('main')

<div class="form-floating mb-3">
    <label for="floatingSelect">Wilayah</label>
    <select class="form-control" id="provinces" name="provinces" onchange="daerah(id, value)">
    </select>
</div>

<div class="form-floating mb-3">
    <label for="floatingSelect">Kabupaten</label>
    <select class="form-control" id="regencies" name="regencies" onchange="daerah(id, value)">
    </select>
</div>

<div class="form-floating mb-3">
    <label for="floatingSelect">Kecamatan</label>
    <select class="form-control" id="districts" name="districts" onchange="daerah(id, value)">
    </select>
</div>

<div class="form-floating mb-3">
    <label for="floatingSelect">Kelurahan</label>
    <select class="form-control" id="villages" name="villages">
    </select>
</div>
@endsection