<?php

namespace App\Jobs;

use App\Imports\LisensiImport as ImportsLisensiImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class LisensiImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $path;
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Excel $excel)
    {
        $import = new ImportsLisensiImport();
        Excel::import($import, $this->path);

        // dd($import->getItems());
        $errorMessages = [];
        $i = "1";
        // foreach ($import->failures() as $failure) {
        //     $error = $failure->errors();
        //     $errorMessages[] = ($i++ . ". Kesalahan pada baris " . $failure->row() . ', ' . implode(", ", $error) . "<br>");

        // }

        foreach ($import->getItems() as $index => $item) {
            // dd($item['reminder1']);
            $index++;
            if ($item['nama_dokumen'] == 0 || $item['start'] == 0 || $item['end'] == 0 || $item['reminder1'] == 0 || $item['reminder2'] == 0 || $item['reminder3'] == 0) {
                $errorMessages[] = ($i++ . ". Kesalahan pada baris " . ($index + 1) . ", data tidak boleh kosong <br>");
            } else {
                if ($item['reminder2'] < $item['reminder1']) {
                    $errorMessages[] = ($i++ . ". Kesalahan pada baris " . ($index + 1) . ", Reminder 2 tidak bisa lebih awal dari Reminder 1 <br>");
                }
                if ($item['reminder3'] < $item['reminder2']) {
                    $errorMessages[] = ($i++ . ". Kesalahan pada baris " . ($index + 1) . ", Reminder 3 tidak bisa lebih awal dari Reminder 2 <br>");
                }
                if ($item['reminder1'] < $item['start']) {
                    $errorMessages[] = ($i++ . ". Kesalahan pada baris " . ($index + 1) . ", Reminder 1 tidak bisa lebih awal dari Start <br>");
                }
                if ($item['end'] < $item['reminder3']) {
                    $errorMessages[] = ($i++ . ". Kesalahan pada baris " . ($index + 1) . ", End tidak bisa lebih awal dari Reminder 3 <br>");
                }
                if ($item['end'] < $item['start']) {
                    $errorMessages[] = ($i++ . ". Kesalahan pada baris " . ($index + 1) . ", End tidak bisa lebih awal dari Start <br>");
                }
            }
        }

        if (!empty($errorMessages)) {
            $error = implode(" ", $errorMessages);
            Alert::html('<small>Impor Gagal</small>', '<small>Error pada: <br>' . $error)->width('600px');
            return redirect()->back();
        } else {
            Alert::success('Impor Berhasil', ' Berhasil diimpor');
            return redirect()->back();
        }

        Storage::delete($this->path);
    }
}
