<table>
    <thead>
    <tr>
        <th>#</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Sekolah</th>
    </tr>
    </thead>
    <tbody>
    @foreach($siswas as $siswa)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $siswa->nim }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->alamat }}</td>
            <td>{{ $siswa->sekolah->nama_sekolah }}</td>
        </tr>
    @endforeach
    </tbody>
</table>