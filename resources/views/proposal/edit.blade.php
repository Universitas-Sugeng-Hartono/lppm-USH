@extends('dashboard.indexnew')
@section('inti')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Ubah Proposal</h4>
                    <p class="card-category"></p>
                    <form class="space-y-8 divide-y divide-gray-200" action="{{ route('proposal.update',$proposal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Admin</label>
                                    <select id="admin_id" name="admin_id" autocomplete="user_id" class="form-select mr-sm-2" required>
                                        @foreach ($getname as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
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
                                    <input type="text" class="form-control" placeholder="Judul Proposal" id="judul" name="judul" value="{{$proposal->judul}}">
                                    <input type="hidden" class="form-control" placeholder="Judul Proposal" id="status" name="status" value="{{$proposal->status}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Progdi</label>
                                    <select id="progdi" name="progdi" autocomplete="progdi" class="form-select mr-sm-2">
                                        <option value="{{$proposal->progdi}}">{{$proposal->progdi}}</option>
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
                                    <input type="date" class="form-control" placeholder="Tanggal" id="tanggal" name="tanggal" value="{{$proposal->tanggal}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Jenis Proposal</label>
                                    <select id="jenis" name="jenis" autocomplete="jenis" class="form-select mr-sm-2">
                                        <option value="{{$proposal->jenis}}">{{$proposal->jenis}}</option>
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
                        <div>
                            <!--<label>Reviewer 2 (HIDDEN INPUT)</label>-->
                            <input type="hidden" class="form-control" placeholder="reviewer_id2" id="reviewer_id2" name="reviewer_id2" value="{{$proposal->reviewer_id2}}" readonly>
                            <input type="hidden" class="form-control" placeholder="status_review" id="status_review" name="status_review" value="{{$proposal->status_review}}" readonly>
                            <input type="hidden" class="form-control" placeholder="status_review" id="status_final" name="status_final" value="{{$proposal->status_final}}" readonly>
                            <input type="hidden" class="form-control" placeholder="file_review2" id="file_review2" name="file_review2" value="{{$proposal->file_review2}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review2" id="catatan_review2" name="catatan_review2" value="{{$proposal->catatan_review2}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review2" id="file_revisi" name="file_revisi" value="{{$proposal->file_revisi}}" readonly>
                        </div>
                        <div class="form-group">
                            <!--<label>DATA SUBMITER (HIDDEN INPUT)</label>-->
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="id" name="id" value="{{$proposal->id}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="catatan_review1" name="catatan_review1" value="{{$proposal->catatan_review1}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="file_review1" name="file_review1" value="{{$proposal->file_review1}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="reviewer_id" name="reviewer_id" value="{{$proposal->reviewer_id}}" readonly>
                        </div>
                        
                            <h6 class="card-subtitle"></h6>
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('redirect_back'))
    <script type="text/javascript">
        // Pertama kembali ke URL pertama menggunakan history.back()
        window.history.back();  // Kembali ke halaman sebelumnya (URL pertama)
        
        // Setelah 300ms, lakukan redirect ke URL kedua
        setTimeout(function() {
            window.location.href = "{{ session('redirect_back') }}";
        }, 300);  // 300ms delay untuk memberi waktu pada browser kembali ke URL pertama
    </script>
@endif
@endsection