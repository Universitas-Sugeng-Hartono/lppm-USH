<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Visitor;
use File;

class PengumumanController extends Controller
{

    public function rules($id = false)
    {
        return  [
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::latest()->when(request()->search, function ($pengumuman) {
            $pengumuman = $pengumuman->where('isi', 'ilike', '%' . request()->search . '%');
        })->paginate(10);
        return view('pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, $this->rules());
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'foto-pengumuman';
            $fotoPengumuman = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $fotoPengumuman);
            $input['gambar'] = "$fotoPengumuman";
        } else {
            unset($input['gambar']);
        }
        if ($file = $request->file('file')) {
            $destinationPath = 'file-pengumuman';
            $filePengumuman = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filePengumuman);
            $input['file'] = "$filePengumuman";
        } else {
            unset($input['file']);
        }
        Pengumuman::create($input);
        return redirect()->route('pengumuman.index')
            ->withSuccess(__('Pengumuman created successfully.'));
    }

    public function pengumumanReview()
    {
        $pengumuman = Pengumuman::all();
        $totalVisitors = Visitor::count();
        return view('pengumuman.getindex', compact('pengumuman', 'totalVisitors'));
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
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $data = $this->validate($request, $this->rules());

        $input = $request->all();

        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'foto-pengumuman';
            File::delete($destinationPath . $pengumuman->gambar);
            $fotoPengumuman = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $fotoPengumuman);
            $input['gambar'] = "$fotoPengumuman";
        } else {
            unset($input['gambar']);
        }

        $pengumuman->update($input);
        return redirect()->route('pengumuman.index', compact('pengumuman'))
            ->withSuccess(__('Pengumuman updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect('/pengumuman')->with('status', 'Delete data succesfully.');
    }
}
