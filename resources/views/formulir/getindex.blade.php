@extends('layout.index')
@section('main')
<!-- section featured -->
<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
        }
        .btn-download {
            display: inline-block;
            padding: 8px 16px;
            background-color: navy;
            color: white;
            border-radius: 30px;
            text-align: center;
        }
        .bg-red-500 {
            background-color: navy;
        }
        .text-white {
            color: #fff;
        }
        .p-3 {
            padding: 12px;
        }
        .rounded {
            border-radius: 8px;
        }
        .shadow-sm {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .text-center {
            text-align: center;
        }
</style>
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="inner-heading">
                    <ul class="breadcrumb">
                        <li><a href="index.html" style="color: blue;">Home</a> <i class="icon-angle-right"></i></li>
                        <li class="active"><a href="index.html" style="color: blue;"> Pengumuman</a> <i class="icon-angle-right"></i></li>
                        <li class="active">Formulir</li>
                    </ul>
                    <h2>Formulir</h2>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pengirim</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($formulir as $item)
                            <tr>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td>
                                    <a href="/file-form/{{ $item->file }}" class="btn-download">Download</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="bg-red-500 text-white p-3 rounded shadow-sm text-center">
                                    Data Belum Tersedia!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection