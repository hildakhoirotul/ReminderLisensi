<?php

namespace App\Http\Controllers;

use App\Events\RealTimeMessage;
use App\Events\ReminderNotification;
use App\Exports\LisensiExport;
use App\Imports\LisensiImport;
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
        $notif = Notifikasi::get();
        return response()->view('admin.dashboard', compact('data', 'count', 'notif'));
    }

    public function userPage()
    {
        $count = User::count();
        $data = User::paginate(100);
        $notif = Notifikasi::get();
        return response()->view('admin.user', compact('data', 'count', 'notif'));
    }

    public function notifikasi()
    {
        $notif = Notifikasi::get();

        $categorizedNotifikasi = $notif->map(function ($notifikasi) {
            $timeDifference = now()->diff($notifikasi->created_at);
            if ($timeDifference->d == 0) {
                $notifikasi->category = 'Today';
            } elseif ($timeDifference->d == 1) {
                $notifikasi->category = 'Yesterday';
            } elseif ($timeDifference->d <= 7) {
                $notifikasi->category = 'Last Week';
            } elseif ($timeDifference->m == 0){
                $notifikasi->category = 'This Month';
            } else {
                $notifikasi->category = 'Months ago';
            }
            return $notifikasi;
        });

        // dd($categorizedNotifikasi);
        return response()->view('admin.notifikasi', compact('deviceToken', 'notif', 'categorizedNotifikasi'));
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

        // if ($data->end) {
        //     $endDateTime = \Carbon\Carbon::parse($data->end);
        //     $now = \Carbon\Carbon::now();

        //     if ($now >= $endDateTime) {
        //         event(new ReminderNotification($data));
        //     }
        // }

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
        // dd($request->newData);
        // $data->nama_dokumen = $request->newData;
        foreach ($request->newData as $fieldName => $fieldValue) {
            $data->{$fieldName} = $fieldValue;
        }


        $data->save();
        // dd($request->newData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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

    public function saveToken(Request $request)
    {
        $user = Auth::user();
        $user->update(['device_token' => $request->token]);
        // dd($request->token);
        return response()->json(['token saved succesfully.']);
    }

    public function sendNotif(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $SERVER_API_KEY = 'AAAA4ETAcyY:APA91bF2667ab6Sk4pHcdnP7xS6To_-v51baOvMN2gl6YoxUqLn9TSmblyzVJaMrS2oKvfTrwz52TM3EeMeMwbXcxV-M-8X8opjSesIX00Qm7-Lvp_cySTnMRWQ__eAJ9v8kMsiRBVfR';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        return redirect()->back();
    }
}
