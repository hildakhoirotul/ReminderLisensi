<?php

namespace App\Http\Controllers;

use App\Models\Lisensi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lisensi::paginate(20);
        return response()->view('admin.dashboard', compact('data'));
    }

    public function userPage()
    {
        return response()->view('admin.user');
    }

    public function notifikasi()
    {
        return response()->view('admin.notifikasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.dashboard');
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

        // dd($request);
        $data = new Lisensi();
        $data->nama_dokumen = $request->nama_dokumen;
        $data->start = $request->start;
        $data->end = $request->end;
        $data->reminder1 = $request->reminder1;
        $data->reminder2 = $request->reminder2;
        $data->reminder3 = $request->reminder3;
        $data->save();

        Alert::success('Berhasil', 'Data telah tersimpan.');
        return redirect() ->route('dashboard');
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
        //
    }
}
