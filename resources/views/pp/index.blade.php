@extends('dashboard.index')
@section('int')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Management Penelitian dan Pengabdian</h4>
                    <p class="card-category"></p>
                    <br>
                    <a type="button" class="btn btn-primary" href="">Tambah</a>
                    <br>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor ID</th>
                                <th>Dosen</th>
                                <th>Judul</th>
                                <th>File</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Aufar Ribhi</td>
                                <td>Pengaruh</td>
                                <td><a href=""><span style="background:pink; border-radius:20px;">Klik Disini</span></a></td>
                                <td>Penelitian</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah anda yakin ingin menghapus ?');" action="" method="POST">

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection