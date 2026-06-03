@extends('dashboard.indexnew')
@section('inti')
<style>
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 10px;
            color: #fff;
        }
        
        .submission {
            background-color: #87CEFA; /* Biru muda */
        }
        
        .on-review {
            background-color: #FFD700; /* Kuning muda */
        }
        
        .accepted {
            background-color: #90EE90; /* Hijau muda */
        }
        
        .decline {
            background-color: #FF6347; /* Merah */
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
            background-color: #c0c9d1; /* Alice Blue */
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
        
        /* Custom Success Button */
        .custom-btn-warning {
            background-color: #d9bb0f; /* Lime Green */
            color: #fff; /* White text */
        }
        
        .custom-btn-warning:hover {
            background-color: #d48d1e; /* Sea Green on hover */
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
<style>
        .containers {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px; /* Space between items */
        }
        .btn {
            padding: 10px 20px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .custom-btn-info {
            background-color: #17a2b8; /* Example color */
        }
        .btn-primary {
            background-color: #007bff; /* Example color */
        }
        form {
            display: flex;
            align-items: center;
        }
        input[type="text"] {
            margin-right: 10px;
            padding: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 5px 10px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .disabled-link {
            cursor: not-allowed; /* Mengubah kursor menjadi silang */
        }
    </style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-info bg-info text-white border-0" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-warning alert-dismissible fade show">
                    {{ session('error') }}
                </div>
            @endif
            @can('isAdmin')
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Proposal</h4>
                    <p class="card-category"></p>
                    <br>
                    <div class="containers">
                        <a type="button" class="btn btn-primary" href="/createpenelitian">Tambah</a>
                        <form action="/proposalpenelitian" method="GET">
                            <input type="text" name="search" placeholder="Search by Judul">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Pengirim</th>
                                    <th>Judul</th>
                                    <th>Progdi</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($proposal as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->userId->name }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->progdi }}</td>
                                    <td>
                                        @if($item->status == "Submission" && $item->status_review == null && $item->status_final == null)
                                            <span class="status submission">Submission</span>
                                            
                                        @elseif($item->status == "On Review" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "On Review" && $item->status_review == "On Review" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "On Review" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "On Review" && $item->status_review == "On Review" && $item->status_final == "On Review")
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "On Review" && $item->status_final == "On Review")
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == "On Review")
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == "Accepted")
                                            <span class="status accepted">Accepted</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "Decline" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "Decline" && $item->status_final == "Decline")
                                            <span class="status decline">Decline</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == "Decline")
                                            <span class="status decline">Decline</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "On Review" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == null && $item->status_review == "Decline" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "Decline" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "Accepted" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @else
                                            <!-- Optionally handle other cases -->
                                        @endif
                                    </td>

                                    <td>{{ $item->tanggal }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus ?');" action="{{ route('proposal.destroy',$item->id) }}" method="POST">
                                            <a href="/create-ubah/{{ $item->id }}" class="btn custom-btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('proposal.show', $item->id) }}" class="btn custom-btn-light" title="Show"><i class="fas fa-eye"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn custom-btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
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
                    </div>
                </div>
            </div>
            @elsecan('isReview')
            @endcan
            @can('isSuper')
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Proposal Dosen</h4>
                    <p class="card-category"></p>
                    <br>
                    <div class="containers">
                        <a type="button" class="btn btn-primary" href="/createpenelitian">Tambah</a>
                        <form action="/proposalpenelitian" method="GET">
                             <select id="progdi" name="progdi" class="form-control" style="border-radius:10px;">
                                <option value="">Pilih Program Studi</option>
                                <option value="Informatika" {{ request()->input('progdi') == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                                <option value="Bisnis Digital" {{ request()->input('progdi') == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
                                <option value="Gizi" {{ request()->input('progdi') == 'Gizi' ? 'selected' : '' }}>Gizi</option>
                                <option value="Hukum Bisnis" {{ request()->input('progdi') == 'Hukum Bisnis' ? 'selected' : '' }}>Hukum Bisnis</option>
                                <option value="Manajemen Bisnis Internasional" {{ request()->input('progdi') == 'Manajemen Bisnis Internasional' ? 'selected' : '' }}>Manajemen Bisnis Internasional</option>
                                <option value="Teknologi Pangan" {{ request()->input('progdi') == 'Teknologi Pangan' ? 'selected' : '' }}>Teknologi Pangan</option>
                            </select>
                            <select id="admin_id" name="admin_id" autocomplete="user_id" class="form-control" style="border-radius:10px;">
                                <option value="">Pilih Dosen</option>
                                @foreach ($getName as $item)
                                    <option value="{{ $item->id }}" {{ request()->input('admin_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select id="year" name="year" class="form-control" style="border-radius:10px;">
                                <option value="">Pilih Tahun</option>
                                @for ($year = 2020; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}" {{ request()->input('year') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endfor
                            </select>
                            <input type="text" name="search" placeholder="Search by Judul" style="border-radius:10px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Pengirim</th>
                                    <th>Judul</th>
                                    <th>Progdi</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($proposal1 as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->userId->name }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->progdi }}</td>
                                    <td>
                                        @if($item->status == "Submission" && $item->status_review == null && $item->status_final == null)
                                            <span class="status submission">Submission</span>
                                            
                                        @elseif($item->status == "On Review" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "On Review" && $item->status_review == "On Review" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "On Review" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "On Review" && $item->status_review == "On Review" && $item->status_final == "On Review")
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "On Review" && $item->status_final == "On Review")
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == "On Review")
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == "Accepted")
                                            <span class="status accepted">Accepted</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "Decline" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "Decline" && $item->status_final == "Decline")
                                            <span class="status decline">Decline</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == "Decline")
                                            <span class="status decline">Decline</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "On Review" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == null && $item->status_review == "Decline" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "Decline" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "Accepted" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @else
                                            <!-- Optionally handle other cases -->
                                        @endif
                                    </td>

                                    <td>{{ $item->tanggal }}</td>
                                    <td>
                                       <form onsubmit="return confirm('Apakah anda yakin ingin menghapus?');" action="{{ route('proposal.destroy', $item->id) }}" method="POST" class="d-inline">
                                            <a href="/create-ubah/{{ $item->id }}" class="btn custom-btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                            @if ($item->status == "Accepted")
                                                <a href="#" class="btn custom-btn-info disabled-link" title="Review 1"><i class="fas fa-pencil-alt"></i></a>
                                            @else
                                                <a href="{{ route('proposal.edit', $item->id) }}" class="btn custom-btn-info" title="Review 1"><i class="fas fa-pencil-alt"></i></a>
                                            @endif
                                            @if ($item->status_review == "Accepted")
                                                <a href="#" class="btn custom-btn-info disabled-link" title="Review 2"><i class="fas fa-pencil-alt"></i></a>
                                            @else
                                                <a href="/create-review2/{{ $item->id }}" class="btn custom-btn-info" title="Review 2"><i class="fas fa-pencil-alt"></i></a>
                                            @endif
                                            <a href="{{ route('proposal.show', $item->id) }}" class="btn custom-btn-light" title="Show"><i class="fas fa-eye"></i></a>
                                            <a href="/create-acc/{{ $item->id }}" class="btn custom-btn-success" title="Accepted"><i class="fas fa-check"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn custom-btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
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
                    </div>
                    {{ $proposal1->links() }}
                </div>
            </div>
            @elsecan('isAdmin')
            @endcan
            @can('isReview')
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Proposal Dosen</h4>
                    <p class="card-category"></p>
                    <br>
                    <div class="containers">
                        <a type="button" class="btn btn-primary" href="/createpenelitian">Tambah</a>
                        <form action="/proposalpenelitian" method="GET">
                            <select id="admin_id" name="admin_id" autocomplete="user_id" class="form-control">
                                <option value="">Pilih Dosen</option>
                                @foreach ($getName as $item)
                                    <option value="{{ $item->id }}" {{ request()->input('admin_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" name="search" placeholder="Search by Judul">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Pengirim</th>
                                    <th>Judul</th>
                                    <th>Progdi</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($proposal1 as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->userId->name }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->progdi }}</td>
                                    <td>
                                        @if($item->status == "Submission" && $item->status_review == null && $item->status_final == null)
                                            <span class="status submission">Submission</span>
                                            
                                        @elseif($item->status == "On Review" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "On Review" && $item->status_review == "On Review" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "On Review" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "On Review" && $item->status_review == "On Review" && $item->status_final == "On Review")
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "On Review" && $item->status_final == "On Review")
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == "On Review")
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == "Accepted")
                                            <span class="status accepted">Accepted</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "Decline" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "Decline" && $item->status_final == "Decline")
                                            <span class="status decline">Decline</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "Accepted" && $item->status_final == "Decline")
                                            <span class="status decline">Decline</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "On Review" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == null && $item->status_review == "Decline" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == "Decline" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @elseif($item->status == "Decline" && $item->status_review == "Accepted" && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                        
                                        @elseif($item->status == "Accepted" && $item->status_review == null && $item->status_final == null)
                                            <span class="status on-review">On Review</span>
                                            
                                        @else
                                            <!-- Optionally handle other cases -->
                                        @endif
                                    </td>

                                        <td>{{ $item->tanggal }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus ?');" action="{{ route('proposal.destroy',$item->id) }}" method="POST">
                                            
                                            @if ($item->status == "Accepted")
                                                <a href="#" class="btn custom-btn-info disabled-link" title="Review 1"><i class="fas fa-pencil-alt"></i></a>
                                            @else
                                                <a href="{{ route('proposal.edit', $item->id) }}" class="btn custom-btn-info" title="Review 1"><i class="fas fa-pencil-alt"></i></a>
                                            @endif
                                            @if ($item->status_review == "Accepted")
                                                <a href="#" class="btn custom-btn-info disabled-link" title="Review 1"><i class="fas fa-pencil-alt"></i></a>
                                            @else
                                                <a href="/create-review2/{{ $item->id }}" class="btn custom-btn-info" title="Review 2"><i class="fas fa-pencil-alt"></i></a>
                                            @endif
                                            <a href="{{ route('proposal.show', $item->id) }}" class="btn custom-btn-light" title="Show"><i class="fas fa-eye"></i></a>
                                            <!--<a href="/create-acc/{{ $item->id }}" class="btn custom-btn-success" title="Accepted"><i class="fas fa-check"></i></a>-->
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn custom-btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
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
                    {{ $proposal1->links() }}
                    </div>
                </div>
            </div>
            @elsecan('isAdmin')
            @endcan
        </div>
    </div>
</div>
@endsection