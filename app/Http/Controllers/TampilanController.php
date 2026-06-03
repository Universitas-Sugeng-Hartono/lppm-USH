<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Auth;

class TampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalVisitors = Visitor::distinct('ip')->count();
        $pengumuman = Pengumuman::latest()
            ->when($request->search, function ($query) use ($request) {
                return $query->where('isi', 'ilike', '%' . $request->search . '%');
            })
            ->paginate(4);
        
        return view('layout.app', compact('pengumuman', 'totalVisitors'));
    }
}
