<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karya;
use App\Models\User;
use File;
use Auth;

class KaryaController extends Controller
{

    public function rules($id = false)
    {
        return  [
            'jenis' => 'nullable',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karya = Karya::latest()->when(request()->search, function ($karya) {
            $karya = $karya->where('jenis', 'ilike', '%' . request()->search . '%');
        })->paginate(10);
        $karyaself = Karya::where('user_id', Auth::user()->id)->simplepaginate(10);
        return view('karya.index', compact('karya', 'karyaself'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karya.create');
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
        if ($surat_pernyataan = $request->file('surat_pernyataan')) {
            $destinationPath = 'file-surat_pernyataan';
            $fileFormulir = date('YmdHis') . "." . $surat_pernyataan->getClientOriginalExtension();
            $surat_pernyataan->move($destinationPath, $fileFormulir);
            $input['surat_pernyataan'] = "$fileFormulir";
        } else {
            unset($input['surat_pernyataan']);
        }
        if ($surat_pengalihan = $request->file('surat_pengalihan')) {
            $destinationPath = 'file-surat_pengalihan';
            $fileFormulir = date('YmdHis') . "." . $surat_pengalihan->getClientOriginalExtension();
            $surat_pengalihan->move($destinationPath, $fileFormulir);
            $input['surat_pengalihan'] = "$fileFormulir";
        } else {
            unset($input['surat_pengalihan']);
        }
        
        if ($scan_ktp = $request->file('scan_ktp')) {
            $destinationPath = 'file-scan_ktp';
            $fileFormulir = date('YmdHis') . "." . $scan_ktp->getClientOriginalExtension();
            $scan_ktp->move($destinationPath, $fileFormulir);
            $input['scan_ktp'] = "$fileFormulir";
        } else {
            unset($input['scan_ktp']);
        }
        
        if ($deskripsi = $request->file('deskripsi')) {
            $destinationPath = 'file-deskripsi';
            $fileFormulir = date('YmdHis') . "." . $deskripsi->getClientOriginalExtension();
            $deskripsi->move($destinationPath, $fileFormulir);
            $input['deskripsi'] = "$fileFormulir";
        } else {
            unset($input['deskripsi']);
        }
        
        if ($pemohon_hc = $request->file('pemohon_hc')) {
            $destinationPath = 'file-pemohon_hc';
            $fileFormulir = date('YmdHis') . "." . $pemohon_hc->getClientOriginalExtension();
            $pemohon_hc->move($destinationPath, $fileFormulir);
            $input['pemohon_hc'] = "$fileFormulir";
        } else {
            unset($input['pemohon_hc']);
        }
        Karya::create($input);
        return redirect()->route('karya.index')
            ->withSuccess(__('Karya created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karya = Karya::findOrFail($id);
        return view('karya.show', compact('karya'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karya = Karya::findOrFail($id);
        return view('karya.edit', compact('karya'));
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
        $karya = Karya::findOrFail($id);
        $input = $request->all();
    
        if ($request->hasFile('surat_pernyataan')) {
            $file = $request->file('surat_pernyataan');
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file-surat_pernyataan'), $fileName);
            $input['surat_pernyataan'] = $fileName;
        }
    
        if ($request->hasFile('surat_pengalihan')) {
            $file = $request->file('surat_pengalihan');
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file-surat_pengalihan'), $fileName);
            $input['surat_pengalihan'] = $fileName;
        }
    
        if ($request->hasFile('scan_ktp')) {
            $file = $request->file('scan_ktp');
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file-scan_ktp'), $fileName);
            $input['scan_ktp'] = $fileName;
        }
    
        if ($request->hasFile('deskripsi')) {
            $file = $request->file('deskripsi');
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file-deskripsi'), $fileName);
            $input['deskripsi'] = $fileName;
        }
    
        if ($request->hasFile('pemohon_hc')) {
            $file = $request->file('pemohon_hc');
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file-pemohon_hc'), $fileName);
            $input['pemohon_hc'] = $fileName;
        }
    
        $karya->update($input);
    
        return redirect()->route('karya.index')->withSuccess(__('Karya updated successfully.'));
    }
    
    public function updateStatus(Request $request, $id)
    {
        $karya = Karya::findOrFail($id);
        $karya->status = $request->status;
        $karya->save();
    
        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karya = Karya::findOrFail($id);
        $karya->delete();

        return redirect('/karya')->with('status', 'Delete data succesfully.');
    }
}
