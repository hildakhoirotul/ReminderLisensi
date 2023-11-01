<?php

namespace App\Imports;

use App\Models\Lisensi;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Throwable;

class LisensiImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithBatchInserts
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    use Importable, SkipsFailures;

    protected $errors = [];
    protected $items = [];

    public function rules(): array
    {
        return [
            'reminder1' => 'required',
        ];
    }

    public function model(array $row)
    {
        $start = intval($row['start']);
        $end = intval($row['end']);
        $reminder1 = intval($row['reminder1']);
        $reminder2 = intval($row['reminder2']);
        $reminder3 = intval($row['reminder3']);

        $lisensi2 =  new Lisensi([
            'nama_dokumen' => $row['nama_dokumen'],
            'start' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($start)->format('Y-m-d'),
            'end' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($end)->format('Y-m-d'),
            'reminder1' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($reminder1)->format('Y-m-d'),
            'reminder2' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($reminder2)->format('Y-m-d'),
            'reminder3' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($reminder3)->format('Y-m-d'),
        ]);
        $this->items[] = $lisensi2;

        $reminder1Date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($reminder1)->format('Y-m-d');
        $reminder2Date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($reminder2)->format('Y-m-d');
        $reminder3Date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($reminder3)->format('Y-m-d');

        if ($reminder2Date < $reminder1Date) {
            // $this->errors[] = 'Tanggal Reminder 2 tidak boleh lebih awal daripada Reminder 1.';
            return null;
        }

        if ($reminder3Date < $reminder2Date) {
            return null;
        }

        $lisensi =  new Lisensi([
            'nama_dokumen' => $row['nama_dokumen'],
            'start' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($start)->format('Y-m-d'),
            'end' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($end)->format('Y-m-d'),
            'reminder1' => $reminder1Date,
            'reminder2' => $reminder2Date,
            'reminder3' => $reminder3Date,
        ]);

        return $lisensi;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function onError(Throwable $e)
    {
        $this->errors[] = $e->getMessage();
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function withValidation($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->any()) {
                $this->errors[] = $validator->errors()->all();
            }
        });
    }

    public function customValidationMessages(): array
    {
        return [
            'reminder1.required' => 'Reminder 1 harus diisi.',
        ];
    }
}
