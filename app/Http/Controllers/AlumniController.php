<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $alumnis = Alumni::all();

        // $data = [
        //     'alumnis' => $alumnis,
        // ];

        // return view('alumni.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nim' => 'required|unique:alumnis',
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telepon' => 'required',
            'nik' => 'required'
        ]);

        Alumni::create($request->all());

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumni $alumni)
    {
        //
        $data = [
            'alumni' => $alumni,
        ];
        
        return view('alumni.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumni $alumni)
    {
        //
        $request->validate([
            'nim' => 'required|unique:alumnis,nim,' . $alumni->id,
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telepon' => 'required',
            'nik' => 'required'
        ]);

        $alumni->update($request->all());

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Alumni::find($id)->delete();
    }
}
