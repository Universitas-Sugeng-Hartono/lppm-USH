<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formulir;
use App\Models\Visitor;
use File;
use Auth;

class FormulirController extends Controller
{

    public function rules($id = false)
    {
        return  [
            'file' => 'nullable',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formulir = Formulir::simplepaginate(10);
        return view('formulir.index', compact('formulir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formulir.create');
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
        if ($file = $request->file('file')) {
            $destinationPath = 'file-form';
            $fileFormulir = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileFormulir);
            $input['file'] = "$fileFormulir";
        } else {
            unset($input['file']);
        }
        Formulir::create($input);
        return redirect()->route('formulir.index')
            ->withSuccess(__('Formulir created successfully.'));
    }

    public function formulirReview()
    {
        $formulir = Formulir::all();
        $totalVisitors = Visitor::count();
        return view('formulir.getindex', compact('formulir','totalVisitors'));
    }
    
    public function hkiView()
    { 
        $totalVisitors = Visitor::count();
        return view('formulir.hki', compact('totalVisitors'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formulir = Formulir::findOrFail($id);
        $formulir->delete();

        return redirect('/formulir')->with('status', 'Delete data succesfully.');
    }
}
