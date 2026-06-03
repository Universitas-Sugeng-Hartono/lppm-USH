@extends('dashboard.indexnew')

@section('inti')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Karya Cipta</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('karya.update', $karya->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dosen</label>
                                    <input type="text" class="form-control" value="{{ $karya->userId->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" class="form-control" value="{{ $karya->jenis }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Surat Pernyataan Hak Cipta</label>
                                    <input type="file" class="form-control" name="surat_pernyataan">
                                    @if($karya->surat_pernyataan)
                                        <p><a href="{{ asset('file-surat_pernyataan/'.$karya->surat_pernyataan) }}" target="_blank">Lihat File</a></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Surat Pengalihan Hak Cipta</label>
                                    <input type="file" class="form-control" name="surat_pengalihan">
                                    @if($karya->surat_pengalihan)
                                        <p><a href="{{ asset('file-surat_pengalihan/'.$karya->surat_pengalihan) }}" target="_blank">Lihat File</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Scan KTP Pencipta</label>
                                    <input type="file" class="form-control" name="scan_ktp">
                                    @if($karya->scan_ktp)
                                        <p><a href="{{ asset('file-scan_ktp/'.$karya->scan_ktp) }}" target="_blank">Lihat File</a></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dokumen Deskripsi Hak Cipta</label>
                                    <input type="file" class="form-control" name="deskripsi">
                                    @if($karya->deskripsi)
                                        <p><a href="{{ asset('file-deskripsi/'.$karya->deskripsi) }}" target="_blank">Lihat File</a></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Form Permohonan Pencatatan Hak Cipta</label>
                                    <input type="file" class="form-control" name="pemohon_hc">
                                    @if($karya->pemohon_hc)
                                        <p><a href="{{ asset('file-pemohon_hc/'.$karya->pemohon_hc) }}" target="_blank">Lihat File</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <h6 class="card-subtitle"></h6>
                        <button type="submit" class="btn btn-rounded btn-success btn-rounded">Update</button>
                        <a href="{{ route('karya.index') }}" class="btn btn-rounded btn-secondary btn-rounded">Batal</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
