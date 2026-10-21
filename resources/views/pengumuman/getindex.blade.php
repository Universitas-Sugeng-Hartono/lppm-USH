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
        td img {
            max-width: 250px;
            max-height: 150px;
            display: block;
        }
        .bg-red-500 {
            background-color: #f56565;
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
                        <li><a href="/" style="color: blue;">Home</a> <i class="icon-angle-right"></i></li>
                        <li class="active"><a href="/indexpengumuman" style="color: blue;"> Pengumuman</a> <i class="icon-angle-right"></i></li>
                        <li class="active">Pengumuman</li>
                    </ul>
                    <h2>Pengumuman</h2>
                    <br>
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pengirim</th>
                                <th>Isi</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengumuman as $item)
                            <tr>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td>{{ $item->isi }}</td>
                                <td>
                                    @if($item->file)
                                    <a href="/file-pengumuman/{{$item->file}}"/><span class="btn-download">Download</span></a>
                                    @else
                                    Tidak Ada File
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="bg-red-500 text-white p-3 rounded shadow-sm text-center">
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
<script>
    $('#gambar').change(function() {

        let reader = new FileReader();
        reader.onload = (e) => {
            $('#foto1-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);

    });
</script>