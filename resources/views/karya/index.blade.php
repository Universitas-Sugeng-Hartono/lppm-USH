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
                    <h4 class="card-title">Karya Cipta</h4>
                    <p class="card-category"></p>
                    <br>
                    <a type="button" class="btn btn-primary" href="{{route('karya.create')}}">Tambah</a>
                    </br>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                    @can('isAdmin')
                   <table class="table">
                         <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Dosen</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyaself as $k)
                            <tr>
                                <td>{{ $k->id }}</td>
                                <td>{{ $k->userId->name }}</td>
                                <td>{{ $k->jenis }} </td>
                                <td>
                                    @if($k->status == 'Disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($k->status == 'Ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @elseif($k->status == 'Diajukan')
                                        <span class="badge bg-primary">Diajukan</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Diproses</span>
                                    @endif                                    
                                <td><a href="{{ route('karya.show', $k->id) }}" class="btn custom-btn-info">Detail</a></td>
                                <td>
                                    <a href="{{ route('karya.edit', $k->id) }}" class="btn btn-warning" style="color:white;">Edit</a>
                                    <form action="{{ route('karya.destroy', $k->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn custom-btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $karya->links() }}
                    @elsecan('isAdmin')
                   <table class="table">
                         <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Dosen</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyaself as $k)
                            <tr>
                                <td>{{ $k->id }}</td>
                                <td>{{ $k->userId->name }}</td>
                                <td>{{ $k->jenis }} </td>
                                <td>
                                    @if($k->status == 'Disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($k->status == 'Ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @elseif($k->status == 'Diajukan')
                                        <span class="badge bg-primary">Diajukan</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Diproses</span>
                                    @endif                                    
                                <td><a href="{{ route('karya.show', $k->id) }}" class="btn custom-btn-info">Detail</a></td>
                                <td>
                                    <a href="{{ route('karya.edit', $k->id) }}" class="btn btn-warning" style="color:white;">Edit</a>
                                    <form action="{{ route('karya.destroy', $k->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn custom-btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $karya->links() }}
                    @elsecan('isSuper')
                    <table class="table">
                         <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Dosen</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karya as $k)
                            <tr>
                                <td>{{ $k->id }}</td>
                                <td>{{ $k->userId->name }}</td>
                                <td>{{ $k->jenis }} </td>
                                <td>
                                    <a href="#" class="status-badge" 
                                    data-id="{{ $k->id }}" 
                                    data-status="{{ $k->status }}" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#statusModal">
                                    @if($k->status == 'Disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($k->status == 'Ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @elseif($k->status == 'Diajukan')
                                        <span class="badge bg-primary">Diajukan</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Diproses</span>
                                    @endif
                                    </a>                                       
                                <td><a href="{{ route('karya.show', $k->id) }}" class="btn custom-btn-info">Detail</a></td>
                                <td>
                                    <a href="{{ route('karya.edit', $k->id) }}" class="btn btn-warning" style="color:white;">Edit</a>
                                    <form action="{{ route('karya.destroy', $k->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn custom-btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $karya->links() }}
                    @endcan
                    <!-- Modal Ubah Status -->
                    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="statusModalLabel">Ubah Status Karya</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="updateStatusForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <input type="hidden" id="karya_id" name="karya_id">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Pilih Status</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="Diajukan">Diajukan</option>
                                                <option value="Disetujui">Disetujui</option>
                                                <option value="Ditolak">Ditolak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const statusBadges = document.querySelectorAll(".status-badge");

        statusBadges.forEach(function (badge) {
            badge.addEventListener("click", function () {
                let karyaId = this.getAttribute("data-id");
                let status = this.getAttribute("data-status");

                document.getElementById("karya_id").value = karyaId;
                document.getElementById("status").value = status;
                document.getElementById("updateStatusForm").action = `/karya/update-status/${karyaId}`;
            });
        });
    });
</script>


@endsection