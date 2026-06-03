@extends('dashboard.indexnew')

@section('inti')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Karya Cipta</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Dosen</th>
                            <td>{{ $karya->userId->name }}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>{{ $karya->jenis }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($karya->status == 'Disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($karya->status == 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @elseif($karya->status == 'Diajukan')
                                    <span class="badge bg-primary">Diajukan</span>
                                @else
                                    <span class="badge bg-secondary">Belum Diproses</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Surat Pernyataan Hak Cipta</th>
                            <td>
                                @if($karya->surat_pernyataan)
                                    <a href="{{ asset('file-surat_pernyataan/'.$karya->surat_pernyataan) }}" class="btn btn-rounded btn-info btn-sm" target="_blank">Download</a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Surat Pengalihan Hak Cipta</th>
                            <td>
                                @if($karya->surat_pengalihan)
                                    <a href="{{ asset('file-surat_pengalihan/'.$karya->surat_pengalihan) }}" class="btn btn-rounded btn-info btn-sm" target="_blank">Download</a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Scan KTP Pencipta</th>
                            <td>
                                @if($karya->scan_ktp)
                                    <a href="{{ asset('file-scan_ktp/'.$karya->scan_ktp) }}" class="btn btn-rounded btn-info btn-sm" target="_blank">Download</a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dokumen Deskripsi Hak Cipta</th>
                            <td>
                                @if($karya->deskripsi)
                                    <a href="{{ asset('file-deskripsi/'.$karya->deskripsi) }}" class="btn btn-rounded btn-info btn-sm" target="_blank">Download</a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Form Permohonan Pencatatan Hak Cipta</th>
                            <td>
                                @if($karya->pemohon_hc)
                                    <a href="{{ asset('file-pemohon_hc/'.$karya->pemohon_hc) }}" class="btn btn-rounded btn-info btn-sm" target="_blank">Download</a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <a href="{{ route('karya.index') }}" class="btn btn-rounded btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
