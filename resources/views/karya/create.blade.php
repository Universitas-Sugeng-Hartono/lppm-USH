@extends('dashboard.indexnew')
@section('inti')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Tambah Karya Cipta</h4>
                    <p class="card-category"></p>
                    <form action="{{ route('karya.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Dosen</label>
                                    <input type="text" class="form-control" placeholder="Nama Admin" value="{{Auth::user()->name}}" readonly>
                                    <input type="hidden" class="form-control" placeholder="Nama Admin" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" class="form-control" placeholder="Nama Admin" id="status" name="status" value="Diajukan">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" class="form-control" placeholder="Tanggal" id="jenis" name="jenis" value="Karya Cipta" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Surat Pernyataan Hak Cipta <code>*</code></label>
                                    <input type="file" class="form-control" placeholder="Masukan File .doc/.pdf" id="surat_pernyataan" name="surat_pernyataan" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Surat Pengalihan Hak Cipta</label>
                                    <input type="file" class="form-control" placeholder="Masukan File .doc/.pdf" id="surat_pengalihan" name="surat_pengalihan">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Scan KTP Pencipta <code>*</code></label>
                                    <input type="file" class="form-control" placeholder="Masukan File .png/jpg" id="scan_ktp" name="scan_ktp" required>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Dokumen Deskripsi Hak Cipta <code>*</code></label>
                                    <input type="file" class="form-control" placeholder="Masukan File .doc/.pdf" id="deskripsi" name="deskripsi" required>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Form Permohonan Pencatatan Hak Cipta <code>*</code></label>
                                    <input type="file" class="form-control" placeholder="Masukan File .doc/.pdf" id="pemohon_hc" name="pemohon_hc" required>
                                </div>
                            </div>
                        </div>
                        <h6 class="card-subtitle"></h6>
                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Submit</button>
                        <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection