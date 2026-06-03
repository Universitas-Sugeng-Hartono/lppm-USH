<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccProposal;
use App\Models\User;
use File;
use Auth;

class AccProposalController extends Controller
{

    public function rules($id = false)
    {
        return  [
            'pengirim' => 'nullable',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accproposal = AccProposal::latest()->when(request()->search, function ($accproposal) {
            $accproposal = $accproposal->where('id', 'ilike', '%' . request()->search . '%');
        })->paginate(10);
        return view('acc.index', compact('accproposal'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, $this->rules());

        AccProposal::create($request->all());
        return redirect()->route('acc.index')
            ->withSuccess(__('Data created successfully.'));
    }
}
