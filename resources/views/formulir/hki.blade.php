@extends('layout.index')

@section('main')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="inner-heading">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}" style="color: blue;">Home</a> <i class="icon-angle-right"></i></li>
                        <li class="active">HKI</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="hki-info" class="container mt-4">
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="{{ asset('img/images12121.jpeg') }}" alt="Hak Kekayaan Intelektual" class="img-fluid" style="max-width: 100%; height: auto;">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h2 class="text-center">Panduan Ajuan Karya Cipta melalui Universitas Sugeng Hartono</h2>
            <hr>

            <p><strong>HKI buku, book chapter, modul, artikel, poster, laporan, video pembelajaran/tutorial tidak bisa digunakan sebagai luaran.</strong></p>

            <h4 style="font-size: 1.1rem;">1. Mahasiswa menyiapkan dokumen pengajuan HKI, yang terdiri dari:</h4>
            <ul style="font-size: 0.95rem;">
                <li><strong>Surat Pernyataan Hak Cipta</strong></li>
                <li><strong>Surat Pengalihan Hak Cipta</strong></li>
                <li><strong>Scan KTP Pencipta</strong></li>
                <li><strong>Dokumen Deskripsi Hak Cipta</strong></li>
                <li><strong>Form Permohonan Pencatatan Hak Cipta</strong></li>
            </ul>
            <p style="font-size: 0.95rem;">Template Form Permohonan Pencatatan Hak Cipta dapat diunduh melalui link berikut:</p>
            <a href="https://drive.google.com/drive/folders/1dA0Y1sQisbJmqS5t0IYS5TlvD8cJCsCY?usp=sharing" target="_blank" class="btn btn-primary" style="background-color: navy; border-radius: 20px; padding: 10px 20px; color:white;">
                Download di sini
            </a>
            <p style="font-size: 0.95rem;"></p>
            <h4 class="mt-4" style="font-size: 1.1rem;">2. Pengajuan Dokumen</h4>
            <p style="font-size: 0.95rem;">Siapkan draft dokumen pengajuan (tanpa tanda tangan)</p>
            <p>Login akun masing-masing dosen dan pilih Menu <strong>Karya Cipta</strong>.</p>
            
            <h4 class="mt-4" style="font-size: 1.1rem;">3. Proses Pengecekan dan Revisi</h4>
            <p>LPPM Universitas Sugeng Hartono akan mengecek file ajuan dan melakukan revisi jika diperlukan.</p>
            
            <p>
                <strong>Kontak Person Sentra HKI Universitas Sugeng Hartono</strong><br>
                <strong>Nomor WhatsApp:</strong>  +62 822-4204-5300<br>
                <strong>Email:</strong> <a href="mailto:lppm@sugenghartono.ac.id">lppm@sugenghartono.ac.id</a>
            </p>
        </div>
    </div>
</section>
@endsection
