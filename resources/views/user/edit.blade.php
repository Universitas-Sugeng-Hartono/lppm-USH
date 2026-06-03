@extends('dashboard.indexnew')
@section('inti')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Ubah User</h4>
                    <p class="card-category"></p>
                    <form action="{{ route('user.update', $user->id) }}" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Institusi</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Institut Teknologi Sains dan Kesehatan Sugeng Hartono" value="Institut Teknologi Sains dan Kesehatan Sugeng Hartono">
                                </div>
                            </div>
                            <div class="col-md-7 pl-1">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" id="name" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="{{ $user->password }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="role" name="role" autocomplete="role" class="form-control">
                                        <option value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="">Pilih Role</option>
                                         <option value="super">Super</option>
                                        <option value="admin">Dosen</option>
                                        <option value="super">Administrator</option>
                                        <option value="reviewer">Reviewer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h6 class="card-subtitle"></h6>
                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection