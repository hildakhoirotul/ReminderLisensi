<?php

namespace App\Exports;

use App\Models\Lisensi;
use Carbon\Carbon;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LisensiExport implements FromArray, WithHeadings, WithMapping, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Nama Dokumen',
            'Start',
            'End',
            'Reminder 1',
            'Reminder 2',
            'Reminder 3',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]]
        ];
    }

    public function map($row): array
    {
        foreach ($row as $key => $value) {
            if ($value === '0') {
                $row[$key] = '-';
            }

            // if (in_array($key, ['start', 'end', 'reminder1', 'reminder2', 'reminder3']) && $value !== '-') {
            //     $row[$key] = Carbon::createFromFormat('Y-m-d', $value)->format('d M Y');
            // }
        }

        return [
            $row['nama_dokumen'],
            $row['start'],
            $row['end'],
            $row['reminder1'],
            $row['reminder2'],
            $row['reminder3'],
        ];
    }
}
