<?php

namespace App\Http\Controllers;

use App\Exports\LisensiExport;
use App\Imports\LisensiImport;
use App\Jobs\LisensiImport as JobsLisensiImport;
use App\Models\Lisensi;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $notif = Notifikasi::where('read', false)->get();
        $countNotif = Notifikasi::where('read', false)->count();
        return view('user.home', compact('data', 'count', 'notif', 'countNotif'));
    }

    public function notifikasi()
    {
        $notif1 = Notifikasi::get();
        $countNotif = Notifikasi::where('read', false)->count();
        $notif = Notifikasi::where('read', false)->get();
        $categorizedNotifikasi = $notif1->map(function ($notifikasi) {
            $timeDifference = now()->diff($notifikasi->created_at);
            if ($timeDifference->d == 0) {
                $notifikasi->category = 'Today';
            } elseif ($timeDifference->d == 1) {
                $notifikasi->category = 'Yesterday';
            } elseif ($timeDifference->d <= 7) {
                $notifikasi->category = 'Last Week';
            } elseif ($timeDifference->m == 0) {
                $notifikasi->category = 'This Month';
            } else {
                $notifikasi->category = 'Months ago';
            }
            return $notifikasi;
        });

        return response()->view('user.notifikasi', compact('categorizedNotifikasi', 'countNotif', 'notif'));
    }

    public function markAs_Read(Request $request)
    {
        $notifikasiId = $request->input('notifikasi_id');
        $notifikasi = Notifikasi::find($notifikasiId);
        if ($notifikasi) {
            $notifikasi->read = true;
            $notifikasi->save();
        }
        // Respon sesuai kebutuhan Anda, misalnya JSON response
        return response()->json(['message' => 'Notifikasi ditandai sebagai dibaca']);
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

        JobsLisensiImport::dispatch($path)->onQueue('impor_lisensi');
        // $import = new LisensiImport();
        // Excel::import($import, $file);

        // Storage::delete($path);
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

    public function resetnotification()
    {
        Notifikasi::truncate();
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

    public function deleteNotif(Request $request)
    {
        $ids = $request->input('ids');
        Notifikasi::whereIn('id', $ids)->delete();
        return redirect()->back();
    }

    public function EditLisensi(Request $request)
    {
        $data = Lisensi::find($request->id);
        foreach ($request->newData as $fieldName => $fieldValue) {
            $data->{$fieldName} = $fieldValue;
        }


        $data->save();

        return redirect()->back();
    }
}
