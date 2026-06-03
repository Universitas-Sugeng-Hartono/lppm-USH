@extends('dashboard.indexnew')
@section('inti')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Submit Proposal</h4>
                    <p class="card-category"></p>
                    <form action="{{ route('proposal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Admin</label>
                                    <select id="admin_id" name="admin_id" autocomplete="user_id" class="form-control" required>
                                        @foreach ($getname as $item)
                                        @if ($item->id == Auth::user()->id)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" placeholder="Judul Proposal" id="judul" name="judul">
                                    <input type="hidden" class="form-control" placeholder="Judul Proposal" id="status" name="status" value="Submission">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Progdi</label>
                                    <select class="form-select mr-sm-2" id="inlineFormCustomSelec" name="progdi">
                                        <option value="">Pilih Program Studi</option>
                                        <option value="Informatika">Informatika</option>
                                        <option value="Bisnis Digital">Bisnis Digital</option>
                                        <option value="Gizi">Gizi</option>
                                        <option value="Hukum Bisnis">Hukum Bisnis</option>
                                        <option value="Manajemen Bisnis Internasional">Manajemen Bisnis Internasioanl</option>
                                        <option value="Teknologi Pangan">Teknologi Pangan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" placeholder="Tanggal" id="tanggal" name="tanggal">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Jenis Proposal</label>
                                    <select class="form-select mr-sm-2" id="inlineFormCustomSelec" name="jenis">
                                        <option value="">Pilih Jenis Proposal</option>
                                        <option value="Penelitian">Penelitian</option>
                                        <option value="Pengabdian">Pengabdian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control" placeholder="Masukan File .doc/.pdf" id="file_proposal" name="file_proposal">
                                </div>
                            </div>
                        </div>
                        <h6 class="card-subtitle"></h6>
                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection