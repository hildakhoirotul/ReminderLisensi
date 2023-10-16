<?php

namespace App\Http\Controllers;

use App\Exports\LisensiExport;
use App\Imports\LisensiImport;
use App\Models\Lisensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Lisensi::count();
        $data = Lisensi::paginate(100);
        return view('user.home', compact('data', 'count'));
    }

    public function notifikasi()
    {
        return view('user.notifikasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'reminder1' => 'date',
            'reminder2' => 'date',
            'reminder3' => 'date',
        ]);

        $data = new Lisensi();
        $data->nama_dokumen = $request->nama_dokumen;
        $data->start = $request->start;
        $data->end = $request->end;
        $data->reminder1 = $request->reminder1;
        $data->reminder2 = $request->reminder2;
        $data->reminder3 = $request->reminder3;
        $data->save();

        // if ($data->end) {
        //     $endDateTime = \Carbon\Carbon::parse($data->end);
        //     $now = \Carbon\Carbon::now();

        //     if ($now >= $endDateTime) {
        //         event(new ReminderNotification($data));
        //     }
        // }

        Alert::success('Berhasil', 'Data telah tersimpan.');
        return redirect()->route('dashboard');
    }

    public function importDatabase(Request $request)
    {
        $file = $request->file('file');
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $nama_file = rand() . $file->getClientOriginalName();
        // Lisensi::truncate();

        $path = $file->storeAs('public/excel/', $nama_file);

        $import = new LisensiImport();
        Excel::import($import, $file);

        Storage::delete($path);
        return redirect()->back();
    }

    public function exportDatabase()
    {
        $data = Lisensi::all()->toArray();
        return Excel::download(new LisensiExport($data), 'Lisensi.xlsx');
    }

    public function resetLisensi()
    {
        Lisensi::truncate();
        return redirect()->back();
    }

    public function searchlisensi(Request $request)
    {
        $searchTerm = $request->input('search');

        $query = Lisensi::query();

        if ($searchTerm) {
            $query->where('nama_dokumen', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('start', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('end', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('reminder1', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('reminder2', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('reminder3', 'LIKE', '%' . $searchTerm . '%');
        }

        $data = $query->get();

        return view('admin.partial.lisensi', ['data' => $data]);
    }

    public function destroy($id)
    {
        $lisensi = Lisensi::find($id);
        $lisensi->delete();
        return redirect()->back();
    }

    public function EditLisensi(Request $request)
    {
        $data = Lisensi::find($request->id);
        // dd($request->newData);
        // $data->nama_dokumen = $request->newData;
        foreach ($request->newData as $fieldName => $fieldValue) {
            $data->{$fieldName} = $fieldValue;
        }


        $data->save();
        // dd($request->newData);

        return redirect()->back();
    }

}
