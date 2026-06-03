<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;
use File;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{

    public function rules($id = false)
    {
        return  [
            'name' => 'required',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }
    
    public function UserView()
    {
        $user = Auth::user();
        $updatedAt =  Carbon::parse($user->updated_at);
        $now = Carbon::now();
        $daysAgo = $updatedAt->diffInDays($now);
        $userId = Auth::user()->id;
        $prodi = Proposal::where('admin_id', $userId)
                ->distinct()
                ->pluck('progdi')
                ->first();
        return view('user.viewuser', compact('user', 'daysAgo', 'prodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'role' => $request['role'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect('/user')->with('success', 'Tambah user berhasil.');
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    // Mengupdate program berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('user.index')->with('success', 'Upps berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/user')->with('status', 'Delete data succesfully.');
    }
}
