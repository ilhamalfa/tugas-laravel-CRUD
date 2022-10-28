<?php

namespace App\Exports;

use App\Models\siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithProperties;

// class SiswaExport implements FromCollection
// {
    /**
    * @return \Illuminate\Support\Collection
    */
//     public function collection()
//     {
//         return siswa::all();
//     }
// }

// class SiswaExport implements WithProperties
// {
    /**
    * @return \Illuminate\Support\Collection
    */
// }

// class SiswaExport implements FromQuery
// {
    /**
    * @return \Illuminate\Support\Collection
    */
//     use Exportable;

//     public function query()
//     {
//         return siswa::query('nis', 'nama', 'alamat');
//     }
// }

// Menggunakan View
class SiswaExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $siswa = siswa::select('nama')->where('id', '=', 31)->get();
        // $siswa = siswa::where('id', '=', 31)->get();
        // dd($siswa);

        return view('excel-siswa', [
            'siswa' => $siswa,
            'tanggal' => date(now())
        ]);
    }
}

// Query + Heading

// class SiswaExport implements FromQuery, WithHeadings
// {
//     use Exportable;

//     public function headings(): array
//     {
//         return[            
//             'nim',
//             'nama',
//             'alamat',
//             'sekolah'
//             ];
//     }

//     public function query(){
//         return siswa::select('nis', 'nama', 'alamat', 'sekolah_id');
//     }
// }