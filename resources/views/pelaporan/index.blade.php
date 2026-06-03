@extends('dashboard.indexnew')
@section('inti')
<style>
        .table-container {
            overflow-x: auto; /* Enable horizontal scroll */
            margin: 20px 0; /* Margin above and below the container */
        }
        /* CSS untuk tombol kecil */
        .btn-view {
            display: inline-block;
            background-color: #06B6D4; /* Warna latar belakang biru muda */
            color: white; /* Warna teks putih */
            padding: 8px 16px; /* Padding lebih kecil untuk tombol kecil */
            border-radius: 15px; /* Radius sudut lebih kecil */
            font-size: 0.875rem; /* Ukuran font lebih kecil */
            text-decoration: none; /* Menghapus garis bawah */
            text-align: center; /* Meratakan teks di tengah */
            transition: background-color 0.3s, transform 0.3s; /* Transisi halus */
        }
        
        .btn-view:hover {
            background-color: #0398C0; /* Warna latar belakang biru lebih gelap saat hover */
            transform: scale(1.05); /* Memperbesar tombol sedikit saat hover */
        }
        
        .btn-view:active {
            background-color: #0286A1; /* Warna latar belakang biru lebih gelap saat diklik */
            transform: scale(1); /* Mengembalikan ukuran tombol saat klik */
        }
        /* Base styling for buttons */
        .btn {
            display: inline-block;
            padding: 0.375rem 0.75rem; /* Adjust padding for a consistent size */
            border: none;
            border-radius: 0.25rem;
            font-size: 0.875rem; /* Slightly smaller text */
            
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        
        /* Custom Info Button */
        .custom-btn-info {
            background-color: #1E90FF; /* Blue color */
            color: #fff; /* White text */
        }
        
        .custom-btn-info:hover {
            background-color: #1C86EE; /* Darker blue on hover */
        }
        
        /* Custom Light Button */
        .custom-btn-light {
            background-color: #F0F8FF; /* Alice Blue */
            color: #333; /* Dark text for better readability */
        }
        
        .custom-btn-light:hover {
            background-color: #E6E6FA; /* Lavender on hover */
        }
        
        /* Custom Success Button */
        .custom-btn-success {
            background-color: #32CD32; /* Lime Green */
            color: #fff; /* White text */
        }
        
        .custom-btn-success:hover {
            background-color: #2E8B57; /* Sea Green on hover */
        }
        
        /* Custom Danger Button */
        .custom-btn-danger {
            background-color: #FF4500; /* Orange Red */
            color: #fff; /* White text */
        }
        
        .custom-btn-danger:hover {
            background-color: #FF0000; /* Red on hover */
        }
        
        /* Responsive Design */
        @media (max-width: 576px) {
            .btn {
                display: block;
                width: 100%; /* Full width on small screens */
                margin-bottom: 0.5rem; /* Space between buttons */
            }
        }
</style>
<div class="container-fluid">
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
                <!--    <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Pelaporan Penelitian</h4>
                    <p class="card-category"></p>
                    <br>
                    <a type="button" class="btn btn-primary" href="{{route('pelaporan.create')}}">Tambah</a>
                    </br>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                    @can('isAdmin')
                    <table class="table">
                         <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Dosen</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelaporanuser as $item)
                            <tr>
                                <tr>
                                    <td>{{ $item->proposal_id }}</td>
                                    <td>{{ $item->userId->name }}</td>
                                    <td>{{ $item->proposalId?->judul ?? 'Tidak Ada Judul' }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>
                                        <a href="/file-pelaporan/{{ $item->file }}">
                                            <span class="btn custom-btn-info">File</span>
                                        </a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus ?');" action="{{ route('pelaporan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn custom-btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tr>
                        </tbody>
                        @empty
                        <div class="bg-red-500 text-white p-3 rounded shadow-sm mb-3">
                            Data Belum Tersedia!
                        </div>
                        @endforelse
                    </table>
                    {{ $pelaporan->links() }}
                    @elsecan('isReview')
                    <table class="table">
                         <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Dosen</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelaporan as $item)
                                <tr>
                                    <td>{{ $item->proposal_id }}</td>
                                    <td>{{ $item->userId->name }}</td>
                                    <td>{{ $item->proposalId?->judul ?? 'Tidak Ada Judul' }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>
                                        <a href="/file-pelaporan/{{ $item->file }}">
                                            <span class="btn custom-btn-info">File</span>
                                        </a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus ?');" action="{{ route('pelaporan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn custom-btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        </tbody>
                        @empty
                        <div class="bg-red-500 text-white p-3 rounded shadow-sm mb-3">
                            Data Belum Tersedia!
                        </div>
                        @endforelse
                    </table>
                    {{ $pelaporan->links() }}
                    @elsecan('isSuper')
                    <table class="table">
                         <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Dosen</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelaporan as $item)
                                <tr>
                                    <td>{{ $item->proposal_id }}</td>
                                    <td>{{ $item->userId->name }}</td>
                                    <td>{{ $item->proposalId?->judul ?? 'Tidak Ada Judul' }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>
                                        <a href="/file-pelaporan/{{ $item->file }}">
                                            <span class="btn custom-btn-info">File</span>
                                        </a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus ?');" action="{{ route('pelaporan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn custom-btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        </tbody>
                        @empty
                        <div class="bg-red-500 text-white p-3 rounded shadow-sm mb-3">
                            Data Belum Tersedia!
                        </div>
                        @endforelse
                    </table>
                    {{ $pelaporan->links() }}
                    @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection