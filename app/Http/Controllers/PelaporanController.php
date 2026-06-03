<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\User;
use App\Models\Proposal;
use File;
use Auth;

class PelaporanController extends Controller
{

    public function rules($id = false)
    {
        return  [
            'tanggal' => 'required',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelaporan = Pelaporan::with(['proposalId'])
        ->whereHas('proposalId', function ($query) {
            $query->where('jenis', 'Penelitian');
        })
        ->orderBy('tanggal', 'desc')
        ->simplePaginate(10);
    
        $pelaporanuser = Pelaporan::with(['userId', 'proposalId'])
            ->where('admin_id', Auth::user()->id)
            ->whereHas('proposalId', function ($query) {
                $query->where('jenis', 'Penelitian');
            })
            ->orderBy('tanggal', 'desc')
            ->simplePaginate(10);
    
        return view('pelaporan.index', compact('pelaporan', 'pelaporanuser'));
    }
    
    public function Pengabdian()
    {
        $pelaporan = Pelaporan::with(['proposalId'])
        ->whereHas('proposalId', function ($query) {
            $query->where('jenis', 'Pengabdian');
        })
        ->orderBy('tanggal', 'desc')
        ->simplePaginate(10);
    
        $pelaporanuser = Pelaporan::with(['userId', 'proposalId'])
            ->where('admin_id', Auth::user()->id)
            ->whereHas('proposalId', function ($query) {
                $query->where('jenis', 'Pengabdian');
            })
            ->orderBy('tanggal', 'desc')
            ->simplePaginate(10);
        return view('pelaporan.pengabdian', compact('pelaporan', 'pelaporanuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getname = User::select('id', 'name')->get();
        $getproposal = Proposal::select('id', 'judul', 'admin_id')->where('admin_id', Auth::user()->id)->where('jenis', 'Penelitian')->get();
        return view('pelaporan.create', compact('getname', 'getproposal'));
    }
    
    public function CreatePengabdian()
    {
        $getname = User::select('id', 'name')->get();
        $getproposal = Proposal::select('id', 'judul', 'admin_id')->where('admin_id', Auth::user()->id)->where('jenis', 'Pengabdian')->get();
        return view('pelaporan.createpengabdian', compact('getname', 'getproposal'));
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
            $destinationPath = 'file-pelaporan';
            $filePelaporan = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filePelaporan);
            $input['file'] = "$filePelaporan";
        } else {
            unset($input['file']);
        }
        Pelaporan::create($input);
        return redirect()->route('pelaporan.index')
            ->withSuccess(__('Pelaporan created successfully.'));
        // $pelaporan = Pelaporan::create($data);
        // if ($pelaporan->jenis == 'Penelitian') {
        //     return redirect()->route('pelaporan.index')
        //         ->withSuccess(__('Pelaporan Penelitian created successfully.'));
        // } elseif ($pelaporan->jenis == 'Pengabdian') {
        //     return redirect()->route('pelaporanpengabdian')
        //         ->withSuccess(__('Pelaporan Pengabdian created successfully.'));
        // }
            
    }

    public function destroy($id)
    {
        $proposal = Pelaporan::findOrFail($id);
        $proposal->delete();

        return redirect('/proposal')->with('status', 'Delete data succesfully.');
    }
}
