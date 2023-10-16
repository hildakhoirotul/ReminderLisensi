<?php

namespace App\Imports;

use App\Models\Lisensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LisensiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $start = intval($row['start']);
        $end = intval($row['end']);
        $reminder1 = intval($row['reminder1']);
        $reminder2 = intval($row['reminder2']);
        $reminder3 = intval($row['reminder3']);

        return new Lisensi([
            'nama_dokumen' => $row['nama_dokumen'],
            'start' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($start)->format('Y-m-d'),
            'end'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($end)->format('Y-m-d'),
            'reminder1' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($reminder1)->format('Y-m-d'),
            'reminder2' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($reminder2)->format('Y-m-d'),
            'reminder3' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($reminder3)->format('Y-m-d'),
        ]);
    }
}
