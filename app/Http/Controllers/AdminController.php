<?php

namespace App\Http\Controllers;

use App\Events\RealTimeMessage;
use App\Events\ReminderNotification;
use App\Exports\LisensiExport;
use App\Imports\LisensiImport;
use App\Jobs\LisensiImport as JobsLisensiImport;
use App\Models\Lisensi;
use App\Models\Notifikasi;
use App\Models\User;
use App\Notifications\RealTimeNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Lisensi::count();
        $data = Lisensi::paginate(100);
        $notif = Notifikasi::where('read', false)->get();
        $countNotif = Notifikasi::where('read', false)->count();
        return response()->view('admin.dashboard', compact('data', 'count', 'notif', 'countNotif'));
    }

    public function userPage()
    {
        $count = User::count();
        $data = User::paginate(100);
        $notif = Notifikasi::where('read', false)->get();
        $countNotif = Notifikasi::where('read', false)->count();
        return response()->view('admin.user', compact('data', 'count', 'notif', 'countNotif'));
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
            } elseif ($timeDifference->m > 1) {
                $notifikasi->category = 'Months ago';
            } else {

            }
            return $notifikasi;
        });

        return response()->view('admin.notifikasi', compact('categorizedNotifikasi', 'countNotif', 'notif'));
    }

    public function markAsRead(Request $request)
    {
        $notifikasiId = $request->input('notifikasi_id');
        $notifikasi = Notifikasi::find($notifikasiId);
        if ($notifikasi) {
            $notifikasi->read = true;
            $notifikasi->save();
        }
        return response()->json(['message' => 'Notifikasi ditandai sebagai dibaca']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $data->pic = $request->pic;
        $data->save();

        Alert::success('Berhasil', 'Data telah tersimpan.');
        return redirect()->route('dashboard');
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = new User();
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->chain = $request->password;
        $data->password = Hash::make($request->password);
        $data->save();

        Alert::success('Berhasil', 'Data telah tersimpan.');
        return redirect()->route('userpage');
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
                ->orWhere('reminder3', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('pic', 'LIKE', '%' . $searchTerm . '%');
        }

        $data = $query->get();

        return view('admin.partial.lisensi', ['data' => $data]);
    }

    public function searchUser(Request $request)
    {
        $searchTerm = $request->input('search');

        $query = User::query();

        if ($searchTerm) {
            $query->where('nik', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('nama', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('email', 'LIKE', '%' . $searchTerm . '%');
        }

        $data = $query->get();

        return view('admin.partial.user', ['data' => $data]);
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

    public function EditUser(Request $request)
    {
        $data = User::find($request->id);
        foreach ($request->newData as $fieldName => $fieldValue) {
            if ($fieldName === 'chain'){
                $data->chain = $fieldValue;
                $data->password = Hash::make($fieldValue);
            } else {
                $data->{$fieldName} = $fieldValue;
            }
        }

        $data->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $lisensi = Lisensi::find($id);
        $lisensi->delete();
        return redirect()->back();
    }

    public function userDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function resetLisensi()
    {
        Lisensi::truncate();
        return redirect()->back();
    }

    public function resetnotifikasi()
    {
        Notifikasi::truncate();
        return redirect()->back();
    }

    public function removeNotif(Request $request)
    {
        $ids = $request->input('ids');
        Notifikasi::whereIn('id', $ids)->delete();
        return redirect()->back();
    }

    public function unduh($nama_file)
    {
        $path = storage_path('app/public/Download/' . $nama_file);

        if (file_exists($path)) {
            return response()->download($path);
        } else {
            abort(404);
        }
    }
}
