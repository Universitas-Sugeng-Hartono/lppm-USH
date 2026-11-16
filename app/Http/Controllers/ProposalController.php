<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\User;
use File;
use Auth;

class ProposalController extends Controller
{

    public function rules($id = false)
    {
        return  [
            'pengirim' => 'nullable',
            'admin_id' => 'nullable',
            'reviewer_id'  => 'nullable',
            'judul' => 'nullable',
            'progdi'  => 'nullable',
            'file_proposal' => 'nullable',
            'catatan_review1' => 'nullable',
            'file_review2' => 'nullable',
            'file_review1' => 'nullable',
            'catatan_review2'  => 'nullable',
            'status' => 'nullable',
            'reviewer_id2' => 'nullable',
            'status_review' => 'nullable',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $getName = User::select('id', 'name')->get();
    
        $proposal = Proposal::with('userId')->where('admin_id', $user)->whereNull('jenis')->orderBy('tanggal', 'desc')
            ->when(request()->input('search'), function ($query) {
                $query->where('judul', 'LIKE', '%' . request()->input('search') . '%');
            })
            ->when($request->input('progdi'), function ($query) use ($request) {
            $query->where('progdi', $request->input('progdi'));
            })
            ->when(request()->input('year'), function ($query) {
                $query->whereYear('tanggal', request()->input('year'));
            })
            ->orderBy('created_at', 'asc')
            ->get();
    
        $proposal1 = Proposal::whereNull('jenis')->orderBy('tanggal', 'desc')
            ->when(request()->input('search'), function ($query) {
                $query->where('judul', 'LIKE', '%' . request()->input('search') . '%');
            })
            ->when($request->input('progdi'), function ($query) use ($request) {
            $query->where('progdi', $request->input('progdi'));
            })
            ->when(request()->input('dosen_id') ?? request()->input('admin_id'), function ($query) {
                $query->where('admin_id', request()->input('dosen_id') ?? request()->input('admin_id'));
            })
            ->when(request()->input('year'), function ($query) {
                $query->whereYear('tanggal', request()->input('year'));
            })
             ->orderBy('tanggal', 'desc') 
            ->simplePaginate(10);
            
        $proposal1->appends(request()->query());
    
        return view('proposal.index', compact('proposal', 'getName', 'proposal1', 'user'));
    }
    
    public function Penelitian(Request $request)
    {
        $user = Auth::user()->id;
        $getName = User::select('id', 'name')->get();
    
        $proposal = Proposal::with('userId')->where('admin_id', $user)->where('jenis','Penelitian')
            ->when(request()->input('search'), function ($query) {
                $query->where('judul', 'LIKE', '%' . request()->input('search') . '%');
            })
            ->when($request->input('progdi'), function ($query) use ($request) {
            $query->where('progdi', $request->input('progdi'));
            })
            ->when(request()->input('year'), function ($query) {
                $query->whereYear('tanggal', request()->input('year'));
            })
            ->orderBy('tanggal', 'desc')
            ->get();
    
        $proposal1 = Proposal::where('jenis','Penelitian')
            ->when(request()->input('search'), function ($query) {
                $query->where('judul', 'LIKE', '%' . request()->input('search') . '%');
            })
            ->when($request->input('progdi'), function ($query) use ($request) {
            $query->where('progdi', $request->input('progdi'));
            })
            ->when(request()->input('dosen_id') ?? request()->input('admin_id'), function ($query) {
                $query->where('admin_id', request()->input('dosen_id') ?? request()->input('admin_id'));
            })
            ->when(request()->input('year'), function ($query) {
                $query->whereYear('tanggal', request()->input('year'));
            })
             ->orderBy('tanggal', 'desc') 
            ->simplePaginate(10);
            
        $proposal1->appends(request()->query());
    
        return view('proposal.penelitian', compact('proposal', 'getName', 'proposal1', 'user'));
    }
    
    public function Pengabdian(Request $request)
    {
        $user = Auth::user()->id;
        $getName = User::select('id', 'name')->get();
    
        $proposal = Proposal::with('userId')->where('admin_id', $user)->where('jenis','Pengabdian')
            ->when(request()->input('search'), function ($query) {
                $query->where('judul', 'LIKE', '%' . request()->input('search') . '%');
            })
            ->when($request->input('progdi'), function ($query) use ($request) {
            $query->where('progdi', $request->input('progdi'));
            })
            ->when(request()->input('year'), function ($query) {
                $query->whereYear('tanggal', request()->input('year'));
            })
            ->orderBy('tanggal', 'desc')
            ->get();
    
        $proposal1 = Proposal::where('jenis','Pengabdian')
            ->when(request()->input('search'), function ($query) {
                $query->where('judul', 'LIKE', '%' . request()->input('search') . '%');
            })
            ->when($request->input('progdi'), function ($query) use ($request) {
            $query->where('progdi', $request->input('progdi'));
            })
            ->when(request()->input('dosen_id') ?? request()->input('admin_id'), function ($query) {
                $query->where('admin_id', request()->input('dosen_id') ?? request()->input('admin_id'));
            })
            ->when(request()->input('year'), function ($query) {
                $query->whereYear('tanggal', request()->input('year'));
            })
            ->orderBy('tanggal', 'desc') 
            ->simplePaginate(10);
            
        $proposal1->appends(request()->query());
    
        return view('proposal.pengabdian', compact('proposal', 'getName', 'proposal1', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getname = User::select('id', 'name')->get();
        return view('proposal.create', compact('getname'));
    }
    
    public function CreatePengabdian()
    {
        $getname = User::select('id', 'name')->get();
        return view('proposal.createpengabdian', compact('getname'));
    }
    
    public function CreatePenelitian()
    {
        $getname = User::select('id', 'name')->get();
        return view('proposal.createpenelitian', compact('getname'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, $this->rules());
        $input = $request->all();
        if ($file_proposal = $request->file('file_proposal')) {
            $destinationPath = 'file-proposal';
            $fileProposal = date('YmdHis') . "." . $file_proposal->getClientOriginalExtension();
            $file_proposal->move($destinationPath, $fileProposal);
            $input['file_proposal'] = "$fileProposal";
        } else {
            unset($input['file_proposal']);
        }
        Proposal::create($input);
        return redirect()->route('proposal.index')
            ->withSuccess(__('Proposal created successfully.'));
    }
    
    public function storePenelitian(Request $request)
    {
        $data = $this->validate($request, $this->rules());
        $input = $request->all();
        if ($file_proposal = $request->file('file_proposal')) {
            $destinationPath = 'file-proposal';
            $fileProposal = date('YmdHis') . "." . $file_proposal->getClientOriginalExtension();
            $file_proposal->move($destinationPath, $fileProposal);
            $input['file_proposal'] = "$fileProposal";
        } else {
            unset($input['file_proposal']);
        }
        Proposal::create($input);
        return redirect()->route('proposalpenelitian')
            ->withSuccess(__('Proposal created successfully.'));
    }
    
    public function storePengabdian(Request $request)
    {
        $data = $this->validate($request, $this->rules());
        $input = $request->all();
        if ($file_proposal = $request->file('file_proposal')) {
            $destinationPath = 'file-proposal';
            $fileProposal = date('YmdHis') . "." . $file_proposal->getClientOriginalExtension();
            $file_proposal->move($destinationPath, $fileProposal);
            $input['file_proposal'] = "$fileProposal";
        } else {
            unset($input['file_proposal']);
        }
        Proposal::create($input);
        return redirect()->route('proposalpengabdian')
            ->withSuccess(__('Proposal created successfully.'));
    }

    public function show($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('proposal.show', compact('proposal'));
    }

    public function lookReview1($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('proposal.reviewadmin', compact('proposal'));
    }

    public function accReview($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('proposal.accepted', compact('proposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $getname = User::select('id', 'name')->get();
        $proposal = Proposal::findOrFail($id);
        return view('proposal.review1', compact('proposal', 'getname'));
    }
    
    public function ubah($id)
    {
        $getname = User::select('id', 'name')->get();
        $proposal = Proposal::findOrFail($id);
        return view('proposal.edit', compact('proposal', 'getname'));
    }

    public function update(Request $request, Proposal $proposal)
    {
        $data = $this->validate($request, $this->rules($proposal));

        $input = $request->all();
        
        if ($file_proposal = $request->file('file_proposal')) {
            $destinationPath = 'file-proposal';
            File::delete($destinationPath . $proposal->file_proposal);
            $fileDokumen = date('YmdHis') . "." . $file_proposal->getClientOriginalExtension();
            $file_proposal->move($destinationPath, $fileDokumen);
            $input['file_proposal'] = "$fileDokumen";
        } else {
            unset($input['file_proposal']);
        }
        if ($file_review1 = $request->file('file_review1')) {
            $destinationPath = 'file-review/dokumen';
            File::delete($destinationPath . $proposal->file_review1);
            $fileDokumen = date('YmdHis') . "." . $file_review1->getClientOriginalExtension();
            $file_review1->move($destinationPath, $fileDokumen);
            $input['file_review1'] = "$fileDokumen";
        } else {
            unset($input['file_review1']);
        }
        if ($file_review2 = $request->file('file_review2')) {
            $destinationPath = 'foto-review/dokumen2';
            File::delete($destinationPath . $proposal->file_review2);
            $fileDokumen2 = date('YmdHis') . "." . $file_review2->getClientOriginalExtension();
            $file_review2->move($destinationPath, $fileDokumen2);
            $input['file_review2'] = "$fileDokumen2";
        } else {
            unset($input['file_review2']);
        }
        if ($file_revisi = $request->file('file_revisi')) {
            $destinationPath = 'foto-revisi/dokumen';
            File::delete($destinationPath . $proposal->file_revisi);
            $fileDokumen3 = date('YmdHis') . "." . $file_revisi->getClientOriginalExtension();
            $file_revisi->move($destinationPath, $fileDokumen3);
            $input['file_revisi'] = "$fileDokumen3";
        } else {
            unset($input['file_revisi']);
        }

        $proposal->update($input);
        if ($proposal->jenis === 'Penelitian') {
            return redirect()->route('proposalpenelitian')
                ->withSuccess(__('Proposal updated successfully.'));
        } elseif ($proposal->jenis === 'Pengabdian') {
            return redirect()->route('proposalpengabdian')
                ->withSuccess(__('Proposal updated successfully.'));
        }

        return redirect()->route('proposal.show', $proposal->id)
            ->withSuccess(__('Proposal updated successfully.'));
    }


    public function getReview1($id)
    {
        $getname = User::select('id', 'name')->get();
        $proposal = Proposal::findOrFail($id);
        return view('proposal.review1', compact('proposal', 'getname'));
    }

    public function getReview2($id)
    {
        $getname = User::select('id', 'name')->get();
        $proposal = Proposal::findOrFail($id);
        return view('proposal.review2', compact('proposal', 'getname'));
    }

    public function postReview2(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'admin_id' => 'nullable',
            'reviewer_id'  => 'nullable',
            'judul' => 'nullable',
            'progdi'  => 'nullable',
            'file_proposal' => 'nullable',
            'catatan_review1' => 'nullable',
            'file_review2' => 'nullable',
            'catatan_review2'  => 'nullable',
            'status' => 'nullable',
            'reviewer_id2' => 'nullable',
            'status_review' => 'nullable',
            'jenis' => 'nullable',
        ]);

        $proposal = Proposal::find($id);
        $data = $request->all();
        if ($file_review2 = $request->file('file_review2')) {
            $destinationPath = 'file-reviewer2';
            File::delete($destinationPath . $proposal->file_review2);
            $fileReview2 = date('YmdHis') . "." . $file_review2->getClientOriginalExtension();
            $file_review2->move($destinationPath, $fileReview2);
            $input['file_review2'] = "$fileReview2";
        } else {
            unset($input['file_review2']);
        }
        $proposal->update($data);
        if ($proposal->jenis === 'Penelitian') {
            return redirect()->route('proposalpenelitian')
                ->withSuccess(__('Proposal updated successfully.'));
        } elseif ($proposal->jenis === 'Pengabdian') {
            return redirect()->route('proposalpengabdian')
                ->withSuccess(__('Proposal updated successfully.'));
        }
    }

    public function sessionAcc(Request $request, $id)
    {
        $proposal = Proposal::findOrFail($id);
        $getname = User::select('id', 'name')->get();
        return view('acc.create', compact('proposal', 'getname'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->delete();

        return back()->withSuccess(__('Proposal delete successfully.'));
    }
}
